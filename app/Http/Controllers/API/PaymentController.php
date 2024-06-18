<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    function getData() {
        $payments = Payments::all();
        return response()->json([
            'success' => true,
            'Payments' => 'Detail Payments',
            'data'    => $payments
        ], 200);
    }

    function showData($id){
        $payments = Payments::findOrfail($id);

        if($payments){
            return response()->json([
                'success' => true,
                'Payments' => 'Detail Payments',
                'data'    => $payments
            ], 200);
        }

        return response()->json([
            'success' => false,
            'Payments' => 'Payments Not Found',
        ], 404);
    }

    function addData(Request $request){
        //set validation
        $validator = Validator::make($request->all(), [
            'pay_method'     => 'required',
            'account'  => 'required',
            'qr_code'   => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $payments = Payments::create([
            'pay_method'      => $request->pay_method,
            'account'     => $request->account,
            'qr_code'  => $request->qr_code
        ]);

        //success save to database
        if($payments) {
            return response()->json([
                'success' => true,
                'Payments' => 'Payments Created',
                'data'    => $payments
            ], 201);

        }

        //failed save to database
        return response()->json([
            'success' => false,
            'Payments' => 'Payments Failed to Save',
        ], 409);
    }

    function editData(Request $request, Payments $id) {
        //set validation
        $validator = Validator::make($request->all(), [
            'pay_method'     => 'required',
            'account'  => 'required',
            'qr_code'   => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $payments = Payments::findOrFail($id->id);

        if($payments) {

            //update post
            $payments->update([
                'pay_method'      => $request->pay_method,
                'account'     => $request->account,
                'qr_code'  => $request->qr_code
            ]);

            return response()->json([
                'success' => true,
                'Payments' => 'Payments Updated',
                'data'    => $payments
            ], 200);

        }

        //data post not found
        return response()->json([
            'success' => false,
            'Payments' => 'Payments Not Found',
        ], 404);
    }

    function delData($id) {
        $payments = Payments::findOrfail($id);

        if($payments) {
            //delete post
            $payments->delete();

            return response()->json([
                'success' => true,
                'Payments' => 'Payments Deleted',
            ], 200);
        }

        //data post not found
        return response()->json([
            'success' => false,
            'Payments' => 'Payments Not Found',
        ], 404);
    }
}
