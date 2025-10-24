<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = SubCategory::with(['category'])->orderBy('id', 'DESC')->get();
        return view('admin.sub-category.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.sub-category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'category' => ['required', 'integer'],
                'name' => ['required', 'max:200', 'unique:sub_categories,name'],
                'status' => ['required', 'boolean'],
            ],
            [
                'category.required' => 'Please Select a Category',
            ]
        );

        $subCategory = new SubCategory();
        $subCategory->category_id = $request->category;
        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);
        $subCategory->status = $request->status;
        $subCategory->save();

        return redirect()->route('admin.sub-category.index')->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Created Successfully!'
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
        $subCategory = SubCategory::findOrFail($id);
        return view('admin.sub-category.edit', compact('categories', 'subCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'category' => ['required', 'integer'],
                'name' => ['required', 'max:200', 'unique:sub_categories,name,' . $id],
                'status' => ['required', 'boolean'],
            ],
            [
                'category.required' => 'Please Select a Category',
            ]
        );

        $subCategory = SubCategory::findOrFail($id);
        $subCategory->category_id = $request->category;
        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);
        $subCategory->status = $request->status;
        $subCategory->save();

        return redirect()->route('admin.sub-category.index')->with('toast', [
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
        $subCategory = SubCategory::findOrFail($id);
        $childCategory = ChildCategory::where('sub_category_id', $subCategory->id)->count();
        if ($childCategory > 0) {
            return response(['status' => 'error', 'message' => 'This Items Contain, Sub Items For Delete This you Have to Delete the Sub Item First!']);
        }
        $subCategory->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $subCategory = SubCategory::findOrFail($request->id);
        $subCategory->status = $request->status == 'true' ? 1 : 0;
        $subCategory->save();
        return response(['status' => 'success', 'message' => 'Status Has Been Updated!']);
    }
}
