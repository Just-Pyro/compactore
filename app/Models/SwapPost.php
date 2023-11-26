<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SwapPost extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "title",
        "description"
    ];

    protected $table = "swap_posts";

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
