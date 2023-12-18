<?php

namespace App\Models;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullname',
        'phoneNumber',
        'birthdate',
        'profileImg',
        'shopStatus',
        'bio',
        'gender'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
