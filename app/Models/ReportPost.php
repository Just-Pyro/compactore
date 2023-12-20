<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportPost extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "reportedPost_id",
        "reportDetails",
    ];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function reportedPost_id(){
        return $this->belongsTo(SwapPost::class, "reportedPost_id");
    }
}
