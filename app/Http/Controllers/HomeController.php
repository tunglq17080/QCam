<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

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
        // $categoriesProduct = DB::table('categories')
        // ->join('products', 'products.category_id', '=', 'categories.id')
        // ->get();
        
        $categories = Category::all();
        $products = Product::all()->take(10);
        return view('page.index', compact('categories', 'products'));
    }
}
