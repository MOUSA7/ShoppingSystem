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

    <form method="post" action="{{route('admin.users.store')}}"  enctype="multipart/form-data" role="form">
        @csrf
        <div class="row d-flex">
            <div class="col-sm-6">
                <div class="card-body">

                    <div class="form-group">
                        <label for="name">الأسم</label>
                        <input type="text" name="name" placeholder="أدخل إسم المستخدم" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="email">البريد الألكتروني</label>
                        <input type="email" name="email" placeholder="أدخل البريد الألكتروني" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="phone">الهاتف</label>
                        <input type="text" name="phone" placeholder="أدخل رقم الهاتف" class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
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
                    <input type="text" name="lastName" placeholder="الأسم الأخير" class="form-control @error('lastName') is-invalid @enderror">
                    @error('lastName')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">العنوان</label>
                    <input type="text" name="address" placeholder="العنوان" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="password">كلمة المرور</label>
                    <input type="password" name="password" placeholder="كلمة المرور" class="form-control @error('password') is-invalid @enderror">
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
