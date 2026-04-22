<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminListController extends Controller
{
    public function index()
    {
        $adminLists = User::where(['role' => 'admin'])->orderBy('id', 'ASC')->get();
        return response()->json([
            'status' => 200,
            'data' => $adminLists
        ], 200);
    }

    public function statusChange(Request $request, string $id)
    {
        $admin = User::find($id);

        if ($admin == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Admin Not Found!'
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

        $admin->status = $request->status;
        $admin->save();

        return response()->json([
            'status' => 200,
            'message' => 'Status Has Been Updated!'
        ], 200);
    }

    public function destroy(string $id)
    {
        $admin = User::with('vendor')->find($id);

        if ($admin == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Admin Not Found!'
            ], 404);
        }

        $products = Product::with(['vendor'])->where(['vendor_id' => $admin->vendor->id])->get();

        if (count($products) > 0) {
            return response()->json([
                'status' => 403,
                'message' => 'Admin Cant Be Deleted Please Ban The User Instead of Delete.'
            ], 403);
        }

        Vendor::where(['user_id' => $admin->id])->delete();
        $admin->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }
}
