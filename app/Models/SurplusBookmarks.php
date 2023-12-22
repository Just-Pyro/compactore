<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurplusBookmarks extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "surplus_id",
    ];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function surplus(){
        return $this->belongsTo(Surplus::class, "surplus_id");
    }
}
