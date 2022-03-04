<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.users.index',compact('users'));
    }


    public function create()
    {
        $roles = Role::all()->pluck('name','id');
        return view('pages.users.create',compact('roles'));
    }

    public function show(User $user)
    {
        return view('pages.users.show',compact('user'));
    }

    public function store(StoreUserRequest $storeUserRequest)
    {
        $user = User::create($storeUserRequest->all());
        $user->roles()->sync($storeUserRequest->input('roles',[]));

        return redirect()->route('users.index')->with('success','The new user has been created successfully');
    }

    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name','id');
        $user->load('roles');

        return view('pages.users.edit',compact('roles','user'));
    }

    public function update(User $user, UpdateUserRequest $updateUserRequest)
    {
        $user->update($updateUserRequest->all());
        $user->roles()->sync($updateUserRequest->input('roles',[]));

        return redirect()->route('users.index')->with('success','The user has been updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success','User has been deleted successfully');
    }

    public function destroyMany(Request $request)
    {
        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:users,id',
        ]);

        User::whereIn('id',request('ids'))->delete();
        Session::flash('success','Successfully deleted selected users');
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
