<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerListController extends Controller
{
    public function index()
    {
        $customers = User::where(['role' => 'user'])->orderBy('id', 'DESC')->get()->select('id', 'name', 'email', 'status');
        return response()->json([
            'status' => 200,
            'data' => $customers
        ], 200);
    }

    public function statusChange(Request $request, string $id)
    {
        $customer = User::find($id);

        if ($customer == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Customer Not Found!'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'status' => 'required|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $customer->status = $request->status;
        $customer->save();

        return response()->json([
            'status' => 200,
            'message' => 'Status Has Been Updated!'
        ], 200);
    }
}
