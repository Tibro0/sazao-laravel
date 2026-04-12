<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\ChildCategory;
use App\Models\HomePageSetting;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $childCategories = ChildCategory::with(['category:id,name', 'subCategory:id,name'])->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $childCategories
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
            'category' => 'required|integer',
            'sub_category' => 'required|integer',
            'name' => 'required|max:200|unique:child_categories,name',
            'status' => 'required|boolean',
        ], [
            'category.required' => 'Please Select a Category',
            'sub_category.required' => 'Please Select a Sub Category'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $childCategory = new ChildCategory();
        $childCategory->category_id = $request->category;
        $childCategory->sub_category_id = $request->sub_category;
        $childCategory->name = $request->name;
        $childCategory->slug = Str::slug($request->name);
        $childCategory->status = $request->status;
        $childCategory->save();

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
        $childCategory = ChildCategory::with(['category:id,name', 'subCategory:id,name'])->find($id);

        if ($childCategory == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Child Category Not Found!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $childCategory
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
        $childCategory = ChildCategory::with(['category:id,name', 'subCategory:id,name'])->find($id);

        if ($childCategory == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Child Category Not Found!'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'category' => 'required|integer',
            'sub_category' => 'required|integer',
            'name' => 'required|max:200|unique:child_categories,name,' . $id,
            'status' => 'required|boolean',
        ], [
            'category.required' => 'Please Select a Category',
            'sub_category.required' => 'Please Select a Sub Category'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $childCategory->category_id = $request->category;
        $childCategory->sub_category_id = $request->sub_category;
        $childCategory->name = $request->name;
        $childCategory->slug = Str::slug($request->name);
        $childCategory->status = $request->status;
        $childCategory->save();

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
        $ChildCategory = ChildCategory::find($id);

        if ($ChildCategory == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Child Category Not Found!'
            ], 404);
        }

        if (Product::where(['child_category_id' => $ChildCategory->id])->count() > 0) {
            return response()->json([
                'status' => 403,
                'message' => 'This Item Content Relation Some Products. You cant Delete It.'
            ], 403);
        }

        $homeSettings = HomePageSetting::all();
        foreach ($homeSettings as $item) {
            $array = json_decode($item->value, true);
            $collection = collect($array);
            if ($collection->contains('child_category', $ChildCategory->id)) {
                return response()->json([
                    'status' => 403,
                    'message' => 'This Item Content Relation Home Page Content. You cant Delete It.'
                ], 403);
            }
        }

        $ChildCategory->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!',
        ], 200);
    }

    public function getSubCategory(string $categoryId)
    {
        $subCategories = SubCategory::where(['category_id' => $categoryId])->get();

        return response()->json([
            'status' => 200,
            'data' => $subCategories
        ], 200);
    }
}
