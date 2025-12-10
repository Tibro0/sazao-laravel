<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    public function index()
    {
        $comments = BlogComment::with(['blog', 'user'])->orderBy('id', 'DESC')->get();
        return view('admin.blog.blog-comment.index', compact('comments'));
    }

    public function destroy(string $id)
    {
        $comment = BlogComment::findOrFail($id);
        $comment->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
