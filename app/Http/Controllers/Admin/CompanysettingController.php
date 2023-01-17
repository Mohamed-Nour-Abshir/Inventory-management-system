<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Companaysetting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class CompanysettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companysetting = Companaysetting::all();
        return view('admin.setting.company-setting-details', compact('companysetting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setting.company-setting');
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
            'message' => 'Company Settings Add successfully',
            'alert-type' => 'success',
        ];

        $request->validate([
            'company_name' => 'required',
            'company_contact' => ['required', 'min:11', 'max:11'],
            'company_email' => 'required',
            'company_address' => 'required',
            'company_logo' => 'required',
        ]);


        $image = $request->file('company_logo');
        $filename = $image->getClientOriginalName();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(350, 350);
        $image_resize->save('logo/' . $filename);

        $companysetting = new Companaysetting([
            'company_name' => $request->get('company_name'),
            'company_contact' => $request->get('company_contact'),
            'company_email' => $request->get('company_email'),
            'company_address' => $request->get('company_address'),
            'company_logo' => $filename,
        ]);

        $companysetting->save();
        return redirect('home/company-setting')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companysetting = Companaysetting::where('id', $id)->first();
        return view('admin.setting.company-setting-show', compact('companysetting'));
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
            'message' => 'Company Settings Update successfully',
            'alert-type' => 'success',
        ];
        $companysetting = Companaysetting::find($id);

        if ($request->hasfile('file')) {
            $image = $request->company_logo;
            $filename = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(350, 350);
            $image_resize->save('logo/' . $filename);
            // $companysetting->file = $filename;
            $companysetting->company_logo = $filename;
        }

        $companysetting->company_name = $request->company_name;
        $companysetting->company_contact = $request->company_contact;
        $companysetting->company_email = $request->company_email;
        $companysetting->company_address = $request->company_address;
        // $companysetting->company_logo = $filename;

        $companysetting->update();

        return redirect('home/company-setting')->with($notification);
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
            'message' => 'Company Settings Delete successfully',
            'alert-type' => 'success',
        ];
        $companysetting = Companaysetting::findOrFail($id);
        $companysetting->delete();
        return redirect('home/company-setting')->with($notification);
    }
}
