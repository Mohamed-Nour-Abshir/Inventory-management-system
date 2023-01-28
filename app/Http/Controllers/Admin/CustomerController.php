<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::paginate(10);

        return view('admin.customers.customers-list', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.customers-show');
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
            'message' => 'Customer Add successfully',
            'alert-type' => 'success',
        ];

        $request->validate([
            // 'email' => 'required',
            'name' => 'required',
            // 'contact' => ['required', 'min:11', 'max:11'],
            'address' => 'required',
        ]);

        $customer = new Customer([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'contact' => $request->get('contact'),
            'address' => $request->get('address'),
        ]);

        $customer->save();
        // dd($category);
        return redirect('home/customer')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('admin.customers.customers-edit', compact('customer'));
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
        $notification = [
            'message' => 'Customer Update successfully',
            'alert-type' => 'success',
        ];
        // dd($units);
        $units = Customer::find($id);
        $units->name = $request->get('name');
        $units->email = $request->get('email');
        $units->contact = $request->get('contact');
        $units->address = $request->get('address');

        $units->save();

        return redirect('home/customer')->with($notification);
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
            'message' => 'Customer Delete successfully',
            'alert-type' => 'success',
        ];
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect('home/customer')->with($notification);
    }
}
