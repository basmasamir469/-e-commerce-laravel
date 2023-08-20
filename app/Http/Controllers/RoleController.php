<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $permissions = Permission::get();
        return view('roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator=$this->validate($request,[
        'name'=>'required|unique:roles,name',
        'permissions'=>'required'
        ]);
        $role=Role::create(['name'=>$request->name]);
        $role->syncPermissions($request->permissions);
        flash(__('role stored successfully'))->success();
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $role=Role::find($id);
        $permissions=$role->permissions;
        return view('roles.show',compact('role','permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $role=Role::find($id);
        $permissions=Permission::all();
        $rolePermissions=$role->permissions;
        return view('roles.edit',compact('role','rolePermissions','permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'permissions' => 'required',
        ]);
     $role=Role::find($id);
     $role->update(['name'=>$request->name]);
     $role->syncPermissions($request->permissions);
     flash(__('role updated successfully'))->success();
     return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $deleted=Role::find($id)->delete();
        if($deleted){
            flash(__('role deleted successfully'))->success();
        }
        else{
            flash(__('failed to delete'))->error();
        }
        return redirect()->route('roles.index');
    }
}
