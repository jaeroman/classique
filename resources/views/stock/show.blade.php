@extends('layouts.admin')

@section('title')
@if($stocks->count())
{{ $productName->products->productName }} - Stocks
@else
Stocks - Dashboard
@endif
@endsection

@section('content')

@include('includes.sidebar')

<div class="column is-main-content">
    <h1 class="has-text-centered has-text-black-bis is-size-4"> 
      @if($stocks->count())
      {{ $productName->products->productName }}
      @else
      Stocks
      @endif</h1>

          <div class="container">
              <form>
                  <div class="field has-addons is-pulled-right">
                      <div class="control">
                        
                      </div>
                      <div class="control">

                      </div>
                      
                  </div>
                 <div class="field has-addons is-pulled-left">
                    <a href="/stock/{{ $id }}/create" class="button is-info is-outlined">Add Stocks</a>
              
                </div>

              </form>
            </div>

<div class="panel-table is-desktop is-centered">
    <table class="table is-hoverable pricingtable">
        
        <thead>
            <tr>
                <th>QUANTITY</th>
                <th>DATE ARRIVED</th>
                <th>EXPIRATION DATE</th>
                <th>ACTION</th>
            </tr>
        </thead>

        <tbody>
            @if($stocks->count())
            @foreach ($stocks as $item)
            <tr>
                <form method="POST" action="/stock/{{ $item->id }}">
                  <td>{{ $item->stocksQuantity }}</td>
                  <td>{{ $item->dateArrived->format('M d, Y') }}</td>
                  <td>{{ $item->expirationDate->format('M d, Y') }}</td>
                  <td>
                  <a href="/stock/{{$item->id}}/edit" class="button is-primary is-outlined">Edit</a>
                    @csrf
                    @method('DELETE')
                    <a onclick="return confirm('Are you sure?')"> <button class="button is-danger is-outlined" type="submit" >Delete</button></a>

                </form>
           </tr>
            @endforeach
           @endif
        </tbody>
    </table>
    
    {{ $stocks->links() }}

</div>

  </div> 

        </div>

@endsection
