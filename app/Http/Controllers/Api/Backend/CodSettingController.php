<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\CodSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CodSettingController extends Controller
{
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        CodSetting::updateOrCreate(
            ['id' => 1],
            [
                'status' => $request->status,
            ]
        );

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!',
        ], 200);
    }
}
