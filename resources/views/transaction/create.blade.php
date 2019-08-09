@extends('layouts.admin')

@section('title')
Member Transaction - Dashboard
@endsection

@section('content')



@include('includes.sidebar')

<div class="column is-main-content">
    {{-- <form method="POST" action="/transactions">
        @csrf
        <div class="columns is-centered">
            <div class="column is-6">
                <div class="panel">
                    <p class="panel-heading has-text-black-bis">
                        ADD PRODUCTS
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
                                        value="{{ (old('productName')) }}" required />
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
                <option selected disabled>Select the type of product</option>
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
        <input class="input" type="text" placeholder="Price" name="productPrice" value="{{ (old('productPrice')) }}"
            required />
    </p>
</div>

<!-- Points -->
<div class="field">
    <label class="label">
        BV Points
    </label>
    <p class="control">
        <input class="input" type="text" placeholder="Price" name="bvPoints" value="{{ (old('bvPoints')) }}" required />
    </p>
</div>

<!-- Description -->
<div class="field">
    <label class="label">
        Product Description
    </label>
    <p class="control">
        <textarea class="textarea" name="productDescription"></textarea>
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
</form> --}}

@if ($role == 'member')
<h1>Seach the name or Classique ID of the member</h1>
<form>
    <div class="field has-addons ">
        <div class="control">
            <input class="input" type="text" value="{{ isset($search) ? $search : '' }}" name="search"
                placeholder="Search....">
        </div>
        <div class="control">
            <button type="submit" class="button is-info is-outlined">Search</button>
        </div>

    </div>

</form>


@if($search)

<div class="panel-table is-desktop is-centered">
    <table class="table is-hoverable pricingtable">
        
        <thead>
            <tr>
                <th>CLASSIQUE ID</th>
                <th>NAME</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $item)
            <tr>
                <td><a href="/transactions/member/{{$item->id}}">{{ $item->classiqueId }}</a></td>
                <td><a href="/transactions/member/{{$item->id}}">{{ $item->name }}</a></td>
                <td></td>
                </form>
           </tr>
            @endforeach

            @endif
        </tbody>
    </table>
<br>
    <a href="/transactions" class="button is-info is-outlined">BACK</a>
</div>
@else

@endif
</div>
</div>

@endsection
