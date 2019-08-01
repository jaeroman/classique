@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">EDIT PRODUCT</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/product/{{ $product->id }}">
                    @csrf
                    @method('PATCH')
                            <div class="form-group">
                              <label>Product Name</label>
                              <input type="text" class="form-control" name="productName" placeholder="Enter Product name" value="{{ $product->productName }}" required>
                              
                            </div>
                            <div class="form-group">
                                <label for="sel1">Product Type:</label>
                                <select name="product_type_id" class="form-control">
                                @foreach ($productType as $item)  
                                    <option value="{{ $item->id }}">{{ $item->type }}</option>
                                @endforeach
                                </select>
                              </div> 
                            <div class="form-group">
                              <label>Product Price</label>
                              <input type="text" class="form-control" name="productPrice" placeholder="Enter Product price" value="{{ $product->productPrice }}" required>
                            </div>
                            <label>Product Description</label><br>
                            <textarea name="productDescription" id="" cols="50" rows="5">{{ $product->productDescription }}</textarea>
<br>
                            <a class="btn btn-warning" href="/product">Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
