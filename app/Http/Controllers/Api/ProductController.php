<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cost' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'qty' => 'required|numeric|min:0', // แก้ไขเป็น numeric ตามที ่ระบุในฐานข้อมูล
            'image_path' => 'nullable|string|max:255',
            'image_url' => 'nullable|string|max:255',
            'product_type_id' => 'required|integer', // เพิ ่มการตรวจสอบ

        ]);
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'ไม่พบสินค้า'], 404);
        }
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'ไม่พบสินค้า'], 404);
        }
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'cost' => 'sometimes|required|numeric|min:0',
            'price' => 'sometimes|required|numeric|min:0',
            'qty' => 'sometimes|required|numeric|min:0',
            'product_type_id' => 'sometimes|required|integer']);
        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'ไม่พบสินค้า'], 404);
        }
        $product->delete();
        return response()->json(['message' => 'ลบสินค้าเรียบร้อยแล้ว'], 204);
    }
}
