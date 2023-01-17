<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image as Image;

class UserCreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = User::paginate(10);

        return view('admin.user-create.user-create-list', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user-create.user-create-create', compact('roles'));
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
            'message' => 'User Create Successfully',
            'alert-type' => 'success',
        ];

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'contact' => ['required', 'min:11', 'max:11'],
            'image' => 'required',
            'designation' => 'required',
            'address' => 'required',
        ]);

        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(800, 800);
        $image_resize->save('profile-image/' . $filename);

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'contact' => $request->get('contact'),
            'image' => $filename,
            'designation' => $request->get('designation'),
            'address' => $request->get('address'),
        ]);

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $user->save();
        return redirect('home/user-create')->with($notification);
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
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.user-create.user-create-edit', compact('user', 'roles'));
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
            'message' => 'User Update Successfully',
            'alert-type' => 'success',
        ];

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => ['nullable', 'string', 'min:8'],
            'contact' => ['required', 'min:11', 'max:11'],
            'designation' => 'required',
            'address' => 'required',
        ]);

        $user = User::find($id);

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(800, 800);
            $image_resize->save('profile-image/' . $filename);
            $user->file = $filename;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->contact = $request->contact;
        $user->designation = $request->designation;
        $user->address = $request->address;

        $user->update();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        return redirect('home/user-create')->with($notification);
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
            'message' => 'User Delete successfully',
            'alert-type' => 'success',
        ];
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('home/user-create')->with($notification);
    }
}
