<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Companaysetting;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use App\Models\Purchaseproduct;
use App\Models\Shipping;
use App\Models\Stock;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::with('shipping')->get();
        return view('admin.order.order-list', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        $product = Product::with('purchaseproduct')->get();
        // $product = Product::groupBy('product_name', 'products_id')
        //     ->selectRaw('product_name, products_id')
        //     ->get();
        // dd($product);
        return view('admin.order.order-create', compact('customer', 'product'));
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
            'message' => 'Product Order Create Successfully',
            'alert-type' => 'success',
        ];

        $prefix = '#';
        $uniqueid = (['table' => 'orders', 'field' => 'order_id', 'length' => 9, 'prefix' => $prefix]);

        $request->validate([
            'customer' => 'required',
            'order_date' => 'required',
            'paymentmethod' => 'required',
            'total_amount' => 'required',
            'received_amount' => 'required',
            'discount' => 'required',
            'vat' => 'required',
            'due' => 'required',
            'order_status' => 'required',
            'product_name' => 'required',
            'purchase_price' => 'required',
            'sell_price' => 'required',
            'total_price' => 'required',
            'quantity' => 'required',
            'paymentmethod' => 'required',
            'order_status' => 'required',
        ]);

        $shipping = new Shipping([
            'customer_id' => $request->get('customer'),
        ]);

        $shipping->save();

        $order = new Order([
            'order_id' => IdGenerator::generate($uniqueid),
            'invoice' => rand(1, 999999),
            'order_date' => $request->get('order_date'),
            'shipping_id' => $shipping->id,
            'paymentmethod' => $request->get('paymentmethod'),
            'total_amount' => $request->get('total_amount'),
            'received_amount' => $request->get('received_amount'),
            'discount' => $request->get('discount'),
            'vat' => $request->get('vat'),
            'due' => $request->get('due'),
            'discount_tk' => $request->get('discount_tk'),
            'vat_tk' => $request->get('vat_tk'),
            'order_status' => $request->get('order_status'),
        ]);

        $order->save();
        // dd($request->quantity);
        if (isset($request->quantity[0])) {
            // dd($request->product_price);
            foreach ($request->product_name as $key => $data) {
                $orderdetails = new Orderdetail();

                $orderdetails->order_id = $order->id;
                $orderdetails->product_name = $data;
                $orderdetails->purchase_price = $request->purchase_price[$key];
                $orderdetails->product_id = $request->productId[$key];
                $orderdetails->warehousestockqty_id = $request->warehousestock[$key];
                $orderdetails->sell_price = $request->sell_price[$key];
                $orderdetails->total_price = $request->total_price[$key];
                $orderdetails->quantity = $request->quantity[$key];

                $orderdetails->save();
                // dd($supplierProductId);
            };
        }

        $orderDetails = Order::with('shipping', 'orderdetail')->where('orders.id', $order->id)->first();
        $orderShow = Order::with('shipping', 'orderdetail')->where('orders.id', $order->id)->get();
        $orderproduct = Orderdetail::with('order')->where('order_id', $order->id)->get();
        $companysetting = Companaysetting::first();

        return view('admin.order.order-invoice', compact('orderShow', 'orderDetails', 'orderproduct', 'companysetting'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderDetails = Order::with('shipping', 'orderdetail')->where('orders.id', $id)->first();
        $orderShow = Order::with('shipping', 'orderdetail')->where('orders.id', $id)->get();
        $orderproduct = Orderdetail::with('order')->where('order_id', $id)->get();
        $companysetting = Companaysetting::first();

        return view('admin.order.order-invoice', compact('orderShow', 'orderDetails', 'orderproduct', 'companysetting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderDetails = Order::with('shipping', 'orderdetail')->where('orders.id', $id)->first();
        $orderShow = Order::with('shipping', 'orderdetail')->where('orders.id', $id)->get();
        $orderproduct = Orderdetail::with('order')->where('order_id', $id)->get();

        return view('admin.order.order-edit', compact('orderShow', 'orderDetails', 'orderproduct'));
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
            'message' => 'Order Update Successfully',
            'alert-type' => 'success',
        ];

        $order = Order::find($id);
        $order->due = $request->due;
        $order->received_amount = $request->received_amount;
        $order->order_status = $request->order_status;

        $order->update();

        return redirect('home/order')->with($notification);
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
            'message' => 'Order Delete successfully',
            'alert-type' => 'success',
        ];
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect('home/order')->with($notification);
    }
}
