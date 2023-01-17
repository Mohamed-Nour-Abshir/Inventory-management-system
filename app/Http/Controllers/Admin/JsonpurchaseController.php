<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Supplierproduct;
use App\Models\Category;
use App\Models\Purchaseproduct;
use App\Models\Stock;

class JsonpurchaseController extends Controller
{

    public function jsonPurchase(Request $request)
    {
        $parent_id = $request->supplier_id;
        $supplierproduct = Supplier::where('id', $parent_id)
            ->with('supplierproduct')
            ->get();
        return response()->json([
            'supplierproduct' => $supplierproduct
        ]);
    }

    public function jsonPrice(Request $request)
    {
        $parent_id = $request->price_id;
        // $category_id = $request->category_id;
        $supplierproduct = Supplierproduct::where('id', $parent_id)->get();
        return response()->json(['supplierproduct' => $supplierproduct]);
    }

    public function destroy($id)
    {
        $notification = [
            'message' => 'Product Delete successfully',
            'alert-type' => 'success',
        ];
        $destroy = Supplierproduct::findOrFail($id);
        // dd($destroy);
        $destroy->delete();
        return redirect()->back()->with($notification);
    }
}
