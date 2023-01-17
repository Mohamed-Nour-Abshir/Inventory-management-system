<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Unit::paginate(10);

        return view('admin.unit.unit-list', compact('unit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.unit.unit-show');
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
            'message' => 'Unit Add successfully',
            'alert-type' => 'success',
        ];

        $request->validate([
            'name' => 'required',
        ]);

        $unit = new Unit([
            'name' => $request->get('name'),
        ]);

        $unit->save();
        // dd($category);
        return redirect('home/unit')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        return view('admin.unit.unit-edit', compact('unit'));
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
            'message' => 'Unit Update successfully',
            'alert-type' => 'success',
        ];
        // dd($units);
        $unit = Unit::find($id);
        $unit->name = $request->get('name');

        $unit->save();

        return redirect('home/unit')->with($notification);
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
            'message' => 'Unit Delete successfully',
            'alert-type' => 'success',
        ];
        $unit = Unit::findOrFail($id);
        $unit->delete();
        return redirect('home/unit')->with($notification);
    }
}
