<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchaseproduct;
use App\Models\Stock;
use App\Models\Purchase;
use App\Models\Purchasereturn;
use App\Models\Purchasereturnquantity;
use App\Models\Stockquantity;
use Illuminate\Http\Request;

class PurchaseReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchasereturn = Purchasereturn::with('product', 'purchasereturnquantity')->paginate(10);
        $purchasereturnQty = Purchasereturnquantity::with('purchasereturn')->paginate(10);
        // dd($purchasereturn[0]->purchasereturnquantity[0]);
        return view('admin.purchase-return.purchase-return-list', compact('purchasereturn', 'purchasereturnQty'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::with('purchaseproduct', 'warehousestockqty')->get();
        return view('admin.purchase-return.purchase-return-create', compact('product'));
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
            'message' => 'Purchase Return Product Add successfully',
            'alert-type' => 'success',
        ];

        $request->validate([
            'date' => 'required',
            'product' => 'required',
            'supplier_name' => 'required',
            'quantity' => 'required',
        ]);

        $purchasereturn = new Purchasereturn([
            'date' => $request->get('date'),
            'product_id' => $request->get('product'),
            'supplier_name' => $request->get('supplier_name'),
            'quantity' => $request->get('quantity'),
            'damage_note' => $request->get('damage_note'),
        ]);

        $purchasereturn->save();

        if (isset($request->warehouse_quantity[0])) {

            foreach ($request->warehouse_name as $key => $data) {
                $purchasereturnquantity = new Purchasereturnquantity();

                $purchasereturnquantity->warehouse_name = $data;
                $purchasereturnquantity->warehouse_quantity = $request->warehouse_quantity[$key];
                $purchasereturnquantity->damage_quantity = $request->damage_quantity[$key];
                $purchasereturnquantity->purchasereturn_id = $purchasereturn->id;

                $purchasereturnquantity->save();
            };
        }


        return redirect('home/purchase-return')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchasereturn = Purchasereturn::with('product', 'purchasereturnquantity')->where('purchasereturns.id', $id)->first();
        $purchasereturns = Purchasereturnquantity::with('purchasereturn')->where('purchasereturnquantities.purchasereturn_id', $id)->get();
        return view('admin.purchase-return.purchase-return-show', compact('purchasereturn', 'purchasereturns'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchasereturn = Purchasereturn::with('product', 'purchasereturnquantity')->where('purchasereturns.id', $id)->first();
        $product = Product::with('purchaseproduct', 'warehousestockqty')->get();
        $purchasereturnqty = Purchasereturn::with('product', 'purchasereturnquantity')->where('purchasereturns.id', $id)->get();
        // dd($purchasereturns[0]->purchasereturnquantity);
        return view('admin.purchase-return.purchase-return-edit', compact('purchasereturn', 'product', 'purchasereturnqty'));
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
            'message' => 'Purchase Return Update Successfully',
            'alert-type' => 'success',
        ];

        $purchasereturn = Purchasereturn::find($id);

        $purchasereturn->date = $request->date;
        $purchasereturn->product_id = $request->product;
        $purchasereturn->supplier_name = $request->supplier_name;
        $purchasereturn->quantity = $request->quantity;
        $purchasereturn->damage_note = $request->damage_note;

        $purchasereturn->update();

        if ($request->damage_quantity) {
            foreach ($request->warehouse_name as $key => $data) {
                $productreturnID = NULL;
                if (isset($request->purchasereturn_name[$key])) {
                    $productreturnID = $request->purchasereturn_name[$key];
                }
                Purchasereturnquantity::updateOrCreate(

                    ['id' => $productreturnID],
                    [
                        'warehouse_name' => $request->warehouse_name[$key],
                        'damage_quantity' => $request->damage_quantity[$key],

                        'purchasereturn_id' => $purchasereturn->id,
                    ]
                );
            };
        }

        return redirect('home/purchase-return')->with($notification);
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
            'message' => 'Purchase Return Delete successfully',
            'alert-type' => 'success',
        ];
        $purchasereturn = Purchasereturn::findOrFail($id);
        $purchasereturn->delete();
        return redirect('home/purchase-return')->with($notification);
    }
}
