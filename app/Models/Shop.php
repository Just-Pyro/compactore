<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "shopName",
        "contact",
        "shopImg",
    ];

    public function profile(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function product(){
        return $this->hasMany(Product::class, "shop_id");
    }

    public function voucher(){
        return $this->hasMany(Voucher::class);
    }
}
