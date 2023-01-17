<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Purchaseproduct;
use App\Models\Purchasereturn;
use App\Models\Shipping;
use App\Models\Stock;
use App\Models\Stockquantity;
use App\Models\Warehouse;

class ProductpurchaseController extends Controller
{
    public function jsonPurchaseProduct(Request $request)
    {
        $parent_id = $request->purchaseproduct_id;
        $purchaseproduct = Purchaseproduct::with('purchase.purchasepanding', 'stock.stockquantity')->where('id', $parent_id)->get();
        return response()->json(['purchaseproduct' => $purchaseproduct]);
    }

    public function showPurchaseproduct(Request $request)
    {
        $parent_id = $request->showPurchaseproduct_id;
        $purchaseproduct = Purchaseproduct::where('id', $parent_id)->get();
        return response()->json(['purchaseproduct' => $purchaseproduct]);
    }

    public function purchaseProductName(Request $request)
    {
        $parent_id = $request->product_id;
        $product = Product::with('purchaseproduct', 'warehousestockqty')->where('id', $parent_id)->get();
        return response()->json(['product' => $product]);
    }

    public function customer(Request $request)
    {
        $parent_id = $request->customerID;
        $customerdetails = Customer::where('id', $parent_id)->get();
        $previousDue = Shipping::with('order')->where('shippings.customer_id', $parent_id)->latest()->first();
        return response()->json(['customerdetails' => $customerdetails, 'previousDue' => $previousDue]);
    }

    public function orderPurchaseproduct(Request $request)
    {
        $parent_id = $request->orderpurchaseID;
        $orderpurchaseproduct = Product::with('purchaseproduct', 'purchasereturn', 'warehousestockqty', 'orderdetail')->where('id', $parent_id)->get();
        return response()->json(['orderpurchaseproduct' => $orderpurchaseproduct]);
    }

    public function productPurchasedetails(Request $request)
    {
        $parent_id = $request->purchaseProductID;
        $purchaseproduct = Purchaseproduct::with('purchase.supplier')->where('id', $parent_id)->get();
        return response()->json(['purchaseproduct' => $purchaseproduct]);
    }

    public function warehouseDetails(Request $request)
    {
        $parent_id = $request->warehouseID;
        $warehouseDetails = Warehouse::where('id', $parent_id)->get();
        return response()->json(['warehouseDetails' => $warehouseDetails]);
    }
}
