<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function index()
    {
        return view('transaction.index');
    }

    public function create(Request $request, $role)
    {
        $search = $request['search'];

        if(request()->has('search')){
            $users = User::where(function ($query) {
            $query->where('name', 'LIKE', '%'.request('search').'%')
            ->where('role', 'Member')
            ->orWhere('classiqueID', 'LIKE', '%'.request('search').'%');
        })
        ->get();
    }

        return view('transaction.create', compact('role','users', 'search'));
    }

    public function showForm(Request $request, User $user)
    {
        // TO DO HERE 
        return view('');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Transaction $transaction)
    {
        //
    }

    public function edit(Transaction $transaction)
    {
        //
    }

    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    public function destroy(Transaction $transaction)
    {
        //
    }
}
