<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductPackageRequest;
use App\Http\Requests\UpdateProductPackageRequest;
use App\Http\Resources\ProductPackageResource;
use App\Models\Product;
use App\Models\ProductPackage;

class ProductPackageController extends Controller
{
    public function store(StoreProductPackageRequest $request, Product $product)
    {
        $data = $request->validated();
        $package = $product->packages()->create($data);

        return new ProductPackageResource($package);
    }

    public function update(UpdateProductPackageRequest $request, ProductPackage $package)
    {
        $data = $request->validated();
        $package->update($data);

        return new ProductPackageResource($package);
    }

    public function destroy(ProductPackage $package)
    {
        return $package->delete()
            ? response()->noContent()
            : abort(500);
    }
}
