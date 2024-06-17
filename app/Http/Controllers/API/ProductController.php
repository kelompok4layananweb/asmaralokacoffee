<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    function getData() {
        $product = Products::all();
        return response()->json([
            'success' => true,
            'message' => 'Detail Product',
            'data'    => $product
        ], 200);
    }

    function showData($id){
        $product = Products::findOrfail($id);

        if($product){
            return response()->json([
                'success' => true,
                'message' => 'Detail Product',
                'data'    => $product
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Product Not Found',
        ], 404);
    }

    function addData(Request $request){
        //set validation
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'price'     => 'required',
            'category'  => 'required',
            'picture'   => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $product = Products::create([
            'name'      => $request->name,
            'price'     => $request->price,
            'category'  => $request->category,
            'picture'   => $request->picture
        ]);

        //success save to database
        if($product) {
            return response()->json([
                'success' => true,
                'message' => 'Product Created',
                'data'    => $product
            ], 201);

        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Product Failed to Save',
        ], 409);
    }

    function editData(Request $request, Products $id) {
        //set validation
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'price'     => 'required',
            'category'  => 'required',
            'picture'   => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $product = Products::findOrFail($id->id);

        if($product) {

            //update post
            $product->update([
                'name'      => $request->name,
                'price'     => $request->price,
                'category'  => $request->category,
                'picture'   => $request->picture
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Procuct Updated',
                'data'    => $product
            ], 200);

        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Product Not Found',
        ], 404);
    }

    function delData($id) {
        $product = Products::findOrfail($id);

        if($product) {
            //delete post
            $product->delete();

            return response()->json([
                'success' => true,
                'message' => 'Product Deleted',
            ], 200);
        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Product Not Found',
        ], 404);
    }
}
