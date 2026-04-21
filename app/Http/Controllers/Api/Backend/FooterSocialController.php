<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FooterSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $footerSocials = FooterSocial::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $footerSocials
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
            'icon' => 'required|max:255',
            'name' => 'required|max:255',
            'url' => 'required|url|max:255',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $footer = new FooterSocial();
        $footer->icon = $request->icon;
        $footer->name = $request->name;
        $footer->url = $request->url;
        $footer->status = $request->status;
        $footer->save();

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
        $footer = FooterSocial::find($id);

        if ($footer == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Footer Social Not Found',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $footer,
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
        $footer = FooterSocial::find($id);

        if ($footer == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Footer Social Not Found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'icon' => 'required|max:255',
            'name' => 'required|max:255',
            'url' => 'required|url|max:255',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $footer->icon = $request->icon;
        $footer->name = $request->name;
        $footer->url = $request->url;
        $footer->status = $request->status;
        $footer->save();

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
        $footer = FooterSocial::find($id);

        if ($footer == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Footer Social Not Found',
            ], 404);
        }

        $footer->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!',
        ], 200);
    }
}
