<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $childCategories = ChildCategory::with(['category', 'subCategory'])->orderBy('id', 'DESC')->get();
        return view('admin.child-category.index', compact('childCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.child-category.create', compact('categories'));
    }

    /**
     * Get Sub categories
     */

    public function getSubCategory(Request $request)
    {
        $subCategories = SubCategory::where(['category_id' => $request->id])->get();

        return $subCategories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required', 'integer'],
            'sub_category' => ['required', 'integer'],
            'name' => ['required', 'max:200', 'unique:child_categories,name'],
            'status' => ['required', 'boolean'],
        ]);

        $childCategory = new ChildCategory();
        $childCategory->category_id = $request->category;
        $childCategory->sub_category_id = $request->sub_category;
        $childCategory->name = $request->name;
        $childCategory->slug = Str::slug($request->name);
        $childCategory->status = $request->status;
        $childCategory->save();

        return redirect()->route('admin.child-category.index')->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Create Successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $childCategory = ChildCategory::findOrFail($id);
        $subCategories = SubCategory::where('category_id', $childCategory->category_id)->get();
        return view('admin.child-category.edit', compact('categories', 'childCategory', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category'=> ['required', 'integer'],
            'sub_category'=> ['required', 'integer'],
            'name'=> ['required', 'max:200', 'unique:child_categories,name,'.$id],
            'status'=> ['required', 'boolean'],
        ]);

        $ChildCategory =ChildCategory::findOrFail($id);
        $ChildCategory->category_id = $request->category;
        $ChildCategory->sub_category_id = $request->sub_category;
        $ChildCategory->name = $request->name;
        $ChildCategory->slug = Str::slug($request->name);
        $ChildCategory->status = $request->status;
        $ChildCategory->save();

        return redirect()->route('admin.child-category.index')->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Updated Successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ChildCategory = ChildCategory::findOrFail($id);
        $ChildCategory->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request){
        $ChildCategory = ChildCategory::findOrFail($request->id);
        $ChildCategory->status = $request->status == 'true' ? 1 : 0;
        $ChildCategory->save();
        return response(['status' => 'success', 'message' => 'Status has been Updated!']);
    }
}
