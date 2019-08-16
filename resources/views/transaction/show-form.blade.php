@extends('layouts.admin')

@section('title')
New Transaction - Dashboard
@endsection

@section('content')



@include('includes.sidebar')

<div class="column is-main-content">
        <div class="columns is-centered">
            <div class="column is-6">
                <div class="panel">
                    <p class="panel-heading has-text-black-bis">
                        New Transaction
                    </p>
                    <div class="panel-block">

                        <div class="card">
                            @include('includes.errors')
                            <!-- Name -->
                            <div class="field">
                                <label class="label">
                                    Member Name
                                </label>
                                <p class="control">
                                    {{ $user->name }}
                                </p>
                            </div>

                            {{-- <div class="field">
                                <label class="label">
                                    Product
                                </label>
                                <p class="control">
                                    <div class="select">
                                        <select name="product_type_id">
                                            <option selected disabled>Select the Product</option>
                                            @foreach ($products as $item)
                                        <option value="{{ $item->name }}">{{ $item->productName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input class="input" type="text" placeholder="Price" name="productPrice"
                                    value="{{ (old('productPrice')) }}" required />
                                </p>
                            </div> --}}

                            <form method="POST" action="/transactions-products/">
                                @csrf
                                <div id="itemRows">
                                <input type="hidden" value="{{ $transactionID }}" name="transaction_id">
                                Item quantity: <input type="text" name="productQuantity[]" size="4" /> <br>
                                Product: 
                                <select name="productName[]">
                                    <option selected disabled>Select the Product</option>
                                    @foreach ($products as $item)
                                <option value="{{ $item->id }}">{{ $item->productName }}</option>
                                    @endforeach
                                </select> <input onclick="addRow(this.form);" type="button" value="Add Product" />
                                 
                                </div>


                            {{-- <!-- Products -->
                            <div class="field">
                                <label class="label">
                                    Product Price
                                </label>
                                <p class="control">
                                    <input class="input" type="text" placeholder="Price" name="productPrice"
                                        value="{{ (old('productPrice')) }}" required />
                                </p>
                            </div>

                            <!-- Points -->
                            <div class="field">
                                <label class="label">
                                    BV Points
                                </label>
                                <p class="control">
                                    <input class="input" type="text" placeholder="Price" name="bvPoints"
                                        value="{{ (old('bvPoints')) }}" required />
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
                            </div> --}}

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



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
var rowNum = 0;

function addRow(frm) {

rowNum ++;

// var row = '<p id="rowNum'+rowNum+'">Item quantity: <input type="text" name="productQuantity[]" size="4" value="'+frm.productQuantity.value+'"> Item name: <input type="text" name="name[]" value="'+frm.add_name.value+'"> <input type="button" value="Remove" onclick="removeRow('+rowNum+');"></p>';

var row = '<p id="rowNum'+rowNum+'">Item quantity: <input type="text" name="productQuantity[]" size="4"> <select name="productName[]"> <option selected disabled>Select the Product</option> @foreach ($products as $item) <option value="{{ $item->id }}">{{ $item->productName }}</option> @endforeach <input type="button" value="Remove" onclick="removeRow('+rowNum+');"></p>';



jQuery('#itemRows').append(row);

// frm.productQuantity.value = '';

// frm.productName.value = '';

}

function removeRow(rnum) {
jQuery('#rowNum'+rnum).remove();
}


</script>

@endsection
