<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use App\Models\WithdrawMethod;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class VendorWithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $WithdrawRequests = WithdrawRequest::where(['vendor_id' => Auth::user()->id])->get();
        $totalEarnings = OrderProduct::where('vendor_id', Auth::user()->id)
            ->whereHas('order', function ($query) {
                $query->where('payment_status', 1)->where('order_status', 'delivered');
            })
            ->sum(DB::raw('unit_price * qty + variant_total'));
        $totalWithdraw = WithdrawRequest::where('status', 'paid')->sum('total_amount');
        $currentBalance = $totalEarnings - $totalWithdraw;

        $pendingAmount = WithdrawRequest::where('status', 'pending')->sum('total_amount');
        return view('vendor.withdraw.index', compact('WithdrawRequests','currentBalance', 'totalWithdraw', 'pendingAmount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $methods = WithdrawMethod::all();
        return view('vendor.withdraw.create', compact('methods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'method' => ['required', 'integer'],
            'amount' => ['required', 'numeric'],
            'account_info' => ['required', 'max:2000'],
        ]);

        $method = WithdrawMethod::findOrFail($request->method);
        if ($request->amount < $method->minimum_amount || $request->amount > $method->maximum_amount) {
            throw ValidationException::withMessages(["The amount have to be getter than $method->minimum_amount and less than $method->maximum_amount"]);
        }

        $totalEarnings = OrderProduct::where('vendor_id', Auth::user()->id)
            ->whereHas('order', function ($query) {
                $query->where('payment_status', 1)->where('order_status', 'delivered');
            })
            ->sum(DB::raw('unit_price * qty + variant_total'));
        $totalWithdraw = WithdrawRequest::where('status', 'paid')->sum('total_amount');
        $currentBalance = $totalEarnings - $totalWithdraw;

        if ($request->amount > $currentBalance) {
            throw ValidationException::withMessages(['Insufficient Balance']);
        }

        if (WithdrawRequest::where(['vendor_id' => Auth::user()->id, 'status' => 'pending'])->exists()) {
            throw ValidationException::withMessages(['You Already Have a Pending Request.']);
        }

        $withdraw = new WithdrawRequest();
        $withdraw->vendor_id = Auth::user()->id;
        $withdraw->method = $method->name;
        $withdraw->total_amount = $request->amount;
        $withdraw->withdraw_amount = $request->amount - ($method->withdraw_charge / 100) * $request->amount;
        $withdraw->withdraw_charge = ($method->withdraw_charge / 100) * $request->amount;
        $withdraw->account_info = $request->account_info;
        $withdraw->save();

        return redirect()->route('vendor.withdraw.index')->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Request Added Successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $methodInfo = WithdrawMethod::findOrFail($id);
        return response($methodInfo);
    }

    public function showRequest(string $id)
    {
        $request = WithdrawRequest::where(['vendor_id' => Auth::user()->id])->findOrFail($id);
        return view('vendor.withdraw.show', compact('request'));
    }
}
