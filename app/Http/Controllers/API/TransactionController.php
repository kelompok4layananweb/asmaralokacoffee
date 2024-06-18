<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{

    function addData(Request $request){
        //set validation
        $validator = Validator::make($request->all(), [
            'trans_num'   => 'required',
            'product'  => 'required',
            'customer'   => 'required',
            'payment'   => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $transactions = Transactions::create([
            'trans_num'      => $request->trans_num,
            'product'     => $request->product,
            'customer'  => $request->customer,
            'payment'  => $request->payment
        ]);

        //success save to database
        if($transactions) {
            return response()->json([
                'success' => true,
                'Transactions' => 'Transactions Created',
                'data'    => $transactions
            ], 201);

        }

        //failed save to database
        return response()->json([
            'success' => false,
            'Transactions' => 'Transactions Failed to Save',
        ], 409);
    }

}
