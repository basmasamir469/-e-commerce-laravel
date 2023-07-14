<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //using darryldcode shopping cart package
    
    public function cartList(){
    $items=Cart::getContent();
    return view('website.cart',compact('items'));
    }

    public function addToCart(Request $request){
    $product=Product::find($request->id);
      Cart::add([
        'id'=>$request->id,
        'name'=>$request->product_name,
        'price'=>$request->price,
        'quantity'=>$request->quantity,
        'attributes'=>array('image'=>$request->image),
        'associatedModel' => $product
      ]);
      flash('product is added to cart')->success();
      return redirect()->route('products.cart');
    }

    public function updateCart(Request $request){
        Cart::update(
            $request->id,[
                'quantity'=>[
                    'relative'=>false,
                    'value'=>$request->quantity
                ]
            ]
            );
      flash('item cart is updated successfully')->success();
      return redirect()->route('products.cart');

    }

    public function removeCart(Request $request){
        if(Cart::remove($request->id)){
            flash('item cart is deleted successfully')->success();
            return redirect()->route('products.cart');
        }
        flash(__('something wrong is happened'))->error();
        return redirect()->back();

    }

    public function clearCart(){
        Cart::clear();
        flash('cart is cleared successfully')->success();
        return redirect()->route('products.cart');
    }

    public function makeOrder(Request $request){
        try {
            DB::beginTransaction();
            $order= Order::create([
                'user_id'=>$request->user()->id,
                'total_cost'=>$request->total_cost
             ]);
             $products=json_decode($request->products);
            //  dd($products);
             foreach($products as $product){
              $order->products()->attach($product->id,['price'=>$product->price,'quantity'=>$product->quantity]);
             }

             DB::commit();
             Cart::clear();
             flash(' your order is sent successfully')->success();
             return redirect()->route('home');
      
        } catch (\Exception $e) {
            DB::rollBack();
            flash($e->getMessage())->error();
            return redirect()->back();
        }
       
    }
}
