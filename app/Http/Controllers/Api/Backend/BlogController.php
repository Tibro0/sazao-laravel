<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with(['category:id,name'])->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $blogs
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
            'image' => 'required|image|max:2048|dimensions:width=1210,height=637',
            'title' => 'required|max:255|unique:blogs,title',
            'category' => 'required|integer',
            'description' => 'required',
            'seo_title' => 'nullable|max:255',
            'seo_description' => 'nullable|max:255',
            'status' => 'required|boolean',
        ],[
            'category.required' => 'Please Select a Category.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

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
        $blog = Blog::with(['category'])->find($id);

        if ($blog == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Blog Not Found!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $blog
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
        $blog = Blog::with(['category'])->find($id);

        if ($blog == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Blog Not Found!'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|max:2048|dimensions:width=1210,height=637',
            'title' => 'required|max:255|unique:blogs,title,' . $id,
            'category' => 'required|integer',
            'description' => 'required',
            'seo_title' => 'nullable|max:255',
            'seo_description' => 'nullable|max:255',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $defaultImages = [
            'frontend/images/main-image/blogs_images/one.jpg',
            'frontend/images/main-image/blogs_images/two.jpg',
            'frontend/images/main-image/blogs_images/three.jpg',
            'frontend/images/main-image/blogs_images/four.jpg',
        ];

        if ($request->hasFile('image')) {
            $isDefaultImage = in_array($blog->image, $defaultImages);

            if (!$isDefaultImage) {
                $imagePath = $this->updateImage($request, 'image', 'uploads/blogs_images', $blog->image);
            } else {
                $imagePath = $this->uploadImage($request, 'image', 'uploads/blogs_images');
            }

            $blog->image = $imagePath;
        }

        $blog->user_id = Auth::user()->id;
        $blog->category_id = $request->category;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->description;
        $blog->seo_title = $request->seo_title;
        $blog->seo_description = $request->seo_description;
        $blog->status = $request->status;
        $blog->save();

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
        $blog = Blog::with(['category', 'comments'])->find($id);

        if ($blog == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Blog Not Found!'
            ], 404);
        }

        $defaultImages = [
            'frontend/images/main-image/blogs_images/one.jpg',
            'frontend/images/main-image/blogs_images/two.jpg',
            'frontend/images/main-image/blogs_images/three.jpg',
            'frontend/images/main-image/blogs_images/four.jpg',
        ];

        if ($blog->image && !in_array($blog->image, $defaultImages)) {
            $this->deleteImage($blog->image);
        }

        if ($blog->comments()->count() > 0) {
            return response()->json([
                'status' => 403,
                'message' => 'This Item Content Relation Some Blog Comments. You cant Delete It.'
            ], 403);
        }

        $blog->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }
}
