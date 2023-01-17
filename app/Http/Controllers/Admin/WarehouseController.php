<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouse = Warehouse::all();
        return view('admin.warehouse.warehouse-list', compact('warehouse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.warehouse.warehouse-create');
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
            'message' => 'Warehouse Add successfully',
            'alert-type' => 'success',
        ];

        $request->validate([
            'warehouse_name' => 'required',
        ]);

        $warehouse = new Warehouse([
            'warehouse_name' => $request->get('warehouse_name'),
        ]);

        $warehouse->save();
        // dd($category);
        return redirect('home/warehouse')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $Warehouse)
    {
        return view('admin.Warehouse.Warehouse-edit', compact('Warehouse'));
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
            'message' => 'warehouse Update successfully',
            'alert-type' => 'success',
        ];
        // dd($units);
        $warehouse = Warehouse::find($id);
        $warehouse->warehouse_name = $request->get('warehouse_name');

        $warehouse->save();

        return redirect('home/warehouse')->with($notification);
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
            'message' => 'Warehouse Delete successfully',
            'alert-type' => 'success',
        ];
        $warehouse = Warehouse::findOrFail($id);
        $warehouse->delete();
        return redirect('home/warehouse')->with($notification);
    }
}
