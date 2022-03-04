<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('pages.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all()->pluck('name','id');
        return view('pages.roles.create', compact('permissions'));
    }

    public function show(Role $role)
    {
        return view('pages.roles.show',compact('role'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'permissions.*' => 'integer',
            'permissions' => 'required|array'
        ]);

        $roleDB = Role::where('name',$request->name)->get();
        if($roleDB->count() > 0) {
            return back()->with('error','This name is already taken, Please try again');
        }

        $role = Role::create($validatedData);
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index')->with('success','The new role added successfully');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all()->pluck('name','id');
        $role->load('permissions');

        return view('pages.roles.edit', compact('role','permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'permissions.*' => 'integer',
            'permissions' => 'required|array'
        ]);

        $role->update($validatedData);
        $role->permissions()->sync($request->input('permissions', []));
        return redirect()->route('roles.index')->with('success','The role has been updated successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('success','Role has been deleted successfully');
    }

    public function destroyMany(Request $request)
    {
        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:roles,id',
        ]);

        Role::whereIn('id',request('ids'))->delete();
        Session::flash('success','Successfully deleted selected roles');
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
