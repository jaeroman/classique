@extends('layouts.admin')

@section('title')
Edit Product - Dashboard
@endsection

@section('content')

@include('includes.sidebar')

<div class="column is-main-content">
    <form method="POST" action="/product">
    @csrf
        <div class="columns is-centered">
                <div class="column is-6">
                  <div class="panel">
                    <p class="panel-heading has-text-black-bis">
                      EDIT PRODUCT
                    </p>
                    <div class="panel-block">
               
                      <div class="card">
            
                    <!-- Name -->
                    <div class="field">
                        <label class="label">
                            Product Name
                        </label>
                        <p class="control">
                            <input class="input" type="text" placeholder="Name" name="productName" value="{{ $product->productName }}"/>
                        </p>
                    </div>
    
                    <!-- Type -->
                    <div class="field">
                        <label class="label">
                            Product Type
                        </label>
                        <p class="control">
                                <div class="select">
                            <select name="product_type_id">
                                @foreach ($productType as $item)  
                                    <option value="{{ $item->id }}">{{ $item->type }}</option>
                                @endforeach
                            </select>
                            </div>
                        </p>
                    </div>
    
                    <!-- Price -->
                    <div class="field">
                        <label class="label">
                            Product Price
                        </label>
                        <p class="control">
                            <input class="input" type="text" placeholder="Price" name="productPrice" value="{{ $product->productPrice }}"/>
                        </p>
                    </div>
            
                    <!-- Description -->
                    <div class="field">
                        <label class="label">
                            Product Description
                        </label>
                        <p class="control">
                                <textarea class="textarea" name="productDescription">{{ $product->productDescription }}</textarea>
                        </p>
                    </div>
                   
                    <!-- Buttons -->
                    <div class="field is-grouped">
                        <p class="control">
                            <a href="/product" class="button is-info is-outlined">BACK</a>
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
@endsection --}}
