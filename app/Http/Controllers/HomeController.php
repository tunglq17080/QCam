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
        $categories = Category::all();
        $products = Product::all()->take(10);
        $deal_of_days = Product::all()->take(2);
        $new_arrivals = Product::all()->take(6);
        return view('page.index', compact('categories', 'products','new_arrivals','deal_of_days'));
    }
}
