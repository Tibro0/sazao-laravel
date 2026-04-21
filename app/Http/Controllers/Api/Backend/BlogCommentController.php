<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    public function index()
    {
        $comments = BlogComment::with(['blog:id,title,slug', 'user:id,name'])->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $comments
        ], 200);
    }

    public function destroy(string $id)
    {
        $comment = BlogComment::find($id);

        if ($comment == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Comment Not Found!'
            ], 404);
        }

        $comment->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }
}
