@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Stocks - {{ $stock->products->productName }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                      
                    <form method="POST" action="/stock/{{ $stock->id }}/{{ $stock->products->id }}">
                    @csrf
                    @method('PATCH')
                   
                            <div class="form-group">
                              <label>Quantity</label>
                            <input type="text" class="form-control" name="stocksQuantity" placeholder="Enter Quantity" value="{{ $stock->stocksQuantity }}" required>
                              
                            </div>
                           
                            <div class="form-group">
                              <label>Date Arrived</label>
                              <input type="date" class="form-control" name="dateArrived" value="{{ $stock->dateArrived }}" required>
                            </div>

                            <div class="form-group">
                                <label>Expiration Date</label>
                                <input type="date" class="form-control" name="expirationDate" required>
                              </div>
<br>
                            <a class="btn btn-warning" href="/stock/{{ $stock->products->id }}">Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
