<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['order:id,invoice_id'])->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $transactions
        ], 200);
    }
}
