<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;

class AdminListController extends Controller
{
    public function index()
    {
        $adminLists = User::where(['role' => 'admin'])->orderBy('id', 'ASC')->get();
        return view('admin.admin-list.index', compact('adminLists'));
    }

    public function statusChange(Request $request)
    {
        $admin = User::findOrFail($request->id);
        $admin->status = $request->status == 'true' ? 'active' : 'inactive';
        $admin->save();
        return response(['status' => 'success', 'message' => 'Status has been Updated!']);
    }

    public function destroy(string $id)
    {
        $admin = User::findOrFail($id);

        $products = Product::with(['vendor'])->where(['vendor_id' => $admin->vendor->id])->get();
        if (count($products) > 0) {
            return response(['status' => 'error', 'message' => 'Admin Cant Be Deleted Please Ban The User Instead of Delete.']);
        }

        Vendor::where(['user_id' => $admin->id])->delete();
        $admin->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
