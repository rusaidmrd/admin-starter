<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PermissionsController extends Controller
{

    public function index()
    {
        $permissions = Permission::all();
        return view('pages.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('pages.permissions.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $permissionDB = Permission::where('name',$request->name)->get();

        if($permissionDB->count() > 0) {
            return back()->with('error','This name is already taken, Please try again');
        }

        Permission::create($validatedData);
        return redirect()->route('permissions.index')->with('success','Permission added successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit(Permission $permission)
    {
        return view('pages.permissions.edit', compact('permission'));
    }


    public function update(Request $request, Permission $permission)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $permissionDB = Permission::where('name',$request->name)->get();
        if($permissionDB->count() > 0) {
            return back()->with('error','This name is already taken, Please try again');
        }

        $permission->update($validatedData);
        return redirect()->route('permissions.index')->with('success','Permission details updated successfully');
    }


    public function destroy($id)
    {
        //
    }


}
