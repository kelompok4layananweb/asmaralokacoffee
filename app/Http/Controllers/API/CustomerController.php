<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    function getData() {
        $customer = Customers::all();
        return response()->json([
            'success' => true,
            'message' => 'Detail Customer',
            'data'    => $customer
        ], 200);
    }

    function showData($id){
        $customer = Customers::findOrfail($id);

        if($customer){
            return response()->json([
                'success' => true,
                'message' => 'Detail Custoemer',
                'data'    => $customer
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Customer Not Found',
        ], 404);
    }

    function addData(Request $request){
        //set validation
        $validator = Validator::make($request->all(), [
            'username'      => 'required',
            'name'     => 'required',
            'email'  => 'required',
            'phone'   => 'required',
            'address'   => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $customer = Customers::create([
            'username'      => $request->username,
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'  => $request->phone,
            'address'   => $request->address
        ]);

        //success save to database
        if($customer) {
            return response()->json([
                'success' => true,
                'message' => 'Customer Created',
                'data'    => $customer
            ], 201);

        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Customer Failed to Save',
        ], 409);
    }

    function editData(Request $request, Customers $id) {
        //set validation
        $validator = Validator::make($request->all(), [
            'username'      => 'required',
            'name'     => 'required',
            'email'  => 'required',
            'phone'   => 'required',
            'address'   => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $customer = Customers::findOrFail($id->id);

        if($customer) {

            //update post
            $customer->update([
                'username'      => $request->username,
                'name'      => $request->name,
                'email'     => $request->email,
                'phone'  => $request->phone,
                'address'   => $request->address
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Customer Updated',
                'data'    => $customer
            ], 200);

        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Customer Not Found',
        ], 404);
    }

    function delData($id) {
        $customer = Customers::findOrfail($id);

        if($customer) {
            //delete post
            $customer->delete();

            return response()->json([
                'success' => true,
                'message' => 'Customer Deleted',
            ], 200);
        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Customer Not Found',
        ], 404);
    }
}
