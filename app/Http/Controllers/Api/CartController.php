<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart ;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //
    public function cartList(){
    $items=auth('api')->user()->cart->products;
    return response()->json($items,200);   
    }

    public function addToCart(Request $request,$productId){
        try {
            DB::beginTransaction();
            $total_cost=0;
            $product=Product::findOrFail($productId);
            $validator=Validator()->make($request->all(),[
                'quantity'=>"numeric|min:0|max:$product->quantity"
            ]);
            if($validator->fails()){
                return response()->json([
                    'status'=>0,
                    'message'=>$validator->errors()->first()
                    ]);            
            }
            if(!$request->user()->cart){
              $cart=Cart::create([
                'user_id'=>$request->user()->id,
                'total_cost'=>0
              ]);
            }else{
                $cart=$request->user()->cart;
            }    
              $cart->products()->attach($product->id,['price'=>$product->price,'quantity'=>$request->quantity]);
              foreach($cart->products as $product){
                $total_cost+=$product->pivot->price*$product->pivot->quantity;
              }
              $cart->update([
                'total_cost'=>$total_cost
              ]);

              DB::commit();
              return response()->json([
                'data'=>$cart,
                'status'=>1,
                'message'=>'product is added to cart'
                ]);        
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'=>0,
                'message'=>$e->getMessage()
                ]);        
        }
    }

    public function updateCart(Request $request,$productId){
        try {
            DB::commit();
            $product_quantity=Product::findOrfail($productId)->quantity;
            $validator=Validator()->make($request->all(),[
                'quantity'=>"numeric|min:0|max:$product_quantity"
            ]);
            if($validator->fails()){
                return response()->json([
                    'status'=>0,
                    'message'=>$validator->errors()->first()
                    ]);            
            }
            $total_cost=0;
            $cart=$request->user()->cart;
            $updated=$cart->products()->updateExistingPivot($productId,[
                'quantity'=>$request->quantity
            ]);
            foreach($cart->products as $product){
                $total_cost+=$product->pivot->price*$product->pivot->quantity;
              }
              $cart->update([
                'total_cost'=>$total_cost
              ]);
              DB::commit();
            return response()->json([
                'data'=>$updated,
                'status'=>1,
                'message'=>'cart is updated successfully'
                ]);
            }
        catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status'=>0,
                'message'=>$e->getMessage()
                ]);        
        } 

    }

    public function removeCart($productId){

        try {
            $removed=auth()->user()->cart->products()->detach($productId);
                if($removed){
                return response()->json([
                    'data'=>$removed,
                    'status'=>1,
                    'message'=>'product is removed from cart successfully'
                    ]);
                }
            }
            catch (\Exception $e) {
                return response()->json([
                    'status'=>0,
                    'message'=>$e->getMessage()
                    ]);        
            }     
    }

    public function clearCart(){
        try{
        $cleared=auth()->user()->cart->products()->detach();
        if($cleared){
            return response()->json([
                'status'=>1,
                'message'=>'cart is cleared successfully'
                ]);        
        }
    }
    catch (\Exception $e) {
        return response()->json([
            'status'=>0,
            'message'=>$e->getMessage()
            ]);        
    }     
    
    }

    public function makeOrder(Request $request){
        try {
            DB::beginTransaction();
            $cart=$request->user()->cart;
            $order= Order::create([
                'user_id'=>$request->user()->id,
                'total_cost'=>$cart->total_cost
             ]);
             $products=$cart->products;
            //  dd($products);
             foreach($products as $product){
              $order->products()->attach($product->id,['price'=>$product->pivot->price,'quantity'=>$product->pivot->quantity]);
             }
             $request->user()->cart()->delete();
             DB::commit();
             return response()->json([
                'data'=>$order,
                'status'=>1,
                'message'=>'order is sent successfully'
                ]);              
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'=>0,
                'message'=>$e->getMessage()
                ]);        
        }       
    }
}
