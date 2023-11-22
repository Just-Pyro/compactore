<?php

namespace App\Models;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        "shop_id",
        "code",
        "type",
        "discount_amount",
        "max_usage_limit",
        "usage_count",
        "expires_at",
        "applicable_to",
        "is_claimable",
        "claimed_by",
        "claimed_at",
        "monthly_distribution_limit",
        "monthly_usage_limit",
        "last_monthly_reset"
    ];

    public function shop(){
        return $this->belongsTo(Shop::class);
    }
}
