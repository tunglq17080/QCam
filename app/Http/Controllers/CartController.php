<?php

namespace App\Http\Controllers;
use Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //
    public function contact()
    {
    	return view('page.contact');
    }

    public function addItemCart($id) 
    {
        // $product = Product::findOrFail($id);
        $product = DB::table('products')
        ->select('categories.slug as cat_slug', 'products.*')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->where('products.id',$id)->first();

        if($product->promotion_price == 0) {
            Cart::add(array('id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->unit_price, 'options' =>array('img' => $product->image, 'cat_slug' => $product->cat_slug)));
        }
        else {
            Cart::add(array('id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->promotion_price, 'options' =>array('img' => $product->image, 'cat_slug' => $product->cat_slug)));
        }
        $content = Cart::Content();
        return $content;   
    }

    public function listCart()
    {
        $content = Cart::Content();
        $total = Cart::subtotal();
        return view('page.shopping-cart', compact('content', 'total'));
    }
        
    public function deleteItemCart($id)
    {
        Cart::remove($id);
        $content = Cart::content();
        return $content;
    }

    public function updateItemCart(Request $request,$id)
    {
        $newqty = $request->newQty;
        $proId = $request->proID;
        $rowId = $request->rowID;
        //$value_amount = $request->value_amount;
        //$total_amount = $request->total_amount;
        //echo $rowID;
        Cart::update($rowId, $newqty); 
        //$content['value_amount'] = $value_amount;
        // $content['total_amount'] = $total_amount;
        // $content['rowId'] = $rowId;
        $content = Cart::Content();  
        return $content;      
    }
    public function addItemCartQty(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        $qty = $request->qty;
        if($product->promotion_price == 0) {
            Cart::add(array('id' => $id, 'name' => $product->name, 'qty' => $qty, 'price' => $product->unit_price, 'options' =>array('img' => $product->image)));
        }
        else {
            Cart::add(array('id' => $id, 'name' => $product->name, 'qty' => $qty, 'price' => $product->promotion_price, 'options' =>array('img' => $product->image)));
        }
        $content = Cart::Content();
        return $content;
    }

}
