<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShippingRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShippingRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shippingRules = ShippingRule::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $shippingRules
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
            'type' => 'required|in:flat_cost,min_cost',
            'min_cost' => 'nullable|integer',
            'cost' => 'required|integer',
            'status' => 'required|boolean',
        ], [
            'status.required' => 'Please select a status.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $shipping = new ShippingRule();
        $shipping->name = $request->name;
        $shipping->type = $request->type;
        $shipping->min_cost = $request->min_cost;
        $shipping->cost = $request->cost;
        $shipping->status = $request->status;
        $shipping->save();

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
        $shipping = ShippingRule::find($id);

        if ($shipping == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Shipping Rule Not Found!',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $shipping
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
        $shipping = ShippingRule::find($id);

        if ($shipping == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Shipping Rule Not Found!',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200',
            'type' => 'required|in:flat_cost,min_cost',
            'min_cost' => 'nullable|integer',
            'cost' => 'required|integer',
            'status' => 'required|boolean',
        ], [
            'status.required' => 'Please select a status.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $shipping->name = $request->name;
        $shipping->type = $request->type;
        $shipping->min_cost = $request->min_cost;
        $shipping->cost = $request->cost;
        $shipping->status = $request->status;
        $shipping->save();

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
        $shipping = ShippingRule::find($id);

        if ($shipping == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Shipping Rule Not Found!',
            ], 404);
        }

        $shipping->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!',
        ], 200);
    }
}
