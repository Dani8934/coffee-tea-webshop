<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::withCount('products')->get());
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        $category = Category::create($data);

        return new CategoryResource($category);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category->loadCount('products'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);

        return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
        return $category->delete()
            ? response()->noContent()
            : abort(500);
    }
}
