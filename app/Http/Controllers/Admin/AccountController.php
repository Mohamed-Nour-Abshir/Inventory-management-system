<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account = Account::paginate(10);
        return view('admin.accounts.account-list', compact('account'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.accounts.account-create');
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
            'message' => 'Account add Successfully',
            'alert-type' => 'success',
        ];

        $request->validate([
            'account_name' => 'required',
            'account_number' => 'required',
            'account_holder_name' => 'required',
            'branch_name' => 'required',
            'account_balance' => 'required',
            'account_status' => 'required',
        ]);

        $account = new Account([
            'account_name' => $request->get('account_name'),
            'account_number' => $request->get('account_number'),
            'account_holder_name' => $request->get('account_holder_name'),
            'branch_name' => $request->get('branch_name'),
            'account_balance' => $request->get('account_balance'),
            'account_status' => $request->get('account_status'),
        ]);

        $account->save();
        return redirect('home/accounts')->with($notification);
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
        $account = Account::where('id', $id)->first();
        $accounts = Account::where('id', $id)->get();
        return view('admin.accounts.account-edit', compact('account', 'accounts'));
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
            'message' => 'Account Update successfully',
            'alert-type' => 'success',
        ];
        $account = Account::find($id);

        $account->account_name = $request->account_name;
        $account->account_number = $request->account_number;
        $account->account_holder_name = $request->account_holder_name;
        $account->branch_name = $request->branch_name;
        $account->account_balance = $request->account_balance;
        $account->account_status = $request->account_status;

        $account->update();
        return redirect('home/accounts')->with($notification);
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
            'message' => 'Account Delete successfully',
            'alert-type' => 'success',
        ];
        $account = Account::findOrFail($id);
        $account->delete();
        return redirect('home/accounts')->with($notification);
    }
}
