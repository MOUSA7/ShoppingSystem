<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index()
    {
        $subcategories = SubCategory::all();
        return view('admin.subcategories.index',compact('subcategories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategories.create',compact('categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required | min:2',
            'category_id'=> 'required',
        ]);

        SubCategory::create([
           'name' => $request->name,
           'category_id'=>$request->category_id
        ]);
//        dd($request->all());
        notify()->success('!تم إضافة التصنيف الفرعي بنجاح');
        return redirect('admin/subcategories');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $sub = SubCategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.subcategories.edit',compact('sub','categories'));
    }

    public function update(Request $request, $id)
    {
        $sub = SubCategory::findOrFail($id);

        $this->validate($request,[
            'name' => 'required | min:2',
            'category_id'=> 'required',
        ]);


        $sub->update([
            'name' => $request->name,
            'category_id'=>$request->category_id
        ]);
        notify()->success('!تم تعديل التصنيف الفرعي بنجاح');
        return redirect('admin/subcategories');
    }


    public function destroy($id)
    {
        $sub = SubCategory::findOrFail($id);
        $sub->delete();
        notify()->success('!تم حذف التصنيف الفرعي بنجاح');
        return redirect()->back();
    }
}
