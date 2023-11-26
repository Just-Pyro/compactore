<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SwapmeMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        "swapPost_id",
        "file_path",
        "file_name",
        "file_type",
    ];

    protected $table = "swapme_media";

    public function swapPost(){
        return $this->belongsTo(SwapPost::class, "swapPost_id");
    }
}
