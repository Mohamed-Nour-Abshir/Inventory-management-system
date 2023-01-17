<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class FundtransferApiController extends Controller
{
    public function accountInfo(Request $request)
    {
        $parent_id = $request->accountID;
        $account = Account::where('id', $parent_id)->get();
        return response()->json(['account' => $account]);
    }
}
