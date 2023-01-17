<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleandPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();

        return view('admin.role.role-list', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissionsAll = Permission::all();
        $permissionsGroup = User::getpermissiongroup();
        return view('admin.role.role-create', compact('permissionsAll', 'permissionsGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20|unique:roles',
        ]);

        $notification = [
            'message' => 'Role Add successfully',
            'alert-type' => 'success',
        ];

        $role = Role::create(['name' => $request->name]);
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
        return redirect('home/role-permission')->with($notification);
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
        $role = Role::findById($id);
        $permissionsAll = Permission::all();
        $permissionsGroup = User::getpermissiongroup();
        return view('admin.role.role-edit', compact('role', 'permissionsAll', 'permissionsGroup'));
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
        $request->validate([
            'name' => 'required|max:20|unique:roles,name,' . $id,
        ]);

        $notification = [
            'message' => 'Role Update successfully',
            'alert-type' => 'success',
        ];

        $role = Role::findById($id);
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($permissions);
        }

        return redirect('home/role-permission')->with($notification);
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
            'message' => 'Role and Permission Delete successfully',
            'alert-type' => 'success',
        ];
        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
        }
        return redirect('home/role-permission')->with($notification);
    }
}
