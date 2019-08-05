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

    public function index(Request $request)
    {

        $search = $request['search'];

    if(request()->has('search')){
              $users = User::where(function ($query) {
              $query->where('name', 'LIKE', '%'.request('search').'%')
              ->where('role', 'Member');
            //   ->orWhere('classiqueID', 'LIKE', '%'.request('search').'%');
          })
          ->paginate(5);
      }

      else{
          $users = User::where('role', 'Member')->orderBy('name')->paginate(5);
      }

       return view('users.index', compact('users', 'search'));
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
            'classiqueId' => ['min:0'],
            'confirmationNo' => ['min:0'],
            'triNo' => ['min:0'],
            'effectivityDateFrom' => ['min:0'],
            'effectivityDateTo' => ['min:0'],
            'email' => ['required', 'string', 'email', 'max:255']
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
            'classiqueId' => ['min:0'],
            'confirmationNo' => ['min:0'],
            'triNo' => ['min:0'],
            'effectivityDateFrom' => ['min:0'],
            'effectivityDateTo' => ['min:0'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


}
