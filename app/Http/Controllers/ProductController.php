<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Alert;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Product $product)
    {
         $product = Product::all();
         return view('product.index', compact('product'));  
    }


    public function create()
    {
        $productType = ProductType::all();
        return view('product.create', compact('productType'));
    }


    public function store(Request $request)
    {
        
        $attributes = $this->validateAttributes();
        $attributes['product_type_id'] = $request['product_type_id'];
        
        Product::create($attributes);

        alert()->success('Successfully Added a Product!');
        return redirect('/product');
    }


    public function show(Product $product)
    {
        
    }

    public function edit(Product $product)
    {
        $productType = ProductType::all();
        return view('product.edit', compact('product', 'productType'));
    }


    public function update(Request $request, Product $product)
    {
        $productType = ProductType::all();
        
        $attributes = $this->validateAttributes();

        $product->update($attributes);

        alert()->success('Successfully Edited!');
        return redirect('/product');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        
        return redirect('/product');
    }

    public function validateAttributes()
    {
        return request()->validate([
            'productName' => ['required', 'min:3'],
            'product_type_id' => ['required'],
            'productDescription' => ['required', 'min:3'],
            'productPrice' => ['required', 'min:3']
        ]);
    }
}
