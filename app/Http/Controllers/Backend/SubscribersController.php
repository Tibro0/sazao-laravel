<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\Newsletter;
use App\Models\NewsletterSubscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribersController extends Controller
{
    public function index()
    {
        $Subscribers = NewsletterSubscribe::orderBy('id', 'DESC')->get();
        return view('admin.subscriber.index', compact('Subscribers'));
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'subject' => ['required', 'max:255'],
            'message' => ['required'],
        ]);

        $emails = NewsletterSubscribe::where(['is_verified' => 1])->pluck('email')->toArray();
        Mail::to($emails)->send(new Newsletter($request->subject, ($request->message)));

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Mail Has Been Send.'
        ]);
    }

    public function destroy(string $id)
    {
        $subscriber = NewsletterSubscribe::findOrFail($id);
        $subscriber->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
