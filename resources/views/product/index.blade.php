@extends('layouts.admin')

@section('title')
Inventory - Dashboard
@endsection

@section('content')

@include('includes.sidebar')

<div class="column is-main-content">
    <h1 class="has-text-centered has-text-black-bis is-size-4">INVENTORY</h1>

          <div class="container">
              <form>
                  <div class="field has-addons is-pulled-right">
                      <div class="control">
                        <input class="input" type="text" placeholder="Search....">
                      </div>
                      <div class="control">
                        <a class="button is-info is-outlined">
                          Search
                        </a>
                      </div>
                      
                  </div>
                 <div class="field has-addons is-pulled-left">
                    <a href="/product/create" class="button is-info is-outlined">Add Products</a>
              
                </div>

              </form>
            </div>

<div class="panel-table is-desktop is-centered">
    <table class="table is-hoverable pricingtable">
        
        <thead>
            <tr>
                <th>NAME</th>
                <th>PRICE</th>
                <th>TYPE</th>
                <th>ACTION</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($product as $item)
            <tr>
                <form method="POST" action="/product/{{ $item->id }}">
                <td>{{ $item->productName }}</td>
                <td>{{ $item->productPrice }}</td>
                <td>{{ $item->productType->type }}</td>
                <td>
                  <a href="/product/{{$item->id}}/edit" class="button is-primary is-outlined">Edit</a>

                  
                    @csrf
                    @method('DELETE')
                    <a onclick="return confirm('Are you sure?')"> <button class="button is-danger is-outlined" type="submit" >Delete</button></a>

                  <a href="/stock/{{$item->id}}" class="button is-info is-outlined">Stocks</a></td>
                </form>
           </tr>
            @endforeach
           
        </tbody>
    </table>
    
    
</div>


            
           


  </div> 

        </div>









{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">INVENTORY</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/product/create" class="btn btn-danger">ADD</a>
                        
                   


                        <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Type</th>
                                    <th scope="col"></th>
                                    <th scope="col">Action</th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($product as $item)
                                  <tr>
                                    <td>{{ $item->productName }}</td>
                                    <td>{{ $item->productDescription }}</td>
                                    <td>{{ $item->productPrice }}</td>
                                    <td>{{ $item->productType->type }}</td>
                                    <td><a class="btn btn-warning" href="/product/{{ $item->id }}/edit">EDIT</a></td>
                                    <td> <form method="POST" action="/product/ {{ $item->id }}">
                                      @csrf
                                      @method('DELETE')
                                      <a onclick="return confirm('Are you sure?')"> <button type="submit" class="btn btn-danger">DELETE</button></a>
                                      </form></td>
                                    <td><a class="btn btn-success" href="/stock/{{ $item->id }}">SHOW STOCKS</a></td>
                                  </tr>
                                @endforeach
                                </tbody>
                              </table>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
