<?php

namespace Database\Seeders;

use App\Models\ProductGroupItems;
use App\Models\UserProductGroups;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserProductGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserProductGroups::create([
            'user_id'=>1,
            'discount'=>15
        ]);

        ProductGroupItems::create([
            'user_product_groups_id'=>1,
            'product_id'=>2
        ]);

        ProductGroupItems::create([
            'user_product_groups_id'=>1,
            'product_id'=>5
        ]);

    }
}
