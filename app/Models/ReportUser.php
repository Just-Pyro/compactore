<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportUser extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "reportedUser_id",
        "reportDetails",
    ];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function reportedUser(){
        return $this->belongsTo(User::class, "reportedUser_id");
    }
}
