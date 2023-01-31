<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense = Expense::paginate(10);

        return view('admin.expense.expense-list', compact('expense'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.expense.expense-create');
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
            'message' => 'Expense add successfully',
            'alert-type' => 'success',
        ];

        $request->validate([
            'date' => 'required',
            'name' => 'required',
            'purpose' => 'required',
            'price' => 'required',
        ]);

        if (count($request->price) > 0) {

            foreach ($request->price as $item => $v) {
                $data = array(
                    'date' => $request->date,
                    'name' => $request->name[$item],
                    'purpose' => $request->name[$item],
                    'price' => $request->price[$item],
                );

                Expense::insert($data);
            }
            return redirect('home/expense')->with($notification);
        }
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
            'message' => 'Expense Delete successfully',
            'alert-type' => 'success',
        ];
        $supplier = Expense::findOrFail($id);
        $supplier->delete();
        return redirect('home/expense')->with($notification);
    }
}
