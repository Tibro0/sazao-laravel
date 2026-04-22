<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Mail\AccountCreatedMail;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ManageUserController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:user,vendor,admin',
        ], [
            'role.required' => 'Please Select a Role.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $user = new User();

        if ($request->role === 'user') {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'user';
            $user->status = 'active';
            $user->save();

            Mail::to($request->email)->send(new AccountCreatedMail($request->name, $request->email, $request->password));

            return response()->json([
                'status' => 200,
                'message' => 'Created Successfully!',
            ], 200);
        } elseif ($request->role === 'vendor') {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'vendor';
            $user->status = 'active';
            $user->save();

            $vendor = new Vendor();
            $vendor->user_id = $user->id;
            $vendor->shop_name = $request->name . ' Shop';
            $vendor->banner = 'uploads/1234.jpg';
            $vendor->phone = '123456789';
            $vendor->email = 'test@gmail.com';
            $vendor->address = 'USA';
            $vendor->description = 'Shop Description';
            $vendor->status = 1;
            $vendor->save();

            Mail::to($request->email)->send(new AccountCreatedMail($request->name, $request->email, $request->password));

            return response()->json([
                'status' => 200,
                'message' => 'Created Successfully!',
            ], 200);
        } elseif ($request->role === 'admin') {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'admin';
            $user->status = 'active';
            $user->save();

            $vendor = new Vendor();
            $vendor->user_id = $user->id;
            $vendor->shop_name = $request->name . ' Shop';
            $vendor->banner = 'uploads/1234.jpg';
            $vendor->phone = '123456789';
            $vendor->email = 'test@gmail.com';
            $vendor->address = 'USA';
            $vendor->description = 'Shop Description';
            $vendor->status = 1;
            $vendor->save();

            Mail::to($request->email)->send(new AccountCreatedMail($request->name, $request->email, $request->password));

            return response()->json([
                'status' => 200,
                'message' => 'Created Successfully!',
            ], 200);
        }
    }
}
