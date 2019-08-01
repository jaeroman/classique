@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if($stocks->count())
                  {{ $productName->products->productName }}
                  @else
                  Stocks
                  @endif
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                      <a href="/stock/{{ $id }}/create" class="btn btn-danger">ADD</a>
                        
                   


                        <table class="table">
                                <thead>
                               
                                  <tr>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Date Arrived</th>
                                    <th scope="col">Expiration Date</th>
                                    <th scope="col"></th>
                                    <th scope="col">Action</th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                @if($stocks->count())
                                @foreach ($stocks as $item)
                                  <tr>
                                    <td>{{ $item->stocksQuantity }}</td>
                                    <td>{{ $item->dateArrived->format('M d, Y') }}</td>
                                    <td>{{ $item->expirationDate->format('M d, Y') }}</td>
                                    
                                    <td><a class="btn btn-warning" href="/stock/{{ $item->id }}/edit">EDIT</a></td>
                                    <td> <form method="POST" action="/stock/{{ $item->id }}">
                                      @csrf
                                      @method('DELETE')
                                     <a onclick="return confirm('Are you sure?')"> <button type="submit" class="btn btn-danger">DELETE</button></a>
                                      </form></td>
                                   
                                  </tr>
                                @endforeach 
                                @endif
                                </tbody>
                               
                              </table>
                              <a class="btn btn-warning" href="/product">Back</a>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endsection
