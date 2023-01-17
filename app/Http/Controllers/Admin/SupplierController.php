<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Supplierproduct;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Unit;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::paginate(10);

        return view('admin.supplier.supplier-list', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $brand = Brand::all();
        $unit = Unit::all();
        return view('admin.supplier.supplier-show', compact('category', 'brand', 'unit'));
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
            'message' => 'Supplier add successfully',
            'alert-type' => 'success',
        ];

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'company_name' => 'required',
            'designation' => 'required',
            'contact' => ['required', 'min:11', 'max:11'],
            'address' => 'required',
        ]);

        $supplier = new Supplier([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'company_name' => $request->get('company_name'),
            'designation' => $request->get('designation'),
            'contact' => $request->get('contact'),
            'address' => $request->get('address'),
        ]);

        $supplier->save();

        if ($request->price[0]) {
            foreach ($request->product as $key => $data) {
                $supplierProductId = new Supplierproduct();

                $supplierProductId->product = $data;
                $supplierProductId->price = $request->price[$key];
                $supplierProductId->products_id = $request->products_id[$key];
                $supplierProductId->supplier_id = $supplier->id;

                $supplierProductId->save();
                // dd($supplierProductId);
            };
        }

        return redirect('home/supplier')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::with('supplierproduct')->where('suppliers.id', $id)->first();
        $supplierProduct = Supplierproduct::with('supplier')->where('supplier_id', $id)->get();
        // dd($supplier);
        return view('admin.supplier.supplier-view', compact('supplier', 'supplierProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::with('supplierproduct')->where('suppliers.id', $id)->first();
        // dd($supplier->supplierProduct);
        return view('admin.supplier.supplier-edit', compact('supplier'));
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
            'message' => 'Supplier Update successfully',
            'alert-type' => 'success',
        ];
        $supplier = Supplier::find($id);

        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->company_name = $request->company_name;
        $supplier->designation = $request->designation;
        $supplier->contact = $request->contact;
        $supplier->address = $request->address;

        $supplier->update();

        if ($request->price) {
            foreach ($request->product as $key => $data) {
                $priceID = NULL;
                if (isset($request->price_name[$key])) {
                    $priceID = $request->price_name[$key];
                }
                Supplierproduct::updateOrCreate(

                    ['id' => $priceID],
                    [
                        'product' => $data,
                        'price' => $request->price[$key],
                        'supplier_id' => $supplier->id
                    ]
                );
            };
        }

        return redirect('home/supplier')->with($notification);
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
            'message' => 'Supplier Delete successfully',
            'alert-type' => 'success',
        ];
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect('home/supplier')->with($notification);
    }
}
