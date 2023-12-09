<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullname',
        'contact',
        'province',
        'city',
        'barangay',
        'postal',
        'detailed_address',
    ];

    public function user(){
        return $this->hasOne(User::class, 'user_id');
    }
}