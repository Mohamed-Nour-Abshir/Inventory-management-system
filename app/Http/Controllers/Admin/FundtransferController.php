<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Fundtransfer;
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Http\Request;

class FundtransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fundtransfer = Fundtransfer::with('account')->paginate(10);
        return view('admin.accounts.fundtransfer-list', compact('fundtransfer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::all();
        $fundtransfer = Fundtransfer::all();
        $orderdetails = Order::all();
        $totalOrder = $orderdetails->sum('total_amount');
        $totalfundtransfer = $fundtransfer->sum('balance_transfer');
        $availableBalance = ($totalOrder - $totalfundtransfer);
        // dd($totalOrder);
        return view('admin.accounts.fundtransfer-create', compact('accounts', 'totalOrder', 'totalfundtransfer', 'availableBalance'));
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
            'message' => 'Fund Transfer Successfully',
            'alert-type' => 'success',
        ];

        $request->validate([
            'date' => 'required',
            'account_number' => 'required',
            'balance_transfer' => 'required',
        ]);

        $customer = new Fundtransfer([
            'date' => $request->get('date'),
            'account_id' => $request->get('account_number'),
            'balance_transfer' => $request->get('balance_transfer'),
        ]);

        $customer->save();
        // dd($category);
        return back()->with($notification);
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
            'message' => 'Transfer Details Delete Successfully',
            'alert-type' => 'success',
        ];
        $supplier = Fundtransfer::findOrFail($id);
        $supplier->delete();
        return redirect('home/fundtransfer')->with($notification);
    }
}
