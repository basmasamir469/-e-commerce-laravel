<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\storeProductRequest;
use App\Http\Requests\Products\updateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
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
        $products=auth()->user()->hasRole('Owner')? auth()->user()->products()->paginate(10):Product::paginate(10);
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::all();
        $users=User::role('Owner')->get();
        return view('products.create',compact('categories','users'));
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
        flash(__('product stored successfully'))->success();

        }
        else{
            flash(__('something wrong is happened!'))->error();
        }
        return redirect()->route('products.index');
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
        $product=Product::findOrFail($id);
        $categories=Category::all();
        $users=User::role('Owner')->get();
        return view('products.edit',compact('product','categories','users'));
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
        flash(__('product updated successfully'))->success();
       };

        return redirect()->route('products.index');

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
        $product->delete();
        flash(__('product deleted successfully'))->success();
        return redirect()->route('products.index');
    }
}
