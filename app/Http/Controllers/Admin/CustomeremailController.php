<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\CustomerMail;
use App\Models\Customer;
use App\Models\Customeremail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomeremailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customeremail = Customeremail::paginate(10);

        return view('admin.customer-email.customer-email-list', compact('customeremail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        return view('admin.customer-email.customer-email-create', compact('customer'));
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
            'message' => 'Message send successfully',
            'alert-type' => 'success',
        ];

        $request->validate([
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'customer_message' => 'required',
            'customer' => 'required',
        ]);

        $customermail = new Customeremail([
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'customer_message' => $request->get('customer_message'),
            'customer_id' => $request->get('customer'),
        ]);

        $customermail->save();

        Mail::send('admin.email.customer-mail', array(
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'customer_message' => $request->get('customer_message'),
        ), function ($message) use ($request) {
            $message->from('inventorysoftware39@gmail.com', 'Admin');
            $message->to($request->email)->subject($request->get('subject'));
        });

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
            'message' => 'Email Delete successfully',
            'alert-type' => 'success',
        ];
        $customerMail = Customeremail::findOrFail($id);
        $customerMail->delete();
        return redirect('home/customer-email')->with($notification);
    }
}
