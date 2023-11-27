<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurplusMedia extends Model
{
    use HasFactory;

    protected $table = "surplus_media";

    protected $fillable = [
        "surplus_id",
        "file_path",
        "file_name",
        "file_type",
    ];

    public function surplus(){
        return $this->hasOne(Surplus::class, 'surplus_id');
    }
}
