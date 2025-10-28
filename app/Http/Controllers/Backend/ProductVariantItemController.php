<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;

class ProductVariantItemController extends Controller
{
    public function index($productId, $variantId)
    {
        $product = Product::findOrFail($productId);
        $variant = ProductVariant::findOrFail($variantId);
        $variantItems = ProductVariantItem::where(['product_variant_id' => request()->variantId])->orderBy('id', 'DESC')->get();
        return view('admin.product.product-variant-item.index', compact('product', 'variant', 'variantItems'));
    }

    public function create(string $productId, string $variantId)
    {
        $product = Product::findOrFail($productId);
        $variant = ProductVariant::findOrFail($variantId);
        return view('admin.product.product-variant-item.create', compact('product', 'variant'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'variant_id' => ['integer', 'required'],
            'name' => ['required', 'max:200'],
            'price' => ['integer', 'required'],
            'is_default' => ['required', 'boolean'],
            'status' => ['required', 'boolean'],
        ]);

        $variantItem = new ProductVariantItem();
        $variantItem->product_variant_id = $request->variant_id;
        $variantItem->name = $request->name;
        $variantItem->price = $request->price;
        $variantItem->is_default = $request->is_default;
        $variantItem->status = $request->status;
        $variantItem->save();

        return redirect()->route('admin.products-variant-item.index', ['productId' => $request->product_id, 'variantId' => $request->variant_id])->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Created Successfully!'
        ]);
    }

    public function edit(string $variantItemId)
    {
        $variantItem = ProductVariantItem::with(['productVariant'])->findOrFail($variantItemId);
        return view('admin.product.product-variant-item.edit', compact('variantItem'));
    }

    public function update(Request $request, string $variantItemId)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'price' => ['integer', 'required'],
            'is_default' => ['required', 'boolean'],
            'status' => ['required', 'boolean'],
        ]);

        $variantItem = ProductVariantItem::findOrFail($variantItemId);
        $variantItem->name = $request->name;
        $variantItem->price = $request->price;
        $variantItem->is_default = $request->is_default;
        $variantItem->status = $request->status;
        $variantItem->save();

        return redirect()->route('admin.products-variant-item.index', ['productId' => $variantItem->productVariant->product_id, 'variantId' => $variantItem->product_variant_id])->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Updated Successfully!'
        ]);
    }

    public function destroy(string $variantItemId)
    {
        $variantItem = ProductVariantItem::findOrFail($variantItemId);
        $variantItem->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $variantItem = ProductVariantItem::findOrFail($request->id);
        $variantItem->status = $request->status == 'true' ? 1 : 0;
        $variantItem->save();
        return response(['status' => 'success', 'message' => 'Status has been Updated!']);
    }
}
