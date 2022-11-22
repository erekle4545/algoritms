<?php

namespace App\Helpers;


/**
 * Class MultiTenant
 *
 * @package App\Helpers\Core
 */
abstract class Helper
{

    public static function array_equal($totalQty,$cartItem)
    {
        $qty = 0;
        $minQty = min($totalQty);

        if($cartItem->quantity !== $minQty){
            $generateMin =$cartItem->quantity - $minQty;
            $qty =  $cartItem->quantity - $generateMin;

        }else{
            $qty = $cartItem->quantity;
        }

        return $qty;
    }

}
