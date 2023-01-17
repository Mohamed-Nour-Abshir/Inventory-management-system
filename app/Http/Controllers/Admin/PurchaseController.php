<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Supplierproduct;
use Illuminate\Support\Facades\DB;
use App\Models\Purchaseproduct;
use App\Models\Purchasepanding;


class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase = Purchase::paginate(10);

        return view('admin.purchase.purchase-list', compact('purchase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = Supplier::get();
        // $purchase = Purchase::with('supplier', 'purchaseproduct', 'purchasepanding')->get();
        return view('admin.purchase.purchase-create', compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notification = [
            'message' => 'Product Purchase Successfully',
            'alert-type' => 'success',
        ];

        $request->validate([
            'date' => 'required',
            'supplier' => 'required',
            'total_payment' => 'required',
            'due' => 'required',
            'purchase_status' => 'required',
            'payment_status' => 'required',
            'product_name' => 'required',
            'quantity' => 'required',
            'product_price' => 'required',
            'sell_price' => 'required',
            'discount' => 'required',
            'color' => 'required',
            'total_amount' => 'required',
        ]);

        // $latestOrder = Purchase::all()->first();
        $purchase = new Purchase([
            'orderID' => date('dmy') . "-" . uniqid(),
            'date' => $request->get('date'),
            'supplier_id' => $request->get('supplier'),
            'total_payment' => $request->get('total_payment'),
            'due' => $request->get('due'),
            'purchase_status' => $request->get('purchase_status'),
            'payment_status' => $request->get('payment_status'),
        ]);
        // dd($purchase);
        $purchase->save();
        // dd($request->quantity);
        if ($request->product_price[0]) {
            // dd($request->product_price);
            foreach ($request->color as $key => $data) {
                // dd($request->color);
                $purchaseProduct = new Purchaseproduct();

                $purchaseProduct->products_id = $request->products_id[$key];
                $purchaseProduct->product_name = $request->product_name[$key];
                $purchaseProduct->quantity = $request->quantity[$key];
                // dd($request->quantity);
                $purchaseProduct->product_price = $request->product_price[$key];
                $purchaseProduct->sell_price = $request->sell_price[$key];
                $purchaseProduct->discount = $request->discount[$key];
                $purchaseProduct->color = $data;
                $purchaseProduct->total_amount = $request->total_amount[$key];
                $purchaseProduct->purchase_id = $purchase->id;

                $purchaseProduct->save();
                // dd($supplierProductId);
            };
        }

        // dd($request->qty);
        if (isset($request->qty[0])) {

            foreach ($request->qty as $key => $data) {
                $purchasePanding = new Purchasepanding();

                $purchasePanding->product_name = $request->product_name[$key];
                $purchasePanding->qty = $data;
                $purchasePanding->supplier_id = $request->supplier;
                // dd($request->supplier);
                $purchasePanding->purchase_id = $purchase->id;

                $purchasePanding->save();
                // dd($supplierProductId);
            };
        }

        return redirect('home/purchase')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase = Purchase::with('supplier')->where('purchases.id', $id)->first();
        $purchaseProduct = Purchase::with('supplier', 'purchaseproduct', 'purchasepanding')->where('purchases.id', $id)->get();
        $purchaseproductPrice = Purchaseproduct::with('purchase')->where('purchase_id', $purchase->id)->sum('total_amount');
        // dd($purchaseProduct);
        return view('admin.purchase.purchase-show', compact('purchase', 'purchaseProduct', 'purchaseproductPrice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::with('supplierproduct')->get();
        $purchase = Purchase::with('supplier', 'purchaseproduct', 'purchasepanding')->where('purchases.id', $id)->first();
        $purchaseproductName = Purchaseproduct::with('purchase')->where('purchase_id', $purchase->id)->get();
        $purchaseproductPrice = Purchaseproduct::with('purchase')->where('purchase_id', $purchase->id)->sum('total_amount');
        // dd($purchaseproductPrice);
        return view('admin.purchase.purchase-edit', compact('purchase', 'purchaseproductName', 'supplier', 'purchaseproductPrice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $notification = [
            'message' => 'Product Update Successfully',
            'alert-type' => 'success',
        ];

        $purchase = Purchase::find($id);

        $purchase->orderID = date('dmy') . "-" . uniqid();
        $purchase->date = $request->date;
        $purchase->supplier_id = $request->supplier;
        $purchase->total_payment = $request->total_payment;
        $purchase->due = $request->due;
        $purchase->purchase_status = $request->purchase_status;
        $purchase->payment_status = $request->payment_status;

        $purchase->update();

        if ($request->product_price) {
            foreach ($request->color as $key => $data) {
                $purchaseID = NULL;
                if (isset($request->purchase_name[$key])) {
                    $purchaseID = $request->purchase_name[$key];
                }
                Purchaseproduct::updateOrCreate(

                    ['id' => $purchaseID],
                    [
                        'products_id' => $request->products_id[$key],
                        'product_name' => $request->product_name[$key],
                        'quantity' => $request->quantity[$key],
                        'product_price' => $request->product_price[$key],
                        'sell_price' => $request->sell_price[$key],
                        'discount' => $request->discount[$key],
                        'color' => $data,
                        'total_amount' => $request->total_amount[$key],
                        'purchase_id' => $purchase->id,
                    ]
                );
            };
        }

        if ($request->qty) {
            foreach ($request->qty as $key => $data) {
                $purchaseQtyID = NULL;
                if (isset($request->purchaseqty_name[$key])) {
                    $purchaseQtyID = $request->purchaseqty_name[$key];
                }
                Purchasepanding::updateOrCreate(

                    ['id' => $purchaseQtyID],
                    [
                        'product_name' => $request->product_name[$key],
                        'qty' => $data,
                        'supplier_id' => $request->supplier,
                        'purchase_id' => $purchase->id,
                    ]
                );
            };
        }

        return redirect('home/purchase')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification = [
            'message' => 'Purchase Product Delete successfully',
            'alert-type' => 'success',
        ];
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();
        return redirect('home/purchase')->with($notification);
    }
}
