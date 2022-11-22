<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'user_id'
    ];

    public function  info(){
        return $this->belongsTo(Products::class,'product_id','id');
    }
}
