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

    public function pendingOrders()
    {
        $orders = Order::with(['user'])->orderBy('id', 'DESC')->where('order_status', 'pending')->get();
        return view('admin.order.pending-order', compact('orders'));
    }

    public function processedOrders()
    {
        $orders = Order::with(['user'])->orderBy('id', 'DESC')->where('order_status', 'processed_and_ready_to_ship')->get();
        return view('admin.order.processed-order', compact('orders'));
    }

    public function DroppedOffOrders(){
        $orders = Order::with(['user'])->orderBy('id', 'DESC')->where('order_status', 'dropped_off')->get();
        return view('admin.order.dropped-off-order', compact('orders'));
    }

    public function shippedOrders(){
        $orders = Order::with(['user'])->orderBy('id', 'DESC')->where('order_status', 'shipped')->get();
        return view('admin.order.shipped-order', compact('orders'));
    }

    public function outForDeliveryOrders(){
        $orders = Order::with(['user'])->orderBy('id', 'DESC')->where('order_status', 'out_for_delivery')->get();
        return view('admin.order.out-for-delivery-order', compact('orders'));
    }

    public function deliveredOrders(){
        $orders = Order::with(['user'])->orderBy('id', 'DESC')->where('order_status', 'delivered')->get();
        return view('admin.order.delivered-order', compact('orders'));
    }

    public function canceledOrders(){
        $orders = Order::with(['user'])->orderBy('id', 'DESC')->where('order_status', 'canceled')->get();
        return view('admin.order.canceled-order', compact('orders'));
    }

    // public function destroy(string $id)
    // {
    //     $order = Order::findOrFail($id);
    //     // delete order products
    //     $order->orderProducts()->delete();
    //     // delete transaction
    //     $order->transaction()->delete();
    //     $order->delete();

    //     return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    // }


    public function changeOrderStatus(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->order_status = $request->status;
        $order->save();

        return response(['status' => 'success', 'message' => 'Updated Order Status Successfully!']);
    }

    public function changePaymentStatus(Request $request)
    {
        $paymentStatus = Order::findOrFail($request->id);
        $paymentStatus->payment_status = $request->status;
        $paymentStatus->save();

        return response(['status' => 'success', 'message' => 'Updated Payment Status Successfully!']);
    }
}
