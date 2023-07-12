<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Events\OrderNotification;
use App\Http\Resources\orders\OrderCollection;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders=Order::with(['user','products'])->paginate(10);
        return response()->json(new OrderCollection($orders),200);   
     }

    /**
     * Show the form for creating a new resource.
     */

    public function acceptOrders($id){

        $order= Order::findOrFail($id);
        $order->update([
         'status'=>2
        ]);
        $data=[
        'admin'=>auth()->user()->name,
        'user_id'=>$order->user_id,
        'status'=>$order->status
        ];
        event(new OrderNotification($data));
        return response()->json([
        'data'=>$order,
        'status'=>1,
        'message'=>'order is accepted successfully'
        ]); 
     }

     public function rejectOrders($id){
        
        $order= Order::findOrFail($id);
        $order->update([
         'status'=>0
        ]);

        $data=[
            'admin'=>auth()->user()->name,
            'user_id'=>$order->user_id,
            'status'=>$order->status
            ];
            event(new OrderNotification($data));    

       return response()->json([
       'data'=>$order,
       'status'=>1,
       'message'=>'order is rejected successfully'
       ]); 
     }
}
