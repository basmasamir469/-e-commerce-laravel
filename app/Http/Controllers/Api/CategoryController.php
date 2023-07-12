<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\storeCategoryRequest;
use App\Http\Requests\Categories\updateCategoryRequest;
use App\Http\Resources\categories\CategoryCollection;
use App\Http\Resources\categories\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories=Category::paginate(10);
        return response()->json(new CategoryCollection($categories),200);
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
    public function store(storeCategoryRequest $request)
    {
        //
        $category=Category::create($request->all());
        if($category){
            return response()->json(['data'=>new CategoryResource($category),'status'=>200,'message'=>'stored successfully']);
        }
        return response()->json(['data'=>[],'status'=>500,'message'=>'failed to store']);
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
    public function update(updateCategoryRequest $request, string $id)
    {
        //
        $category=Category::findOrFail($id);
        $updated=$category->update($request->all());
        if($updated){
            return response()->json(['data'=>new CategoryResource($category->fresh()),'status'=>200,'message'=>'updated successfully']);
        }
            return response()->json(['data'=>[],'status'=>500,'message'=>'failed to update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        //
        $category=Category::findOrFail($id);
        if($category->delete()){
         return response()->json(['data'=>[],'status'=>200,'message'=>'deleted successfully']);
        }
        return response()->json(['data'=>[],'status'=>500,'message'=>'failed to delete']);
    }
}
