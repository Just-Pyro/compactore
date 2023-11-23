<?php

namespace App\Models;

use App\Models\Shop;
use App\Models\ShopCart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "shop_id",
        "productName",
        "category",
        "description",
        "stock",
        "price",
    ];

    public function shop(){
        return $this->belongsTo(Shop::class, "shop_id");
    }

    public function mediaFile(){
        return $this->hasMany(MediaFile::class, "product_id");
    }

    public function shopCart(){
        return $this->belongsToMany(ShopCart::class);
    }
}
