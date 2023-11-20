<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        "profile_id",
        "shopName",
        "contact",
        "shopImg",
    ];

    public function profile(){
        return $this->belongsTo(Profile::class, "profile_id");
    }
}
