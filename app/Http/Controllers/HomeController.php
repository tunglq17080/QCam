<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Cart;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //    
        // $product = DB::table('products')
        // ->select('categories.slug as cat_slug', 'products.*')
        // ->join('categories', 'products.category_id', '=', 'categories.id')
        // ->where('products.id',2)->first();
        // dd($product);
        // Cart::destroy();
        $categories = Category::all();
        $products = Product::all()->take(10);
        return view('page.index', compact('categories', 'products'));
    }
}
