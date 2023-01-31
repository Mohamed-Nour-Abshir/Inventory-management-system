<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SaleExport;
use App\Models\Orderdetail;
use App\Models\Product;

class SalesReportController extends Controller
{
    public function index()
    {
        $salesReport = Orderdetail::with('order')->paginate(10);
        return view('admin.report.sales-report', compact('salesReport'));
    }

    public function salesReport(Request $request)
    {
        $salesReport = Orderdetail::where('created_at', '>=', $request->from)->where('created_at', '<=', $request->to)->get();

        return view('admin.report.sales-report', compact('salesReport'));
    }

    public function salesExcelsheet()
    {
        return Excel::download(new SaleExport, 'order.xlsx');
    }
}
