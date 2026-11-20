<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::with(['category', 'packages'])->get());
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $product = Product::create($data)->refresh();

        return new ProductResource($product->load(['category', 'packages']));
    }

    public function show(Product $product)
    {
        return new ProductResource($product->load(['category', 'packages']));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);

        return new ProductResource($product->load(['category', 'packages']));
    }

    public function destroy(Product $product)
    {
        return $product->delete()
            ? response()->noContent()
            : abort(500);
    }
}
