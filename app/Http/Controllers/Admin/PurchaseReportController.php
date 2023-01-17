<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PurchasesExport;

class PurchaseReportController extends Controller
{
    public function index()
    {
        $purchaseReport = Purchase::paginate(10);

        return view('admin.report.purchase-report', compact('purchaseReport'));
    }

    public function purchaseReport(Request $request)
    {
        $purchaseReport = Purchase::where('date', '>=', $request->from)->where('date', '<=', $request->to)->get();

        return view('admin.report.purchase-report', compact('purchaseReport'));
    }

    public function purchaseExcelsheet()
    {
        return Excel::download(new PurchasesExport, 'purchase.xlsx');
    }
}
