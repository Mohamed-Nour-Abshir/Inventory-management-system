<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Purchaseproduct;
use App\Models\Stock;
use App\Models\Stockquantity;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock = Stock::paginate(10);
        return view('admin.stock.stock-list', compact('stock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $purchase = Purchaseproduct::with('purchase')->get();
        $stockQty = Stock::with('stockquantity')->get();
        // dd($stockQty->stockquantity[0]->quantity);
        return view('admin.stock.stock-create', compact('purchase'));
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
            'message' => 'Stock add Successfully',
            'alert-type' => 'success',
        ];

        $request->validate([
            'date' => 'required',
            'purchaseproduct' => 'required',
            'available_quantity' => 'required',
            'storage_name' => 'required',
            'quantity' => 'required',
        ]);

        $stock = new Stock([
            'date' => $request->get('date'),
            'purchaseproduct_id' => $request->get('purchaseproduct'),
            'available_quantity' => $request->get('available_quantity'),
        ]);

        $stock->save();

        if ($request->quantity[0]) {
            foreach ($request->storage_name as $key => $data) {
                $stockquantity = new Stockquantity();

                $stockquantity->storage_name = $data;
                $stockquantity->quantity = $request->quantity[$key];
                $stockquantity->stock_id = $stock->id;

                $stockquantity->save();
            };
        }

        return redirect('home/stock')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $purchase = Purchaseproduct::with('purchase')->where('purchaseproduct.id', $id)->first();
        $stockquantity = Stock::where('id', $id)->first();
        $storageDetails = Stockquantity::with('stock')->where('stock_id', $id)->get();
        // dd($supplier);
        return view('admin.stock.stock-show', compact('stockquantity', 'storageDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stockquantity = Stock::with('purchaseproduct', 'stockquantity')->where('stocks.id', $id)->first();
        $purchaseProduct = Purchaseproduct::with('stock')->get();
        $storageDetails = Stockquantity::with('stock')->where('stock_id', $id)->get();
        $totalQty = $storageDetails->sum('quantity');
        $totalQuantity = $stockquantity->available_quantity - $storageDetails->sum('quantity');
        // dd($totalQuantity);
        return view('admin.stock.stock-edit', compact('stockquantity', 'purchaseProduct', 'totalQty', 'totalQuantity'));
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
            'message' => 'Stock Update successfully',
            'alert-type' => 'success',
        ];
        $stock = Stock::find($id);

        $stock->date = $request->date;
        $stock->purchaseproduct_id = $request->purchaseproduct;
        $stock->available_quantity = $request->available_quantity;

        $stock->update();

        if ($request->quantity) {
            foreach ($request->storage_name as $key => $data) {
                $qtyID = NULL;
                if (isset($request->qty_name[$key])) {
                    $qtyID = $request->qty_name[$key];
                }
                Stockquantity::updateOrCreate(

                    ['id' => $qtyID],
                    [
                        'storage_name' => $data,
                        'quantity' => $request->quantity[$key],
                        'stock_id' => $stock->id
                    ]
                );
            };
        }

        return redirect('home/stock')->with($notification);
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
            'message' => 'Stock Delete successfully',
            'alert-type' => 'success',
        ];
        $stock = Stock::findOrFail($id);
        $stock->delete();
        return redirect('home/stock')->with($notification);
    }
}
