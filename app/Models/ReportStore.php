<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportStore extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "reportedStore_id",
        "reportDetails",
    ];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function store(){
        return $this->belongsTo(Shop::class, "reportedStore_id");
    }
}
