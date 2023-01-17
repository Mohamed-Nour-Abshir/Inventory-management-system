<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orderdetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class InventoryreportController extends Controller
{
    public function index()
    {
        $inventory = Product::with('orderdetail')->paginate(10);
        // $inventoryProduct = DB::table('orderdetails')
        //     ->join('products', 'orderdetails.product_id', '=', 'products.id')
        //     ->where('orderdetails.id', 'id')
        //     ->select('orderdetails.*', 'products.*', DB::raw('sum(orderdetails.quantity) as qty'));
        // ->groupBy('orderdetails.product_name');
        $inventoryProduct = Orderdetail::with('product')
            ->select(DB::raw('sum(quantity) as qty'), 'product_name', 'purchase_price', 'sell_price')
            ->groupBy('product_name', 'purchase_price', 'sell_price')
            ->get();
        return view('admin.report.inventory-report', compact('inventory', 'inventoryProduct'));
    }

    public function inventoryReport(Request $request)
    {
        $salesReport = Orderdetail::where('order_date', '>=', $request->from)->where('order_date', '<=', $request->to)->get();

        return view('admin.report.sales-report', compact('salesReport'));
    }

    public function inventoryExcelsheet()
    {
        // return Excel::download(new SaleExport, 'order.xlsx');
    }
}
