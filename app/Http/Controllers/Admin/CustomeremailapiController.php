<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomeremailapiController extends Controller
{
    public function customeremailapi(Request $request)
    {
        $parent_id = $request->customerId;
        $customer = Customer::where('id', $parent_id)->get();
        return response()->json(['customer' => $customer]);
    }
}
