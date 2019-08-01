@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">MEMBERS</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/user/create" class="btn btn-danger">ADD A MEMBER</a>
                        
                   


                        <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Action</th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $item)
                                  <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->contactNo }}</td>
                                    <td><a class="btn btn-warning" href="/user/{{ $item->id }}/edit">EDIT</a></td>
                                    <td> <form method="POST" action="/user/{{ $item->id }}">
                                      @csrf
                                      @method('DELETE')
                                      <a onclick="return confirm('Are you sure?')"> <button type="submit" class="btn btn-danger">DELETE</button></a>
                                      </form></td>
                                  </tr>
                                @endforeach
                                </tbody>
                              </table>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
