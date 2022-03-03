<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

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


    public function show(Permission $permission)
    {
        return view('pages.permissions.show',compact('permission'));
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


    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('success','Permission has been deleted successfully');
    }

    public function destroyAll(Request $request) {
        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:permissions,id',
        ]);

        Permission::whereIn('id',request('ids'))->delete();
        Session::flash('success','Successfully deleted selected permissions');
        return response(null, Response::HTTP_NO_CONTENT);
    }


}
