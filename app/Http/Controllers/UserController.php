<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('admin.users.index',compact('users'));
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        $input = $request->all();

        if ($file=$request->file('image')){
            $name = $file->getClientOriginalName();
            $image = $file->move('images',$name);
            $input['image']=$image;
        }
        $input['password']=bcrypt($request->password);
        User::create($input);
        notify()->success('!تم أضافة مستخدم بنجاح');
        return redirect('admin/users');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if(trim($request->password) == ''){

            $input = $request->except('password');

        } else{
            $input = $request->all();

            $input['password'] = bcrypt($request->password);

        }
        if($file = $request->file('image')){

            $name = $file->getClientOriginalName();

           $image = $file->move('images', $name);

            $input['image'] = $image;

        }
//        dd($input);

//        dd($request->all());
        $user->update($input);

        notify()->success('!تم تعديل المستخدم بنجاح');
        return redirect('admin/users');
    }


    public function destroy($id)
    {
        //
    }
}
