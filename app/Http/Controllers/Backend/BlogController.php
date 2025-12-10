<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with(['category'])->orderBy('id', 'DESC')->get();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogCategories = BlogCategory::where(['status' => 1])->get();
        return view('admin.blog.create', compact('blogCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:2048', 'dimensions:width=1210,height=637'],
            'title' => ['required', 'max:255', 'unique:blogs,title'],
            'category' => ['required', 'integer'],
            'description' => ['required'],
            'seo_title' => ['nullable', 'max:255'],
            'seo_description' => ['nullable', 'max:255'],
            'status' => ['required', 'boolean']
        ]);

        $imagePath = $this->uploadImage($request, 'image', 'uploads/blogs_images');

        $blog = new Blog();
        $blog->user_id = Auth::user()->id;
        $blog->category_id = $request->category;
        $blog->image = $imagePath;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->description;
        $blog->seo_title = $request->seo_title;
        $blog->seo_description = $request->seo_description;
        $blog->status = $request->status;
        $blog->save();

        return redirect()->route('admin.blog.index')->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Created Successfully!'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        $blogCategories = BlogCategory::where(['status' => 1])->get();
        return view('admin.blog.edit', compact('blog', 'blogCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'max:2048', 'dimensions:width=1210,height=637'],
            'title' => ['required', 'max:200', 'unique:blogs,title,' . $id],
            'category' => ['required', 'integer'],
            'description' => ['required'],
            'seo_title' => ['nullable', 'max:200'],
            'seo_description' => ['nullable', 'max:200'],
            'status' => ['required', 'boolean']
        ]);

        $blog = Blog::findOrFail($id);
        $imagePath = $this->updateImage($request, 'image', 'uploads/blogs_images', $blog->image);

        $blog->user_id = Auth::user()->id;
        $blog->category_id = $request->category;
        $blog->image = empty(!$imagePath) ? $imagePath : $blog->image;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->description;
        $blog->seo_title = $request->seo_title;
        $blog->seo_description = $request->seo_description;
        $blog->status = $request->status;
        $blog->save();

        return redirect()->route('admin.blog.index')->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Update Successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        $this->deleteImage($blog->image);
        $blog->comments()->delete();
        $blog->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $blog = Blog::findOrFail($request->id);
        $blog->status = $request->status == 'true' ? 1 : 0;
        $blog->save();
        return response(['status' => 'success', 'message' => 'Status Has Been Updated!']);
    }
}
