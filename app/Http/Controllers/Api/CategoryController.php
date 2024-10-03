<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    // get all categories
    public function index()
    {
        $categories = Category::with('products')->get();  // Eager load the products
        return CategoryResource::collection($categories);
    }

    public function show1(Request $r){
        $id=$r->input('id');
       // $id=$r->id;
        $category = Category::find($id);
     //$categories = Category::with('products');
        if(!$category)
        {
                return response()->json(
                    [
                        "message"=> "category not found",
                    ],
                    status : 404
                    );
        }
        return response()->json(
            [

               "cat" => $category
            ]
            );

   //    return  CategoryResource::collection(Category::all());
   }
    // show a specific category
    public function show($id){

        // pasring params from body
      //  $bodyId = $request->input('bId');
    //$category = Category::find($bodyId);

    $category = Category::find($id);
    if (! $category ){
        return response()->json(
            [
                "message" => "category not found",
            ],
            404
            );
    }
    else
    {
        return new CategoryResource($category);
    }

    // $data = $category::with('products');
    //$data=$category->load('products') ;
    // // pasring params from path


    //     return response()->json(
    //         [
    //             "data" => $data
    //         ]
    //         );



    }
    public function create (Request $request)
    {
        Category::create(request()->all());
        return response()->json(
            [
                "mes"=>"ceateed"
            ]
            );
    }
    public function store(Request $request){

       $category =  Category::create($request->all());
        return response()->json(

              new CategoryResource($category)

            );
    }
    public function destroy($id){

       $category =  Category::find($id);
       if (!$category){
        return response()->json(
            [
                "message" => "category not found",

            ],
            404
            );
    }

    $category->delete();
    return response()->json(
        [

            "message" => "category successfuly deleted"

        ]
        );
    }
    public function update( Request $request,$id){

       $category =  Category::find($id);
       if (!$category){
        return response()->json(
            [
                "message" => "category not found",

            ],
            404
            );
    }

    $category->update($request->all());
    return response()->json(

        [
            "message" => "category was uppdated",
              new CategoryResource($category)
        ]
        );
    }
}
