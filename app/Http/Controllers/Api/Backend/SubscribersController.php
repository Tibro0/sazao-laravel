<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Mail\Newsletter;
use App\Models\NewsletterSubscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SubscribersController extends Controller
{
    public function index()
    {
        $Subscribers = NewsletterSubscribe::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $Subscribers
        ]);
    }

    public function sendMail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $emails = NewsletterSubscribe::where(['is_verified' => 1])->pluck('email')->toArray();
        Mail::to($emails)->send(new Newsletter($request->subject, ($request->message)));

        return response()->json([
            'status' => 200,
            'message' => 'Mail Has Been Send.'
        ]);
    }

    public function destroy(string $id)
    {
        $subscriber = NewsletterSubscribe::find($id);

        if ($subscriber == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Subscriber Not Found!'
            ], 404);
        }

        $subscriber->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ]);
    }
}
