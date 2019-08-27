<?php

namespace App\Http\Controllers;

use App\TransactionProduct;
use App\Product;
use App\Transaction;
use App\User;
use App\Stock;
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
    
        // inserting of data on the table
        for ($i = 0; $i < count($request->productQuantity); $i++) {
            $product = Product::find($request->productName[$i]);
            $price = $product->productPrice;
            $bv = $product->bvPoints;

            $products[] = [
                'transaction_id' => $request->transaction_id,
                'productQuantity' => $request->productQuantity[$i],
                'productName' => $request->productName[$i],
                'totalAmount' => $request->productQuantity[$i] * $price,
                'totalBV' => $request->productQuantity[$i] * $bv,
            ];
           
        }
        TransactionProduct::insert($products);

        $transactionProducts = TransactionProduct::where('transaction_id', $request->transaction_id)->get();
        $transactionDetails = Transaction::find($request->transaction_id);
        $transactionID = $request->transaction_id;

        foreach ($transactionProducts as $item)
        {
            $quantity = $item->productQuantity;
            $productID = $item->product->id;

            $productStocks = Stock::where('product_id', $productID)->
            where('stocksQuantity', '!=' , 0 )->first();

            $stocksQuantity = $productStocks->stocksQuantity;
            $newQuantity = $stocksQuantity - $quantity;

            if ($newQuantity < 0)
            {
                $noStocks = 'Available is '.$stocksQuantity. 'on the latest stocks';
                alert()->error('The stocks available is only '.$stocksQuantity.' pcs on the latest stocks.');
                return back();  
                break;
            }
            else
            {
                $stocks['stocksQuantity'] = $newQuantity;
                $productStocks->update($stocks);
            }

        }


        //Inputting of total bv and amount on database
        $grandTotal = TransactionProduct::where('transaction_id', $request->transaction_id)->sum('totalAmount');
        $grandBV = TransactionProduct::where('transaction_id', $request->transaction_id)->sum('totalBV');

        $transaction = Transaction::find($request->transaction_id);
        $attributes['transactionTotal'] = $grandTotal;
        $attributes['transactionTotalBV'] = $grandBV;

        $transaction->update($attributes);


        

          return view('transaction.view', compact('noStocks', 'grandTotal', 'grandBV', 'transactionProducts', 'transactionName', 'transactionDetails', 'grandTotal', 'transactionID'));
       
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


    public function delete($id)
    {
         $transactionProduct = TransactionProduct::where('transaction_id', $id);

         $transactionProduct->delete();

         return view('transaction.index');
    }


    public function destroy(TransactionProduct $transactionProduct)
    {
        //
    }
}
