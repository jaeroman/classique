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
                        <input class="input" type="text" value="{{ isset($search) ? $search : '' }}" name="search" placeholder="Search....">
                      </div>
                      <div class="control">   
                          <button type="submit" class="button is-info is-outlined">Search</button>   
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
                <th>TYPE</th>
                <th>NAME</th>
                <th>PRICE</th>
                <th>BV</th>
                <th>ACTION</th>
            </tr>
        </thead>

        <tbody>
            @if($product->count())
            @foreach ($product as $item)
            <tr>
                <form method="POST" action="/product/{{ $item->id }}">
                <td>{{ $item->productType->type }}</td>
                <td>{{ $item->productName }}</td>
                <td>&#8369;{{ number_format($item->productPrice, 2, '.', ',') }}</td>
                <td>{{ $item->bvPoints }}</td>
                <td>
                  <a href="/product/{{$item->id}}/edit" class="button is-primary is-outlined">Edit</a>

                  
                    @csrf
                    @method('DELETE')
                    <a onclick="return confirm('Are you sure?')"> <button class="button is-danger is-outlined" type="submit" >Delete</button></a>

                  <a href="/stock/{{$item->id}}" class="button is-info is-outlined">Stocks</a></td>
                </form>
           </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    
    {{-- {{ $product->links()  }}  --}}
    {{ $product->appends(['search' => $search])->links() }}
</div>

  </div> 

        </div>

@endsection
