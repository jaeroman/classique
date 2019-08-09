@extends('layouts.admin')

@section('title')
@if($stocks->count())
{{ $productName->products->productName }} - Add Stocks
@else
Add Stocks
@endif
@endsection

@section('content')

@include('includes.sidebar')

<div class="column is-main-content">
    <form method="POST" action="/stock">
        @csrf
        <div class="columns is-centered">
            <div class="column is-6">
                <div class="panel">
                    <p class="panel-heading has-text-black-bis">
                        @if($stocks->count())
                        {{ $productName->products->productName }}
                        @else
                        Add Stocks
                        @endif
                    </p>
                    <div class="panel-block">
                        <input type="hidden" value="{{ $id }}" name="product_id">
                        <div class="card">
                            @include('includes.errors')
                            <!-- Quantity -->
                            <div class="field">
                                <label class="label">
                                    Quantity
                                </label>
                                <p class="control">
                                    <input class="input" type="text" placeholder="Quantity" name="stocksQuantity"
                                        required />
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
                                    <a href="/stock/{{ $id }}" class="button is-info is-outlined">BACK</a>
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
