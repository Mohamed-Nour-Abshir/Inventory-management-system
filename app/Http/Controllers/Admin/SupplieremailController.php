<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Supplieremail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupplieremailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplieremail = Supplieremail::paginate(10);
        return view('admin.supplier-email.supplier-email-list', compact('supplieremail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = Supplier::all();
        return view('admin.supplier-email.supplier-email-create', compact('supplier'));
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
            'phone' => ['required', 'min:11', 'max:11'],
            'subject' => 'required',
            'supplier_message' => 'required',
            'supplier' => 'required',
        ]);

        $supplieremail = new Supplieremail([
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'supplier_message' => $request->get('supplier_message'),
            'supplier_id' => $request->get('supplier'),
        ]);
        // dd($supplieremail);
        $supplieremail->save();

        Mail::send('admin.email.supplier-mail', array(
            'subject' => $request->get('subject'),
            'supplier_message' => $request->get('supplier_message'),
        ), function ($message) use ($request) {
            $message->from('inventorysoftware39@gmail.com', 'Kaizen It Ltd');
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
        $supplieremail = Supplieremail::findOrFail($id);
        $supplieremail->delete();
        return redirect('home/supplier-email')->with($notification);
    }
}
