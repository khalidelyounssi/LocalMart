<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Nette\Utils\Image;

class CategoryController extends Controller
{
    public function index()
    {
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $activeCategories = Category::where('is_active' , 1)->count();
        $desactiveCategories = Category::where('is_active' , 0)->count();
        $categories = Category::withCount('products')->get();
        return view('admin.categories.index', compact('categories' , 'totalCategories' , 'totalProducts' , 'activeCategories' , 'desactiveCategories'));
    }
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'is_active' => 'required|boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $request->slug,
            'is_active' => $request->is_active,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function show($id) {}
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }
    public function update(Request $request, Category $category)
    {
        if (!$request->has('is_active')) {
            $request->merge(['is_active' => 0]);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'is_active' => 'required|boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $category->image;

        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('categories', 'public');
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $request->slug,
            'is_active' => $request->is_active,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
