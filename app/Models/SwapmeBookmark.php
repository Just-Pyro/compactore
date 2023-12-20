<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SwapmeBookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "swapPost_id",
    ];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function swapPost(){
        return $this->belongsTo(SwapPost::class, "swapPost_id");
    }
}
