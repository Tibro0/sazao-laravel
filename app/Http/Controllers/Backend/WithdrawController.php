<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function index()
    {
        $withdrawRequests = WithdrawRequest::with(['vendor'])->orderBy('id', 'DESC')->get();
        return view('admin.withdraw.index', compact('withdrawRequests'));
    }

    public function show(string $id)
    {
        $request = WithdrawRequest::with(['vendor'])->findOrFail($id);
        return view('admin.withdraw.show', compact('request'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => ['required', 'in:pending,paid,decline'],
        ]);

        $withdraw = WithdrawRequest::findOrFail($id);
        $withdraw->status = $request->status;
        $withdraw->save();

        return redirect()->route('admin.withdraw.index')->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Updated Successfully!'
        ]);
    }
}
