<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplieremailapiController extends Controller
{
    public function supplieremailapi(Request $request)
    {
        $parent_id = $request->supplierId;
        $supplier = Supplier::where('id', $parent_id)->get();
        return response()->json(['supplier' => $supplier]);
    }
}
