<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
           'name' => 'required|unique:categories',
           'description'=> 'required',
           'image'=> 'required | mimes:jpg,jpeg,png'
        ]);
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image'=> $request->file('image')->store('public/files'),
            'description' => $request->description
        ]);
        notify()->success('!تم إضافة التصنيف بنجاح');
        return redirect('admin/categories');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit',compact('category'));
    }


    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $this->validate($request,[
            'name' => 'required',
            'description'=> 'required',
//            'image'=> 'required | mimes:jpg,jpeg,png'
        ]);
        $image = $request->image;
        if ($file = $request->file('image')){
            $image = $file->store('public/files');
            Storage::delete($image);
        }
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description
        ]);
        notify()->success('!تم تعديل التصنيف بنجاح');
        return redirect('admin/categories');

    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $file = $category->image;
        $category->delete();
        Storage::delete($file);
        notify()->success('!تم حذف التصنيف بنجاح');
        return redirect()->back();
        //
    }
}
