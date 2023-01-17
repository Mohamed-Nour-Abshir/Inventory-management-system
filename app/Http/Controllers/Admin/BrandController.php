<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::paginate(10);

        return view('admin.brand.brand-list', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.brand-create');
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
            'message' => 'Brand Add successfully',
            'alert-type' => 'success',
        ];

        $request->validate([
            'name' => 'required',
            'summery' => 'required',
        ]);

        $brand = new Brand([
            'name' => $request->get('name'),
            'summery' => $request->get('summery'),
        ]);

        $brand->save();
        // dd($category);
        return redirect('home/brand')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('admin.brand.brand-edit', compact('brand'));
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
            'message' => 'Brand Update successfully',
            'alert-type' => 'success',
        ];
        // dd($units);
        $brand = Brand::find($id);
        $brand->name = $request->get('name');
        $brand->summery = $request->get('summery');

        $brand->save();

        return redirect('home/brand')->with($notification);
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
            'message' => 'Brand Delete successfully',
            'alert-type' => 'success',
        ];
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect('home/brand')->with($notification);
    }
}
