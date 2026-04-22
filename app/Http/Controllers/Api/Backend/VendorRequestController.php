<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendorRequestController extends Controller
{
    public function index()
    {
        $vendorRequests = Vendor::with(['user:id,name'])->where(['status' => 0])->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $vendorRequests
        ], 200);
    }

    public function show(string $id)
    {
        $vendor = Vendor::with(['user'])->find($id);

        if ($vendor == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Vendor Request Not Found!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $vendor
        ], 200);
    }

    public function changeStatus(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $vendor = Vendor::find($id);

        if ($vendor == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Vendor Request Not Found!'
            ], 404);
        }

        $vendor->status = $request->status;
        $vendor->save();

        $user = User::find($vendor->user_id);

        if ($user == null) {
            return response()->json([
                'status' => 404,
                'message' => 'User Not Found!'
            ], 404);
        }

        $user->role = 'vendor';
        $user->save();

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!'
        ], 200);
    }
}
