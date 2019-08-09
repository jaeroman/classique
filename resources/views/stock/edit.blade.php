@extends('layouts.admin')

@section('title')
{{ $stock->products->productName }} - Edit Stocks
@endsection

@section('content')

@include('includes.sidebar')

<div class="column is-main-content">
    <form method="POST" action="/stock/{{ $stock->id }}/{{ $stock->products->id }}">
        @csrf
        @method('PATCH')
        <div class="columns is-centered">
            <div class="column is-6">
                <div class="panel">
                    <p class="panel-heading has-text-black-bis">
                        {{ $stock->products->productName }}
                    </p>
                    <div class="panel-block">
                        <div class="card">
                            @include('includes.errors')
                            <!-- Quantity -->
                            <div class="field">
                                <label class="label">
                                    Quantity
                                </label>
                                <p class="control">
                                    <input class="input" type="text" placeholder="Quantity" name="stocksQuantity"
                                        value="{{ $stock->stocksQuantity }}" required />
                                </p>
                            </div>

                            <!-- Date Arrived -->
                            <div class="field">
                                <label class="label">
                                    Date Arrived
                                </label>
                                <p class="control">
                                    <input class="input" type="date" name="dateArrived" />
                                </p>
                            </div>

                            <!-- Expiration Date -->
                            <div class="field">
                                <label class="label">
                                    Expiration Date
                                </label>
                                <p class="control">
                                    <input class="input" type="date" name="expirationDate" />
                                </p>
                            </div>

                            <!-- Buttons -->
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="/stock/{{ $stock->products->id }}"
                                        class="button is-info is-outlined">BACK</a>
                                    <button type="submit" class="button is-success is-outlined">SUBMIT</button>
                                </p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </form>
</div>
</div>

@endsection









{{-- 











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
            <input type="text" class="form-control" name="stocksQuantity" placeholder="Enter Quantity"
                value="{{ $stock->stocksQuantity }}" required>

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
@endsection --}}
