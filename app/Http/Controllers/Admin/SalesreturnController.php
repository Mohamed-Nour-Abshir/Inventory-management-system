<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Sellreturn;
use App\Models\Sellreturnproduct;
use Illuminate\Http\Request;

class SalesreturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellreturn = Sellreturn::paginate(10);
        return view('admin.order-return.order-return-lists', compact('sellreturn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = Order::all();
        return view('admin.order-return.order-return-create', compact('order'));
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
            'message' => 'Sell Return Add Successfully',
            'alert-type' => 'success',
        ];

        // $request->validate([
        //     'date' => 'required',
        //     'orderID' => 'required',
        //     'customer_name' => 'required',
        //     'current_balance' => 'required',
        //     'due_amount' => 'required',
        //     'received_amount' => 'required',
        //     'return_amount' => 'required',
        //     'damage_note' => 'required',
        //     'orderdetails' => 'required',
        //     'product_name' => 'required',
        //     'quantity' => 'required',
        //     'damage_quantity' => 'required',
        //     'sell_price' => 'required',
        //     'total_amount' => 'required',
        // ]);

        $sellreturn = new Sellreturn([
            'date' => $request->get('date'),
            'order_id' => $request->get('orderdetails'),
            'total_amount' => $request->get('total_amount'),
            'received_amount' => $request->get('received_amount'),
            'due_amount' => $request->get('due_amount'),
            'total_return_amount' => $request->get('total_return_amount'),
            'current_return_amount' => $request->get('current_return_amount'),
            'damage_note' => $request->get('damage_note'),
        ]);

        $sellreturn->save();
        // dd($request->quantity);
        if ($request->sell_price[0]) {
            foreach ($request->product_name as $key => $data) {
                $sellreturnproduct = new Sellreturnproduct();

                $sellreturnproduct->product_name = $data;
                $sellreturnproduct->sell_price = $request->sell_price[$key];
                $sellreturnproduct->quantity = $request->quantity[$key];
                $sellreturnproduct->return_quantity = $request->return_quantity[$key];
                $sellreturnproduct->replace_product = $request->replace_product[$key];
                $sellreturnproduct->return_amount = $request->return_amount[$key];
                $sellreturnproduct->subtotal_amount = $request->subtotal_amount[$key];
                $sellreturnproduct->sellreturn_id = $sellreturn->id;

                $sellreturnproduct->save();
            };
        }

        return redirect('home/sales-return')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::all();
        $sellreturn = Sellreturn::with('sellreturnproduct')->where('sellreturns.id', $id)->first();
        return view('admin.order-return.order-return-show', compact('sellreturn', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
            'message' => 'Sell Return Delete successfully',
            'alert-type' => 'success',
        ];
        $sellreturn = Sellreturn::findOrFail($id);
        $sellreturn->delete();
        return redirect('home/sales-return')->with($notification);
    }
}
