<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_group_items', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('user_product_groups_id')->constrained()->references('id')->on('user_product_groups')->onDelete('cascade');

            $table->foreignId('product_id')->constrained()->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_group_items');
    }
};
