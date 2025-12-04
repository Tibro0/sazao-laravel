<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VendorListController extends Controller
{
    public function index(){
        $vendors = User::with(['vendor'])->where(['role' => 'vendor'])->orderBy('id', 'DESC')->get();
        return view('admin.vendor-list.index', compact('vendors'));
    }

    public function statusChange(Request $request){
        $vendor = User::findOrFail($request->id);
        $vendor->status = $request->status == 'true' ? 'active' : 'inactive';
        $vendor->save();
        return response(['status' => 'success', 'message' => 'Status Has Been Updated!']);
    }
}
