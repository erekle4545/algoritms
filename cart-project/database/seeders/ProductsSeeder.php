<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                "user_id"=>1,
                "title"=>"producti 1",
                "price"=>10
            ],
            [
                "user_id"=>1,
                "title"=>"producti 2",
                "price"=>15
            ],
            [
                "user_id"=>1,
                "title"=>"producti 3",
                "price"=>8
            ],
            [
                "user_id"=>1,
                "title"=>"producti 4",
                "price"=>7
            ],
            [
                "user_id"=>1,
                "title"=>"producti 5",
                "price"=>20
            ]
        ];

        foreach ($products as $row){
            Products::create($row);
        }

    }
}
