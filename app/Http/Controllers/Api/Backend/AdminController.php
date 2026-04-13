<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\NewsletterSubscribe;
use App\Models\ProductReview;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $todaysOrder = Order::whereDate('created_at', Carbon::today())->count();
        $todaysPendingOrder = Order::whereDate('created_at', Carbon::today())->where('order_status', 'pending')->count();
        $totalOrders = Order::count();
        $totalPendingOrders = Order::where(['order_status' => 'pending'])->count();
        $totalCanceledOrders = Order::where(['order_status' => 'canceled'])->count();
        $totalCompleteOrders = Order::where(['order_status' => 'delivered'])->count();
        $todaysEarnings = Order::where('order_status', '!=', 'canceled')->where('payment_status', 1)->whereDate('created_at', Carbon::today())->sum('sub_total');
        $monthEarnings = Order::where('order_status', '!=', 'canceled')->where('payment_status', 1)->whereMonth('created_at', Carbon::now()->month)->sum('sub_total');
        $yearEarnings = Order::where('order_status', '!=', 'canceled')->where('payment_status', 1)->whereYear('created_at', Carbon::now()->year)->sum('sub_total');
        $totalReview = ProductReview::count();
        $totalBrands = Brand::count();
        $totalCategories = Category::count();
        $totalBlogs = Blog::count();
        $totalSubscribers = NewsletterSubscribe::count();
        $totalVendors = User::where(['role' => 'vendor'])->count();
        $totalUsers = User::where(['role' => 'user'])->count();

        return response()->json([
            'status' => 200,
            'data' => [
                'todaysOrder' => $todaysOrder,
                'todaysPendingOrder' => $todaysPendingOrder,
                'totalOrders' => $totalOrders,
                'totalPendingOrders' => $totalPendingOrders,
                'totalCanceledOrders' => $totalCanceledOrders,
                'totalCompleteOrders' => $totalCompleteOrders,
                'todaysEarnings' => $todaysEarnings,
                'monthEarnings' => $monthEarnings,
                'yearEarnings' => $yearEarnings,
                'totalReview' => $totalReview,
                'totalBrands' => $totalBrands,
                'totalCategories' => $totalCategories,
                'totalBlogs' => $totalBlogs,
                'totalSubscribers' => $totalSubscribers,
                'totalVendors' => $totalVendors,
                'totalUsers' => $totalUsers,
            ]
        ], 200);
    }
}
