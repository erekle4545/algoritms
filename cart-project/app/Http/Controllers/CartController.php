<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\UserProductGroups;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // start Data
        $getCartData = [
            "products"=>[],
            "discount"=>null
        ];

        $totalPriceArr =[];
        $totalQty=[];
        $cartModel= Cart::query()->with('info')->where('user_id',Auth::user()->id??1)->get();

        $cartTotalPrice = 0;
        foreach ($cartModel as $key => $cartItem){
            // Qty Generate
            $totalQty[] = $cartItem->quantity;
            $qty =  $cartItem->quantity >1 ? Helper::array_equal($totalQty,$cartItem):$cartItem->quantity;

            // Total price Generate
            $sumPrice = $cartTotalPrice + ( $cartItem->info->price * $qty);
            $totalPriceArr[]=$sumPrice;
            $key > 0&&$cartTotalPrice = array_sum($totalPriceArr);

            // Cart item product id & product Groups Relation
            $discountGroup = UserProductGroups::query()->with('items',function ($query) use ($cartItem){
                $query->where('product_id',$cartItem->product_id);
            })->get();

            // Discount & Discount Group Loop
            foreach ($discountGroup as $discountRow) {
                if(isset($discountRow->items->product_id)&& $discountRow->items->product_id === $cartItem->product_id && $key > 0){
                    $ds = ( $cartTotalPrice * $discountRow->discount) / 100;
                    $getCartData['discount'] = $ds;
                }
            }

            // finish Data
            $getUserCartData= [
                'product_id'=>$cartItem->product_id,
                'quantity'=>$cartItem->quantity,
                'price'=>$cartItem->info->price,
            ];
            array_push($getCartData['products'],$getUserCartData);

        }

        return response()->json($getCartData);
    }



    /**
     * Store a newly created resource in storage. same addProductInCart
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(StoreCartRequest $request)
    {
        $cartModel = Cart::create([
            'product_id'=>$request->product_id,
            'quantity'=>$request->quantity,
            'user_id'=>Auth::user()->id??1,

        ]);

        return new CartResource($cartModel);

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function setCartProductQuantity(UpdateCartRequest $request, Cart $cart)
    {
       $userId = Auth::user()->id??1;
       $updateRes =  $cart::query()->where('user_id',$userId)->where('product_id',$request->product_id)->update([
            'quantity'=>$request->quantity
        ]);

        return response()->json($updateRes?"Cart item Updated!":'No Row in Db',$updateRes?200:500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function removeProductFromCart($id)
    {
       $userId = Auth::user()->id??1;

       if(isset($id)){
        $cart = Cart::where('user_id',$userId)->where('product_id',$id)->delete();
       }

       return response()->json($cart?"Cart item deleted!":'No Row in Db',$cart?200:500);
    }
}
