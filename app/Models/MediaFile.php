<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MediaFile extends Model
{
    use HasFactory;

    protected $fillable = [
        "product_id",
        "file_path",
        "file_name",
        "file_type",
    ];

    public function product(){
        return $this->belongsTo(Product::class, "product_id");
    }
}
