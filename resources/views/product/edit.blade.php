@extends('layouts.admin')

@section('title')
Edit Product - Dashboard
@endsection

@section('content')

@include('includes.sidebar')

<div class="column is-main-content">
    <form method="POST" action="/product/{{$product->id}}">
        @csrf
        @method('PATCH')
        <div class="columns is-centered">
            <div class="column is-6">
                <div class="panel">
                    <p class="panel-heading has-text-black-bis">
                        EDIT PRODUCT
                    </p>
                    <div class="panel-block">

                        <div class="card">
                            @include('includes.errors')
                            <!-- Name -->
                            <div class="field">
                                <label class="label">
                                    Product Name
                                </label>
                                <p class="control">
                                    <input class="input" type="text" placeholder="Name" name="productName"
                                        value="{{ $product->productName }}" required />
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
                                    <input class="input" type="text" placeholder="Price" name="productPrice"
                                        value="{{ $product->productPrice }}" required />
                                </p>
                            </div>

                            <!-- Points -->
                            <div class="field">
                                <label class="label">
                                    BV Points
                                </label>
                                <p class="control">
                                    <input class="input" type="text" placeholder="BV Points" name="bvPoints"
                                        value="{{ $product->bvPoints }}" required />
                                </p>
                            </div>

                            <!-- Description -->
                            <div class="field">
                                <label class="label">
                                    Product Description
                                </label>
                                <p class="control">
                                    <textarea class="textarea"
                                        name="productDescription">{{ $product->productDescription }}</textarea>
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
