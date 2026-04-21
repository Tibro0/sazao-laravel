<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterGridTwo;
use App\Models\FooterTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FooterGridTwoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $footerTitle = FooterTitle::first();
        $footerGridTwos = FooterGridTwo::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => [
                'footerTitle' => $footerTitle,
                'footerGridTwos' => $footerGridTwos
            ]
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

        $footerGridTwo = new FooterGridTwo();
        $footerGridTwo->name = $request->name;
        $footerGridTwo->url = $request->url;
        $footerGridTwo->status = $request->status;
        $footerGridTwo->save();

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
        $footer = FooterGridTwo::find($id);

        if ($footer == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Footer Not Found!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $footer
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
        $footerGridTwo = FooterGridTwo::find($id);

        if ($footerGridTwo == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Footer Not Found!'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
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

        $footerGridTwo->name = $request->name;
        $footerGridTwo->url = $request->url;
        $footerGridTwo->status = $request->status;
        $footerGridTwo->save();

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
        $footerGridTwo = FooterGridTwo::find($id);

        if ($footerGridTwo == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Footer Not Found!'
            ], 404);
        }

        $footerGridTwo->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!',
        ], 200);
    }

    public function changeTitle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        FooterTitle::updateOrCreate(
            ['id' => 1],
            ['footer_grid_two_title' => $request->title],
        );

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!',
        ], 200);
    }
}
