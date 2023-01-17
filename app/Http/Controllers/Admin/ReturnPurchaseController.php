<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchaseproduct;
use App\Models\Stock;
use App\Models\Stockquantity;
use Illuminate\Http\Request;

class ReturnPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stockDetails = Stockquantity::with('stock')->get();
        $stock = Stock::with('stockquantity', 'purchaseproduct')->get();
        $purchaseProduct = Purchaseproduct::all();
        $purchase = Purchaseproduct::first();
        // dd($stockDetails->stock->available_quantity);
        return view('admin.purchase-return.purchase-return-create', compact('stock', 'purchaseProduct', 'purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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


        $purchaseproduct = Purchaseproduct::find($id);


        $purchaseproduct->damage_quantity = $request->damage_quantity;
        $purchaseproduct->damage_note = $request->damage_note;
        $purchaseproduct->expair_date = $request->expair_date;

        $purchaseproduct->update();
        // dd($purchaseproduct->id);

        $pId = $purchaseproduct->id;
        // dd($pId);

        $stock = Stock::find($pId);
        // dd($stock);

        $stock->damage_quantity = $request->damage_quantity;

        $stock->update();

        if ($request->stockdamage_quantity) {
            foreach ($request->stockdamage_quantity as $key => $data) {
                $stockQtyID = NULL;
                if (isset($request->storage_name[$key])) {
                    $stockQtyID = $request->storage_name[$key];
                }
                Stockquantity::updateOrCreate(

                    ['id' => $stockQtyID],
                    [
                        'stockdamage_quantity' => $request->stockdamage_quantity[$key],
                    ]

                );
            };
            // dd($request);
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
        //
    }
}
