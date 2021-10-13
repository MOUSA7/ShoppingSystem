<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware(['admin','auth'])->except(['index','edit','update','create','store','loadSubCategory']);
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }


    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
           'name' => 'required|min:4',
           'description'=>'required',
           'image' => 'required|mimes:jpg,jpeg,png',
            'price'=>'required',
            'category_id'=>'required'
        ]);
        if ($file=$request->file('image')){
            $name = $file->getClientOriginalName();
            $image = $file->move('images',$name);
            $input['image']=$image;
        }
        Product::create($input);
        notify()->success('!تم أضافة سلعة بنجاح');
        return redirect('admin/products');
    }


    public function show($id)
    {
       dd('show');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit',compact('product','categories'));
    }


    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $input = $request->all();
//        dd($input);
        if($file = $request->file('image')){

            $name = $file->getClientOriginalName();

            $image = $file->move('images', $name);

            $input['image'] = $image;

        }
        $product->update($input);

        notify()->success('!تم تعديل السلعة بنجاح');
        return redirect('admin/products');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $file = $product->image;
        Storage::delete($file);
        $product->delete();
        notify()->success('!تم حذف السلعة بنجاح');
        return redirect()->back();
    }

    public function loadSubCategory(Request $request,$id){
        $subcategory = SubCategory::where('category_id',$id)->pluck('name','id');
        return response()->json($subcategory);
    }
}
