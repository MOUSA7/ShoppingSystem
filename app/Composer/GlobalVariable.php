<?php

namespace App\Composer;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GlobalVariable{

    public function compose(View $view){

        $products = Product::latest()->take(4)->get();
        $slider = Product::where('slider',1)->get();
        $categories = Category::all();


        $view->with(['categories'=>$categories,'products'=>$products,'slider'=>$slider]);
    }

}
