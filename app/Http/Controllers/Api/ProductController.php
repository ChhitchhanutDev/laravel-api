<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return response()->json([
            'success' => true,
            'data' => $products
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created product.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $product = Product::create([
            'name' => $validated['name'],
            'category_id' => $validated['category_id'],
            'price' => $validated['price'],
            'image' => $validated['image'] ?? null,
            'stock' => $validated['stock'],
            'is_active' => $validated['is_active'] ?? true,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully.',
            'data' => $product
        ], Response::HTTP_CREATED);
    }

    /**
     * Display a single product.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $product
        ], Response::HTTP_OK);
    }
    /**
     * Update product.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);
        $product->update($validated);
        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully.',
            'data' => $product
        ], Response::HTTP_OK);
    }

    /**
     * Remove product.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully.'
        ], Response::HTTP_OK);
    }
}