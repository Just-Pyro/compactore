<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surplus extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'productName',
        'condition',
        'price',
        'brand',
        'description',
    ];

    public function surplusMedia(){
        return $this->hasMany(SurplusMedia::class, 'surplus_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'user_id');
    }
}
