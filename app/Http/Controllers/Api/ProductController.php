<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProdcutResouce;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();  // Eager load the category and tags
        return ProdcutResouce::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json(
            new ProdcutResouce($product)
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


         $product = Product::find($id);
        if (! $product){
            return response()->json(
                            [
                                "message" => "product not found",

                            ],
                            404
                            );
        }
        return new ProdcutResouce($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product= Product::find($id);
        if (! $product){
            return response()->json(
                            [
                                "message" => "product not found",

                            ],
                            404
                            );
        }
        $product->update($request->all());
        return response()->json(
            [
                "message" => "Product has been updated",
                new ProdcutResouce($product),
            ],
            200
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product =  Product::find($id);
        if (!$product){
         return response()->json(
             [
                 "message" => "product not found",

             ],
             404
             );
     }

     $product->delete();
     return response()->json(
         [

             "message" => "product successfuly deleted"

         ]
         );
    }
}
