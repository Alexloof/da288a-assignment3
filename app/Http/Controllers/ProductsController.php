<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Store;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view("products.index", [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = Store::all();
        return view("products.create", ['stores' => $stores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->title = $request->input("title");
        $product->brand = $request->input("brand");
        $product->price = $request->input("price");
        $product->image = $request->input("image");
        $product->description = $request->input("description");
        $product->save();

        $stores = $request->input("stores");
        $product->stores()->attach($stores);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $product->stores = $product->stores;
        $product->reviews = $product->reviews;
        return view("products.show", [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $product->storesId = array_column($product->stores->toArray(), 'id');
        $stores = Store::all();
        return view("products.edit", [
            'product' => $product,
            'stores' => $stores,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->input("title");
        $product->brand = $request->input("brand");
        $product->price = $request->input("price");
        $product->image = $request->input("image");
        $product->description = $request->input("description");

        $product->save();

        $product->stores()->detach();
        $stores = $request->input("stores");
        $product->stores()->attach($stores);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->stores()->detach();
        Product::destroy($id);
        return redirect()->route('products.index');
    }
}
