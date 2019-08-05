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

    public function index(Request $request, Product $product)
    {

        $search = $request['search'];
          if(request()->has('search')){
                $product = Product::where(function ($query) {
                $query->where('productName', 'LIKE', '%'.request('search').'%');
            })
            ->paginate(5);
        }

        else{
            $product = Product::orderBy('created_at')->paginate(7);
           
        }

         return view('product.index', compact('product', 'search'));  
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
        return back();
    }

    public function destroy(Product $product)
    {
        $product->delete();
        alert()->success('Successfully Deleted!');

        return redirect('/product');
    }

    public function validateAttributes()
    {
        return request()->validate([
            'productName' => ['required', 'min:3'],
            'product_type_id' => ['required'],
            'bvPoints' => ['required'],
            'productPrice' => ['required', 'min:3']
        ]);
    }
}
