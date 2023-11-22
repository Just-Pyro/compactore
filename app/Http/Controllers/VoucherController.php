<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function addVoucher(Request $request){
        $user = auth()->user();
        $shop = $user->profile->shop;

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
            $adminShop = Shop::where('shopName', 'admin')->first();

            $voucher = new Voucher();
            $voucher->code = $request->code;
            $voucher->type = $request->voucher_type;
            $voucher->discount_amount = $request->discount_amount;
            $voucher->max_usage_limit = $request->usage_limit;
            $voucher->expires_at = $request->expiration;
            $voucher->applicable_to = $request->applicable_to;
            $voucher->is_claimable = $request->isClaimable;
            $voucher->claimed_by = $claimable;
            $voucher->claimed_at = now();
            $voucher->monthly_distribution_limit = $request->monthly_distribution_limit;
            $voucher->monthly_usage_limit = $request->monthly_usage_limit;
            $voucher->last_monthly_reset = $monthly_reset;
            $voucher->shop()->associate($adminShop);
            $voucher->save();

            return redirect('/addVoucher-admin');
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
            "claimed_by" => $user->id,
            "claimed_at" => now(),
            "monthly_distribution_limit" => $request->monthly_distribution_limit,
            "monthly_usage_limit" => $request->monthly_usage_limit,
            "last_monthly_reset" => $monthly_reset
        ]);

        return redirect('/goto-addVoucher');
    }
}
