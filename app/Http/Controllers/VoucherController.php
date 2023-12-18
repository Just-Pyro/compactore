<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function addVoucher(Request $request){
        $user = auth()->user();
        $shop = $user->shop;

        if($request->isClaimable == "True"){
            $claimable = 1;
        }else{
            $claimable = 0;
        }
        
        if($request->monthly_reset == "True"){
            $monthly_reset = now();
        }else{
            $monthly_reset = null;
        }

        if($user->role == 'admin'){
            // issuing a voucher by the admin
            $adminShop = Shop::where('user_id', 'admin')->first();

            $voucher = voucher::create([
                'shop_id' => $shop->id,
                'code' => $request->code,
                'type' => $request->voucher_type,
                'discount_amount' => $request->discount_amount,
                'max_usage_limit' => $request->usage_limit,
                'expires_at' => $request->expiration,
                'applicable_to' => $request->applicable_to,
                'is_claimable' => $claimable,
                // 'claimed_by' => $user->id,
                // 'claimed_at' => now(),
                'monthly_distribution_limit' => $request->monthly_distribution_limit,
                'monthly_usage_limit' => $request->monthly_usage_limit,
                'last_monthly_reset' => $monthly_reset,
            ]);

            return redirect('/adminVoucher');
        }
        $voucher = voucher::create([
            "shop_id" => $shop->id,
            "code" => $request->code,
            "type" => $request->voucher_type,
            "discount_amount" => $request->discount_amount,
            "max_usage_limit" => $request->usage_limit,
            "expires_at" => $request->expiration,
            "applicable_to" => $request->applicable_to,
            "is_claimable" => $claimable,
            // "claimed_by" => $user->id,
            // "claimed_at" => now(),
            "monthly_distribution_limit" => $request->monthly_distribution_limit,
            "monthly_usage_limit" => $request->monthly_usage_limit,
            "last_monthly_reset" => $monthly_reset
        ]);

        return redirect('/goto-addVoucher');
    }
}
