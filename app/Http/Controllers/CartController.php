<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;
use Response;

class CartController extends Controller
{
    //
    public function contact()
    {
    	return view('page.contact');
    }

    public function addItemCart($id) 
    {
         $product = Product::with('category')->findOrFail($id);
        /*$product = DB::table('products')
        ->select('categories.slug as cat_slug', 'products.*')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->where('products.id',$id)->first();*/

        $productToCart = [
            'id'      => $id,
            'name'    => $product->name,
            'qty'     => 1,
            'price'   => $product->promotion_price == 0 ? $product->unit_price : $product->promotion_price,
            'options' => [
                'img'      =>
                    $product->image_url,
                'cat_slug' => $product->category->cat_slug,
            ],
        ];

        Cart::add($productToCart);

        return Cart::Content();
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
        $product = Product::with('category')->findOrFail($id);
        $productToCart = [
            'id'      => $id,
            'name'    => $product->name,
            'qty'     => $request->qty,
            'price'   => $product->promotion_price == 0 ? $product->unit_price : $product->promotion_price,
            'options' => [
                'img'      =>
                    $product->image_url,
                'cat_slug' => $product->category->cat_slug,
            ],
        ];
        Cart::add($productToCart);

        return Cart::Content();
    }

}
