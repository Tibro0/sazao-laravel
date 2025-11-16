<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user'])->orderBy('id', 'DESC')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function show(string $id)
    {
        $order = Order::with(['transaction', 'orderProducts'])->findOrFail($id);
        return view('admin.order.show', compact('order'));
    }

    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        // delete order products
        $order->orderProducts()->delete();
        // delete transaction
        $order->transaction()->delete();
        $order->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }


    public function changeOrderStatus(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->order_status = $request->status;
        $order->save();

        return response(['status' => 'success', 'message' => 'Updated Order Status Successfully!']);
    }
}
