<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendorListController extends Controller
{
    public function index()
    {
        $vendors = User::with(['vendor'])->where(['role' => 'vendor'])->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $vendors
        ], 200);
    }

    public function statusChange(Request $request, string $id)
    {
        $vendor = User::find($id);

        if ($vendor == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Vendor Not Found!'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $vendor->status = $request->status;
        $vendor->save();

        return response()->json([
            'status' => 200,
            'message' => 'Status Has Been Updated!'
        ], 200);
    }
}
