<?php

namespace App\Http\Controllers;

use App\Stock;
use Alert;
use Illuminate\Http\Request;

class StockController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }


    public function create($id)
    {
        $productName = Stock::where('product_id', $id)->first();
        $stocks = Stock::where('product_id', $id)->get();

        return view('stock.create', compact('stocks', 'id', 'productName'));
    }


    public function store(Request $request)
    {
        $attributes = $this->validateAttributes();

        $attributes['product_id'] = $request['product_id'];

        Stock::create($attributes);

        alert()->success('Successfully Added!');
        return redirect()->route('stock.show', $attributes['product_id']);
    }

    public function show($id)
    {

        $productName = Stock::where('product_id', $id)->first(); //getting the product name

        $stocks = Stock::where('product_id', $id)->orderBy('dateArrived', 'DESC')->paginate(5); // getting the stocks

        return view('stock.show', compact('productName', 'stocks','id'));
    }


    public function edit(Stock $stock)
    {
        return view('stock.edit', compact('stock')); 
    }


    public function update(Request $request, Stock $stock, $product_id)
    {
        $attributes = $this->validateAttributes();
        $attributes['product_id'] = $product_id;

        $stock->update($attributes);

        alert()->success('Successfully Edited!');
        return redirect()->route('stock.show', $product_id);
    }


    public function destroy(Stock $stock)
    {
        $stock->delete();
        alert()->success('Successfully Deleted!');

        return back();
    }

    public function validateAttributes()
    {
        return request()->validate([
            'stocksQuantity' => ['required'],
            'dateArrived' => ['required'],
            'expirationDate' => ['required', 'min:3']
        ]);
    }
}
