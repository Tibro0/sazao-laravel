<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = SubCategory::with('category:id,name')->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $subCategories
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
            'name' => 'required|max:200|unique:sub_categories,name',
            'status' => 'required|boolean',
        ], [
            'category.required' => 'Please Select a Category',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $subCategory = new SubCategory();
        $subCategory->category_id = $request->category;
        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);
        $subCategory->status = $request->status;
        $subCategory->save();

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
        $subCategory = SubCategory::with('category:id,name')->find($id);

        if ($subCategory === null) {
            return response()->json([
                'status' => 404,
                'message' => 'Sub Category Not Found!',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $subCategory
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
        $subCategory = SubCategory::with(['category'])->find($id);

        if ($subCategory === null) {
            return response()->json([
                'status' => 404,
                'message' => 'Sub Category Not Found!',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'category' => 'required|integer',
            'name' => 'required|max:200|unique:sub_categories,name,' . $id,
            'status' => 'required|boolean',
        ], [
            'category.required' => 'Please Select a Category',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $subCategory->category_id = $request->category;
        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);
        $subCategory->status = $request->status;
        $subCategory->save();

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
        $subCategory = SubCategory::find($id);

        if ($subCategory === null) {
            return response()->json([
                'status' => 404,
                'message' => 'Sub Category Not Found!',
            ], 404);
        }

        $childCategory = ChildCategory::where('sub_category_id', $subCategory->id)->count();

        if ($childCategory > 0) {
            return response()->json([
                'status' => 403,
                'message' => 'This Items Contain, Sub Items For Delete This you Have to Delete the Sub Item First!',
            ], 403);
        }

        $subCategory->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!',
        ], 200);
    }
}
