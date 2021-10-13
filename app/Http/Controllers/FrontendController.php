<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function show($id)
    {
//        dd('sad');
        $product = Product::findOrFail($id);
        $productSameCategory = Product::inRandomOrder()->where('category_id',$product->category_id)
            ->where('id','!=',$product->id)->limit(3)->get();
        return view('frontend.show', compact('product','productSameCategory'));
    }

    public function ProductCategory($name,Request $request)
    {
        $category = Category::where('slug',$name)->first();
        $categoryId = $category->id;
        if ($request->subcategory){
            $products = $this->filter($request);

        }elseif ($request->min || $request->max){
            $products = $this->filterByPrice($request);
//            dd($products);
        }
        else{
            $products = Product::where('category_id',$category->id)->get();
        }
        $slug = $name;
        return view('frontend.category_products', compact('category','categoryId','products','slug'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function filter(Request $request){
        $subId = [];
        $subCategories = SubCategory::whereIn('id',$request->subcategory)->get();
        foreach ($subCategories as $sub){
            array_push($subId,$sub->id);
        }
        $products = Product::whereIn('subcategory_id',$subId)->get();
        return $products;
    }

    public function filterByPrice(Request $request){
        $categoryId = $request->categoryId;
        $products = Product::whereBetween('price',[$request->min,$request->max])
            ->where('category_id',$categoryId)->get();
//        dd($products);
        return $products;
    }
    //
}
