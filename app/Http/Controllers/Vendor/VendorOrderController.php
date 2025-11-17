<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['orderProducts'])->orderBy('id', 'DESC')->whereHas('orderProducts', function($query){
            $query->where(['vendor_id' => Auth::user()->vendor->id]);
        })->get();
        return view('vendor.order.index', compact('orders'));
    }

    public function show(string $id)
    {
        $order = Order::with(['user', 'transaction', 'orderProducts'])->findOrFail($id);
        return view('vendor.order.show', compact('order'));
    }

    public function orderStatus(Request $request, string $id)
    {
        $order = Order::findOrFail($id);
        $order->order_status = $request->status;
        $order->save();

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Status Updated Successfully!'
        ]);
    }
}
