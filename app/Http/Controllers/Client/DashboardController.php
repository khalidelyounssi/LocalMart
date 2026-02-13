<?php 
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index($categorySlug = null)
    {
        $categories = Category::all();

        $query = Product::with(['seller', 'category'])
            ->where('is_active', 1)
            ->where('stock', '>', 0);

        if ($categorySlug) {
            // Find the category by slug
            $category = Category::where('slug', $categorySlug)->first();

            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        $products = $query->get();

        return view('dashboard', compact('products', 'categories'));
    }
}
