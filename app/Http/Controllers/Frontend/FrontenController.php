<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontenController extends Controller
{
    function index()
    {   
        $featured_products = Product::where('trending', '1')->take(15)->get();
        $featured_category = Category::where('popular', '1')->take(15)->get();
        return view('frontend.index', compact('featured_products', 'featured_category'));
    }

    function category()
    {
        $category = Category::where('status', '0')->get();
        return view('frontend.category', compact('category'));
    }

    function viewcategory($slug)
    {
        if(Category::where('slug', $slug)->exists())
        {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('cate_id', $category->id)->where('status', '0')->get();
            return view('frontend.products.index', compact('category', 'products'));
        }
        else
        {
            return redirect('/')->with('status', "Sepertinya Product di category ini tidak ada");
        }  
    }

    function productview($cate_slug, $prod_slug)
    {
        if(Category::where('slug', $cate_slug)->exists())
        {
            if(Product::where('slug', $prod_slug)->exists()) 
            {
                    $products = Product::where('slug', $prod_slug)->first();
                    return view('frontend.products.view', compact('products')); 
            }
            else
            {
                return redirect('/')->with('status', "Produk Tidak Tersedia");
            }
        }
    }
}
