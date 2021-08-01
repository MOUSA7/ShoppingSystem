@extends('admin.layouts.master')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">أضافة مستخدم</h1>
            <hr>
            <div class="float-left">

            </div>
        </div><!-- /.col -->

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item active">أضافة مستخدم</li>

            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
@section('content')

    <form method="post" action="{{route('admin.users.update',$user->id)}}"  enctype="multipart/form-data" role="form">
        @csrf
        {{method_field('PUT')}}
        <div class="row d-flex">
            <div class="col-sm-6">
                <div class="card-body">

                    <div class="form-group">
                        <label for="name">الأسم</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="email">البريد الألكتروني</label>
                        <input type="email" name="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="phone">الهاتف</label>
                        <input type="text" name="phone" value="{{$user->phone}}" class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <img src="{{Storage::url($user->image)}}" height="80px" width="80px" alt="">
                        <label for="customFile">أضافة صورة</label>
                        <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
                <!-- /.card-body -->
            </div>

            <!-- /end-col-sm-8 -->
            <div class="col-sm-6">
                <br>

                <div class="form-group">
                    <label for="lastname">الأسم الأخير</label>
                    <input type="text" name="lastName" value="{{$user->lastName}}" class="form-control @error('lastname') is-invalid @enderror">
                    @error('lastName')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">العنوان</label>
                    <input type="text" name="address" value="{{$user->address}}" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="password">كلمة المرور</label>
                    <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <br>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success btn-lg rounded-30">حفظ المستخدم</button>
                </div>
            </div>
        </div>

    </form>
@endsection
