<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimVoucher extends Model
{
    use HasFactory;

    protected $fillable = [
        "claimed_by",
        "claimed_at",
        "voucher_id",
        // "productName",
        // "quantity",
        // "price",
        // "totalPrice"
    ];

    public function voucher(){
        return $this->belongsTo(Voucher::class, 'voucher_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'claimed_by');
    }

}
