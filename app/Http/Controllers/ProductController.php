<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pt = ProductType::all();
        return view('product.create', compact('pt'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $rules = [
            'name'=>'required',
            'cost'=>'required|numeric|min:0',
            'price'=>'required|numeric|min:0',
            'qty'=>'required|numeric|min:0',
            'product_type_id'=>'required|numeric|min:0',
        ];
        request()->validate($rules);

        $product = new Product();
        $product->name = $request ->name;
        $product->cost = $request-> cost;
        $product->price = $request-> price;
        $product->qty = $request-> qty;
        $product->product_type_id = $request-> product_type_id;
        //$product->user_id = $user_id;
        $product->save();
        return redirect()->route('products.index')->with('status','บันทึกข้อมูลสำเร็จ');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
