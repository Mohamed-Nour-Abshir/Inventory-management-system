<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Companaysetting;
use App\Models\Orderdetail;
use Illuminate\Http\Request;

class ChallanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $order = Order::with('shipping')->get();
        return view('admin.order.challan-list', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
        $orderDetails = Order::with('shipping', 'orderdetail')->where('orders.id', $id)->first();
        $orderShow = Order::with('shipping', 'orderdetail')->where('orders.id', $id)->get();
        $orderproduct = Orderdetail::with('order')->where('order_id', $id)->get();
        $companysetting = Companaysetting::first();

        return view('admin.order.challan-invoice', compact('orderShow', 'orderDetails', 'orderproduct', 'companysetting'));
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
        //
        $notification = [
            'message' => 'Challan Delete successfully',
            'alert-type' => 'success',
        ];
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect('home/challan')->with($notification);
    }

}
