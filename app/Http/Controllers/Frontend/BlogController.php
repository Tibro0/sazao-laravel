<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function blogDetails(string $slug)
    {
        $blog = Blog::with(['user', 'comments'])->where(['slug' => $slug, 'status' => 1])->firstOrFail();
        $moreBlogs = Blog::with(['category'])->where('slug', '!=', $slug)->where(['status' => 1])->orderBy('id', 'DESC')->take(5)->get();
        $comments = $blog->comments()->paginate(20);
        return view('frontend.pages.blog-detail', compact('blog', 'moreBlogs', 'comments'));
    }

    public function comment(Request $request)
    {
        $request->validate([
            'comment' => ['required', 'max:1000'],
            'blog_id' => ['required', 'integer'],
        ]);

        $comment = new BlogComment();
        $comment->user_id = Auth::user()->id;
        $comment->blog_id = $request->blog_id;
        $comment->comment = $request->comment;
        $comment->save();

        return response(['status' => 'success', 'message' => 'Comment Added Successfully!']);
    }
}
