<?php

namespace App\Http\Controllers;

use App\TransactionProduct;
use App\Product;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class TransactionProductsController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $productID = $request['productName'];

        $product = Product::find($productID);
        
        // inserting of data on the table
        for ($i = 0; $i < count($request->productQuantity); $i++) {
            $products[] = [
                'transaction_id' => $request->transaction_id,
                'productQuantity' => $request->productQuantity[$i],
                'productName' => $request->productName[$i]
            ];
           
        }
        TransactionProduct::insert($products);

        // computing the total amount of all the products
        $transactionProducts = TransactionProduct::where('transaction_id', $request->transaction_id)->get();
        $transactionDetails = Transaction::find($request->transaction_id);

        for ($i = 0; $i < count($transactionProducts); $i++) 
        {

            $total[] = [
                $transactionProducts[$i]->productQuantity * $transactionProducts[$i]->product->productPrice,
            ];
            
        }

        // TO DO HERE
        // TOTAL

          return view('transaction.view', compact('product', 'total', 'transactionProducts', 'transactionName', 'transactionDetails'));
       
    }

    public function view()
    {

        return view('transaction.view');
    }


    public function show(TransactionProduct $transactionProduct)
    {
        //
    }


    public function edit(TransactionProduct $transactionProduct)
    {
        //
    }


    public function update(Request $request, TransactionProduct $transactionProduct)
    {
        //
    }


    public function destroy(TransactionProduct $transactionProduct)
    {
        //
    }
}
