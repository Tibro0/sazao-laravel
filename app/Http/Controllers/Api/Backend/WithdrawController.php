<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WithdrawController extends Controller
{
    public function index()
    {
        $withdrawRequests = WithdrawRequest::with(['vendor'])->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $withdrawRequests
        ], 200);
    }

    public function show(string $id)
    {
        $withdraw = WithdrawRequest::with(['vendor'])->find($id);

        if ($withdraw == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Withdraw Request Not Found!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $withdraw
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $withdraw = WithdrawRequest::with(['vendor'])->find($id);

        if ($withdraw == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Withdraw Request Not Found!'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,paid,decline'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ], 400);
        }

        $withdraw->status = $request->status;
        $withdraw->save();

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!'
        ], 200);
    }
}
