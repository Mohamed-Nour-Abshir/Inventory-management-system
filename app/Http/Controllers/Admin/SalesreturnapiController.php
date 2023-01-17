<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Stock;
use Illuminate\Http\Request;

class SalesreturnapiController extends Controller
{
    public function salesreturn(Request $request)
    {
        $parent_id = $request->orderID;
        // $salesreturn = Orderdetail::with('order.shipping.customer', 'stock', 'stockquantity')->where('orderdetails.order_id', $parent_id)->get();
        // $purchaseproduct = Stock::with('purchaseproduct', 'stockquantity', 'purchasereturn', 'orderdetail')->get();
        $salesreturn = Orderdetail::with('order.shipping.customer', 'product', 'warehousestockqty')->where('orderdetails.order_id', $parent_id)->get();
        // $purchaseproduct = Stock::with('purchaseproduct', 'stockquantity', 'purchasereturn', 'orderdetail')->get();
        return response()->json(['salesreturn' => $salesreturn]);
    }
}
