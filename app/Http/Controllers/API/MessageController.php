<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    function getData() {
        $message = Messages::all();
        return response()->json([
            'success' => true,
            'message' => 'Detail Message',
            'data'    => $message
        ], 200);
    }

    function showData($id){
        $message = Messages::findOrfail($id);

        if($message){
            return response()->json([
                'success' => true,
                'message' => 'Detail Message',
                'data'    => $message
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Message Not Found',
        ], 404);
    }

    function addData(Request $request){
        //set validation
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'email'  => 'required',
            'phone'   => 'required',
            'message'   => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $message = Messages::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'  => $request->phone,
            'message'   => $request->message
        ]);

        //success save to database
        if($message) {
            return response()->json([
                'success' => true,
                'message' => 'Message Created',
                'data'    => $message
            ], 201);

        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Message Failed to Save',
        ], 409);
    }

    function editData(Request $request, Messages $id) {
        //set validation
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'email'  => 'required',
            'phone'   => 'required',
            'message'   => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $message = Messages::findOrFail($id->id);

        if($message) {

            //update post
            $message->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'phone'  => $request->phone,
                'message'   => $request->message
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Message Updated',
                'data'    => $message
            ], 200);

        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Message Not Found',
        ], 404);
    }

    function delData($id) {
        $message = Messages::findOrfail($id);

        if($message) {
            //delete post
            $message->delete();

            return response()->json([
                'success' => true,
                'message' => 'Message Deleted',
            ], 200);
        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Message Not Found',
        ], 404);
    }
}
