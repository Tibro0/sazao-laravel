<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogCategories = BlogCategory::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $blogCategories
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
            'name' => 'required|max:255|unique:blog_categories',
            'status' => 'required|boolean'
        ], [
            'name.unique' => 'Category Already Exist.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $blogCategory = new BlogCategory();
        $blogCategory->name = $request->name;
        $blogCategory->slug = Str::slug($request->name);
        $blogCategory->status = $request->status;
        $blogCategory->save();

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
        $blogCategory = BlogCategory::find($id);

        if ($blogCategory == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Blog Category Not Found!',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $blogCategory
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
        $blogCategory = BlogCategory::find($id);

        if ($blogCategory == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Blog Category Not Found!',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:blog_categories,name,' . $id,
            'status' => 'required|boolean'
        ], [
            'name.unique' => 'Category Already Exist.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $blogCategory->name = $request->name;
        $blogCategory->slug = Str::slug($request->name);
        $blogCategory->status = $request->status;
        $blogCategory->save();

        return response()->json([
            'status' => 200,
            'message' => 'Update Successfully!',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blogCategory = BlogCategory::find($id);

        if ($blogCategory == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Blog Category Not Found!',
            ], 404);
        }

        if ($blogCategory->blogs->count() > 0) {
            return response()->json([
                'status' => 403,
                'message' => 'This Item Content Relation Some Blogs. You cant Delete It.',
            ], 403);
        }

        $blogCategory->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!',
        ], 200);
    }
}
