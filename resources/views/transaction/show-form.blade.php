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
                                    MEMBER NAME
                                </label>
                                <p class="control">
                                    {{ $user->name }}
                                </p>
                            </div>

                            <form method="POST" action="/transactions-products/">
                                @csrf
                                <div id="itemRows">
                                <input class="input" type="hidden" value="{{ $transactionID }}" name="transaction_id">
                
                               <label class="label">
                                    ITEM QUANTITY:
                                </label>
                            
                               <input type="text" name="productQuantity[]" class="formfield" placeholder="Enter Quantity" required>
                                
                                 <br>
                                 <br>
                      
                                 <label class="label">
                                        PRODUCT:
                                    </label>

                                    <div class="field has-addons product">
                                            <div class="control is-expanded">
                                              <div class="select is-fullwidth">
                                                    <select name="productName[]" required>
                                                            <option selected disabled>Select the Product</option>
                                                            @foreach ($products as $item)
                                                        <option value="{{ $item->id }}">{{ $item->productName }}</option>
                                                            @endforeach
                                                        </select> 
                                              </div>
                                            </div>
                                            <div class="control">
                                              <button onclick="addRow(this.form);" type="button" value="Add Product" class="button is-info">Add other item</button>
                                            </div>
                                          </div>
                                   
                                </div>
                                <br><br>

                            <!-- Buttons -->
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="{{ route('transactions.delete', $transactionID) }}" class="button is-info is-outlined">CANCEL</a>
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

// var row = '<p id="rowNum'+rowNum+'"><label class="label">ITEM QUANTITY: </label><input type="text" name="productQuantity[]" class="formfield"><label class="label">PRODUCT: </label><div class="field has-addons product"><div class="control is-expanded"><select name="productName[]"> <option selected disabled>Select the Product</option> @foreach ($products as $item) <option value="{{ $item->id }}">{{ $item->productName }}</option> @endforeach <br><input type="button" value="Remove" class="button is-info"  onclick="removeRow('+rowNum+');"></p>';
    var row = '<p id="rowNum'+rowNum+'"> <label class="label">ITEM QUANTITY: </label> <input type="text" name="productQuantity[]" placeholder="Enter Quantity class="formfield" required> <div id="rowNum'+rowNum+'" class="field has-addons product"><div class="control is-expanded"> <div class="select is-fullwidth"> <select name="productName[]" required> <option selected disabled>Select the Product</option> @foreach ($products as $item) <option value="{{ $item->id }}">{{ $item->productName }}</option> @endforeach </select></div></div><input type="button" class="button is-info" value="Remove" onclick="removeRow('+rowNum+');"></p>';


jQuery('#itemRows').append(row);

// frm.productQuantity.value = '';

// frm.productName.value = '';

}

function removeRow(rnum) {
jQuery('#rowNum'+rnum).remove();
}


</script>

@endsection
