@extends('layouts.admin')

@section('title')
Confirm Transaction - Dashboard
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

                            <div class="field">
                                <label class="label">
                                    OR Number : 
                                </label>       
                                
                            </div>

                            <div class="field">
                                <label class="label">
                                    Member Name :  {{ $transactionDetails->transactionName }}
                                </label>       
                                
                            </div>

                            <div class="field">
                                <label class="label">
                                    Date:  {{ $transactionDetails->created_at->format('h:ia,  M d Y') }}
                                </label>       
                                
                            </div>


                            <div class="field">
                            <div class="panel-table is-desktop is-centered">
                            <table class="table is-hoverable pricingtable">
        
                                <thead>
                                    <tr>
                                        <th>NAME</th>
                                        <th>QUANTITY</th>
                                        <th>PRICE</th>
                                        <th>TOTAL</th>
                                        <th>BV Points</th>
                                        <th>Total BV</th>
                                        

                                    </tr>
                                </thead>
                        
                                <tbody>
                                    @foreach($transactionProducts as $item)
                                    <tr>
                                        <td>{{ $item->product->productName }}</td>
                                        <td>{{ $item->productQuantity }}</td>
                                        <td>&#8369;{{ number_format( $item->product->productPrice, 2, '.', ',') }}</td>
                                        <td>&#8369;{{ number_format( $item->product->productPrice * $item->productQuantity, 2, '.', ',') }}</td>
                                        <td>{{ $item->product->bvPoints }}</td>
                                        <td>{{ $item->product->bvPoints * $item->productQuantity }}</td>
                                   </tr>
                                @endforeach
                                </tbody>
                                Grand Total: 
                            </table>
                            
                            {{-- <div class="field">
                                <label class="label">
                                    Total Price
                                </label>
                                <p class="control">
                                    {{ number_format($product->productPrice * $quantity, 2, '.', ',') }}
                                </p>
                            </div>

                            <div class="field">
                                    <label class="label">
                                        BV Points
                                    </label>
                                    <p class="control">
                                        {{ $product->bvPoints }}
                                    </p>
                                </div> --}}
    

                            <!-- Buttons -->
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="/transactions/member" class="button is-info is-outlined">BACK</a>
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
