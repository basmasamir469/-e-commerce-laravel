<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\storeProductRequest;
use App\Http\Requests\Products\updateProductRequest;
use App\Http\Resources\products\ProductCollection;
use App\Http\Resources\products\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products=Product::skip(0)
        ->take(10)
        ->get();
        return response()->json(new ProductCollection($products),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeProductRequest $request)
    {
        //
        $product=Product::create(Arr::except($request->all(),['image']));
        if($product){
            $product
            ->addMedia($request->image)
            ->toMediaCollection('product_images');
            return response()->json(['data'=>new ProductResource($product),'status'=>200,'message'=>'stored successfully']);

        }
        else{
            return response()->json(['data'=>[],'status'=>500,'message'=>'failed to store']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateProductRequest $request, $id)
    {
        //
        $product=Product::findOrFail($id);
       if($product->update(Arr::except($request->all(),['image']))){
        if($request->image){
        $product->clearMediaCollection('product_images');
        $product
        ->addMedia($request->image)
        ->toMediaCollection('product_images');
        }
        return response()->json(['data'=>new ProductResource($product),'status'=>200,'message'=>'updated successfully']);
       }
       return response()->json(['data'=>[],'status'=>500,'message'=>'failed to update']);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product=Product::findOrFail($id);
        if($product->delete()){
            return response()->json(['data'=>[],'status'=>200,'message'=>'deleted successfully']);
         }
        return response()->json(['data'=>[],'status'=>500,'message'=>'failed to delete']);
        
    }
}
