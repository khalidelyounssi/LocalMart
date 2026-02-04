<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    



    public function index()
    {
        $products = Product::where('user_id', auth()->id())->get();
        return view('seller.products.index', compact('products')); 
    }

    public function create()
    {
        $categories = Category::all();
        return view('seller.products.create', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'required|string',
        'price'       => 'required|numeric|min:0',
        'stock'       => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    $product = new Product();
    $product->title       = $request->title;
    $product->description = $request->description;
    $product->price       = $request->price;
    $product->stock       = $request->stock;
    $product->category_id = $request->category_id;
    $product->user_id     = auth()->id(); 

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('products', 'public');
        $product->image = $path;
    }

    $product->save();

    return redirect()->route('seller.products.index')->with('success', 'Produit mis en vente avec succès !');
}

    public function edit(Product $product)
{
    $categories = Category::all();
    return view('seller.products.edit', compact('product', 'categories'));
}

public function update(Request $request, Product $product)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|max:2048'
    ]);

    $product->title = $request->title;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->stock = $request->stock;
    $product->category_id = $request->category_id;

    if ($request->hasFile('image')) {
        $product->image = $request->file('image')->store('products', 'public');
    }

    $product->save();

    return redirect()->route('seller.products.index')->with('success', 'Produit modifié avec succès !');
}

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('seller.products.index');
    }
}
