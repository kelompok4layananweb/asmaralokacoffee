<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    function getData() {
        $profiles = Profiles::all();
        return response()->json([
            'success' => true,
            'Profiles' => 'Detail Profiles',
            'data'    => $profiles
        ], 200);
    }

    function showData($id){
        $profiles = Profiles::findOrfail($id);

        if($profiles){
            return response()->json([
                'success' => true,
                'Profiles' => 'Detail Profiles',
                'data'    => $profiles
            ], 200);
        }

        return response()->json([
            'success' => false,
            'Profiles' => 'Profiles Not Found',
        ], 404);
    }

    function addData(Request $request){
        //set validation
        $validator = Validator::make($request->all(), [
            'company'     => 'required',
            'address'  => 'required',
            'map'   => 'required',
            'ig'   => 'required',
            'fb'   => 'required',
            'wa'   => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $profiles = Profiles::create([
            'company'      => $request->company,
            'address'     => $request->address,
            'map'  => $request->map,
            'ig'  => $request->ig,
            'fb'  => $request->fb,
            'wa'  => $request->wa
        ]);

        //success save to database
        if($profiles) {
            return response()->json([
                'success' => true,
                'Profiles' => 'Profiles Created',
                'data'    => $profiles
            ], 201);

        }

        //failed save to database
        return response()->json([
            'success' => false,
            'Profiles' => 'Profiles Failed to Save',
        ], 409);
    }

    function editData(Request $request, Profiles $id) {
        //set validation
        $validator = Validator::make($request->all(), [
            'company'     => 'required',
            'address'  => 'required',
            'map'   => 'required',
            'ig'   => 'required',
            'fb'   => 'required',
            'wa'   => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $profiles = Profiles::findOrFail($id->id);

        if($profiles) {

            //update post
            $profiles->update([
                'company'      => $request->company,
                'address'     => $request->address,
                'map'  => $request->map,
                'ig'  => $request->ig,
                'fb'  => $request->fb,
                'wa'  => $request->wa
            ]);

            return response()->json([
                'success' => true,
                'Profiles' => 'Profiles Updated',
                'data'    => $profiles
            ], 200);

        }

        //data post not found
        return response()->json([
            'success' => false,
            'Profiles' => 'Profiles Not Found',
        ], 404);
    }

    function delData($id) {
        $profiles = Profiles::findOrfail($id);

        if($profiles) {
            //delete post
            $profiles->delete();

            return response()->json([
                'success' => true,
                'Profiles' => 'Profiles Deleted',
            ], 200);
        }

        //data post not found
        return response()->json([
            'success' => false,
            'Profiles' => 'Profiles Not Found',
        ], 404);
    }
}
