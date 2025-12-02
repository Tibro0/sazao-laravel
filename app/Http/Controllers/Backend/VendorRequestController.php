<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorRequestController extends Controller
{
    public function index()
    {
        $vendorRequests = Vendor::with(['user'])->where(['status' => 0])->orderBy('id', 'DESC')->get();
        return view('admin.vendor-request.index', compact('vendorRequests'));
    }

    public function show(string $id)
    {
        $vendor = Vendor::with(['user'])->findOrFail($id);
        return view('admin.vendor-request.show', compact('vendor'));
    }

    public function changeStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => ['required', 'boolean'],
        ]);

        $vendor = Vendor::findOrFail($id);
        $vendor->status = $request->status;
        $vendor->save();

        $user = User::findOrFail($vendor->user_id);
        $user->role = 'vendor';
        $user->save();

        return redirect()->route('admin.vendor-request.index')->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Updated Successfully!'
        ]);
    }
}
