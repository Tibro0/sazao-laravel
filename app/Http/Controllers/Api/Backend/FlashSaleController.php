<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FlashSaleController extends Controller
{
    public function index()
    {
        $flashSaleDate = FlashSale::first();
        $products = Product::where(['is_approved' => 1, 'status' => 1])->select('id', 'name')->get();
        $flashSaleItems = FlashSaleItem::with(['product:id,name,slug'])->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => [
                'flash_sale_date' => $flashSaleDate,
                'products' => $products,
                'flash_sale_items' => $flashSaleItems
            ]
        ], 200);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'end_date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        FlashSale::updateOrCreate(
            ['id' => 1],
            ['end_date' => $request->end_date],
        );

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!'
        ], 200);
    }

    public function addProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product' => 'required|unique:flash_sale_items,product_id',
            'show_at_home' => 'required|boolean',
            'status' => 'required|boolean'
        ], [
            'product.required' => 'Please Select a Product',
            'product.unique' => 'This Product is Already In Flash Sale.',
            'show_at_home.required' => 'Please Select a show at Home Option',
            'status.required' => 'Please Select a Status'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $flashSaleDate = FlashSale::first();
        $flashSaleItem = new FlashSaleItem();
        $flashSaleItem->product_id = $request->product;
        $flashSaleItem->flash_sale_id = $flashSaleDate->id;
        $flashSaleItem->show_at_home = $request->show_at_home;
        $flashSaleItem->status = $request->status;
        $flashSaleItem->save();

        return response()->json([
            'status' => 200,
            'message' => 'Product Added Successfully!'
        ], 200);
    }
}
