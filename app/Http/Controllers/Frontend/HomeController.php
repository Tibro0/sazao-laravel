<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\HomePageSetting;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where(['status' => 1])->orderBy('serial', 'ASC')->get();
        $flashSaleDate = FlashSale::first();
        $flashSaleItems = FlashSaleItem::where(['show_at_home' => 1, 'status' => 1])->orderBy('id', 'DESC')->get();
        $popularCategorySection = HomePageSetting::where(['key' => 'popular_category_section'])->first();
        $brands = Brand::where(['is_featured' => 1, 'status' => 1])->orderBy('id', 'DESC')->get();
        return view('frontend.home.home', compact('sliders', 'flashSaleDate', 'flashSaleItems', 'popularCategorySection', 'brands'));
    }
}
