<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'fullname',
        'phoneNumber',
        'birthdate',
        'profileImg',
        'shopStatus',
        'bio'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
