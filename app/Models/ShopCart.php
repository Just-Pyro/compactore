<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShopCart extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id"
    ];

    protected $table = "shopcarts";

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function addtoCart(){
        return $this->hasMany(AddtoCart::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
