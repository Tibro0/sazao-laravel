<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\WithdrawMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WithdrawMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $methods = WithdrawMethod::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $methods
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200',
            'minimum_amount' => 'required|numeric|lt:maximum_amount',
            'maximum_amount' => 'required|numeric|gt:minimum_amount',
            'withdraw_charge' => 'required|numeric',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $method = new WithdrawMethod();
        $method->name = $request->name;
        $method->minimum_amount = $request->minimum_amount;
        $method->maximum_amount = $request->maximum_amount;
        $method->withdraw_charge = $request->withdraw_charge;
        $method->description = $request->description;
        $method->save();

        return response()->json([
            'status' => 200,
            'message' => 'Created Successfully!',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $method = WithdrawMethod::find($id);

        if ($method == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Withdraw Method Not Found!',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $method,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $method = WithdrawMethod::find($id);

        if ($method == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Withdraw Method Not Found!',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200',
            'minimum_amount' => 'required|numeric|lt:maximum_amount',
            'maximum_amount' => 'required|numeric|gt:minimum_amount',
            'withdraw_charge' => 'required|numeric',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $method->name = $request->name;
        $method->minimum_amount = $request->minimum_amount;
        $method->maximum_amount = $request->maximum_amount;
        $method->withdraw_charge = $request->withdraw_charge;
        $method->description = $request->description;
        $method->save();

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $method = WithdrawMethod::find($id);

        if ($method == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Withdraw Method Not Found!',
            ], 404);
        }

        $method->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!',
        ], 200);
    }
}
