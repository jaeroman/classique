<?php

namespace App\Http\Controllers;

use App\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('Admin');
    }

    public function index()
    {
       $users = User::all();
       return view('users.index', compact('users'));
    }

    public function create()
    {
       return view('users.create');
    }

    public function store(Request $request)
    {
        $attributes = $this->validateAttributes();
        $attributes['password'] = Hash::make($request['password']);
        $attributes['role'] = 'Member';

        User::create($attributes);

        alert()->success('Successfully Added a Member!');
        return redirect('/user');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contactNo' => ['required', 'min:3']
        ]);

        $user->update($attributes);

        alert()->success('Successfully Edited!');
        return back();


    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }

    public function validateAttributes()
    {
        return request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'contactNo' => ['required', 'min:3']
        ]);
    }

}
