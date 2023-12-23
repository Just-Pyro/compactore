<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurplusReview extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "username",
        "otherUser_id",
        "reviewDetails",
        "rating",
        "profileImg",
    ];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function otherUserSurplus(){
        return $this->belongsTo(User::class, "otherUser_id");
    }
}
