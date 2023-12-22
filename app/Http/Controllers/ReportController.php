<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportStore;

class ReportController extends Controller
{
    public function reportStore(Request $request){

        ReportStore::create([
            "user_id" => $request->userId,
            "reportedStore_id" => $request->shopId,
            "reportDetails" => $request->reportdetails,
        ]);

        return redirect('/showStore/'.$request->shopId);
    }
}
