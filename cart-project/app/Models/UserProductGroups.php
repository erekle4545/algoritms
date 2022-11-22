<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProductGroups extends Model
{
    use HasFactory;

    public function items(){
        return $this->hasOne(ProductGroupItems::class);
    }
}
