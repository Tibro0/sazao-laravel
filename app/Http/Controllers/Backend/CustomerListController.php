<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerListController extends Controller
{
    public function index(){
        $customers = User::where(['role' => 'user'])->orderBy('id', 'DESC')->get();
        return view('admin.customer-list.index', compact('customers'));
    }

    public function statusChange(Request $request){
        $customer = User::findOrFail($request->id);
        $customer->status = $request->status == 'true' ? 'active' : 'inactive';
        $customer->save();
        return response(['status' => 'success', 'message' => 'Status Has Been Updated!']);
    }
}
