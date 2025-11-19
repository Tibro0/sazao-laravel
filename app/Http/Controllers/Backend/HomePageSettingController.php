<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomePageSetting;
use Illuminate\Http\Request;

class HomePageSettingController extends Controller
{
    public function index()
    {
        $categories = Category::where(['status' => 1])->get();
        $popularCategorySection = HomePageSetting::where(['key' => 'popular_category_section'])->first();
        $sliderSectionOne = HomePageSetting::where(['key' => 'product_slider_section_one'])->first();
        return view('admin.home-page-setting.index', compact('categories', 'popularCategorySection', 'sliderSectionOne'));
    }

    public function updatePopularCategorySection(Request $request)
    {
        $request->validate([
            'cat_one' => ['required', 'integer'],
            'cat_two' => ['required', 'integer'],
            'cat_three' => ['required', 'integer'],
            'cat_four' => ['required', 'integer'],

            'sub_cat_one' => ['nullable', 'integer'],
            'sub_cat_two' => ['nullable', 'integer'],
            'sub_cat_three' => ['nullable', 'integer'],
            'sub_cat_four' => ['nullable', 'integer'],

            'child_cat_one' => ['nullable', 'integer'],
            'child_cat_two' => ['nullable', 'integer'],
            'child_cat_three' => ['nullable', 'integer'],
            'child_cat_four' => ['nullable', 'integer'],
        ], [
            'cat_one.required' => 'Category One Filed is Required',
            'cat_two.required' => 'Category Two Filed is Required',
            'cat_three.required' => 'Category Three Filed is Required',
            'cat_four.required' => 'Category Four Filed is Required',
        ]);

        $data = [
            [
                'category' => $request->cat_one,
                'sub_category' => $request->sub_cat_one,
                'child_category' => $request->child_cat_one,
            ],
            [
                'category' => $request->cat_two,
                'sub_category' => $request->sub_cat_two,
                'child_category' => $request->child_cat_two,
            ],
            [
                'category' => $request->cat_three,
                'sub_category' => $request->sub_cat_three,
                'child_category' => $request->child_cat_three,
            ],
            [
                'category' => $request->cat_four,
                'sub_category' => $request->sub_cat_four,
                'child_category' => $request->child_cat_four,
            ],
        ];

        HomePageSetting::updateOrCreate(
            [
                'key' => 'popular_category_section',
            ],
            [
                'value' => json_encode($data),
            ]
        );

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Updated Successfully!'
        ]);
    }

    public function updateProductSliderSectionOne(Request $request)
    {
        $request->validate([
            'cat_one' => ['required', 'integer'],
            'sub_cat_one' => ['nullable', 'integer'],
            'child_cat_one' => ['nullable', 'integer'],
        ], [
            'cat_one.required' => 'Category Filed is Required',
        ]);

        $data = [
            'category' => $request->cat_one,
            'sub_category' => $request->sub_cat_one,
            'child_category' => $request->child_cat_one,
        ];


        HomePageSetting::updateOrCreate(
            [
                'key' => 'product_slider_section_one',
            ],
            [
                'value' => json_encode($data),
            ]
        );

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Updated Successfully!'
        ]);
    }
}
