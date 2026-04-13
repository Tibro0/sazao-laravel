<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user:id,name'])->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $orders
        ], 200);
    }

    public function show(string $id)
    {
        $order = Order::with(['transaction', 'orderProducts'])->find($id);

        if ($order == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Order Not Found!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $order
        ], 200);
    }

    public function pendingOrders()
    {
        $orders = Order::with(['user:id,name'])->orderBy('id', 'DESC')->where('order_status', 'pending')->get();
        return response()->json([
            'status' => 200,
            'data' => $orders
        ], 200);
    }

    public function processedOrders()
    {
        $orders = Order::with(['user:id,name'])->orderBy('id', 'DESC')->where('order_status', 'processed_and_ready_to_ship')->get();
        return response()->json([
            'status' => 200,
            'data' => $orders
        ], 200);
    }

    public function DroppedOffOrders()
    {
        $orders = Order::with(['user:id,name'])->orderBy('id', 'DESC')->where('order_status', 'dropped_off')->get();
        return response()->json([
            'status' => 200,
            'data' => $orders
        ], 200);
    }

    public function shippedOrders()
    {
        $orders = Order::with(['user:id,name'])->orderBy('id', 'DESC')->where('order_status', 'shipped')->get();
        return response()->json([
            'status' => 200,
            'data' => $orders
        ], 200);
    }

    public function outForDeliveryOrders()
    {
        $orders = Order::with(['user:id,name'])->orderBy('id', 'DESC')->where('order_status', 'out_for_delivery')->get();
        return response()->json([
            'status' => 200,
            'data' => $orders
        ], 200);
    }

    public function deliveredOrders()
    {
        $orders = Order::with(['user:id,name'])->orderBy('id', 'DESC')->where('order_status', 'delivered')->get();
        return response()->json([
            'status' => 200,
            'data' => $orders
        ], 200);
    }

    public function canceledOrders()
    {
        $orders = Order::with(['user:id,name'])->orderBy('id', 'DESC')->where('order_status', 'canceled')->get();
        return response()->json([
            'status' => 200,
            'data' => $orders
        ], 200);
    }

    public function destroy(string $id)
    {
        $order = Order::with(['orderProducts', 'transaction'])->find($id);

        if ($order == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Order Not Found!'
            ], 404);
        }

        // Delete Order Products
        $order->orderProducts()->delete();
        // Delete Transaction
        $order->transaction()->delete();
        $order->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }


    public function changeOrderStatus(Request $request, string $id)
    {
        $order = Order::find($id);

        if ($order == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Order Not Found!'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,processed_and_ready_to_ship,dropped_off,shipped,out_for_delivery,delivered,canceled'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ], 400);
        }

        $order->order_status = $request->status;
        $order->save();

        return response()->json([
            'status' => 200,
            'message' => 'Order Status Updated Successfully!'
        ], 200);
    }

    public function changePaymentStatus(Request $request, string $id)
    {
        $paymentStatus = Order::find($id);

        if ($paymentStatus == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Order Not Found!'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'status' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ], 400);
        }

        $paymentStatus->payment_status = $request->status;
        $paymentStatus->save();

        return response()->json([
            'status' => 200,
            'message' => 'Payment Status Updated Successfully!'
        ], 200);
    }
}
