<?php

namespace App\Models;

use App\Models\ShopCart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AddtoCart extends Model
{
    use HasFactory;

    protected $fillable = [
        "shopCart_id",
        "product_id",
        "productName",
        "quantity",
        "price",
        "totalPrice"
    ];

    protected $table = "addtocarts";

    public function cart(){
        return $this->belongsTo(ShopCart::class);
    }
}
