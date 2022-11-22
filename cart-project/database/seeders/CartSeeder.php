<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cart::create([
            'user_id'=>1,
            'product_id'=>1,
            'quantity'=>1,
        ]);

        Cart::create([
            'user_id'=>1,
            'product_id'=>2,
            'quantity'=>3,
        ]);

        Cart::create([
            'user_id'=>1,
            'product_id'=>5,
            'quantity'=>2,
        ]);
    }
}
