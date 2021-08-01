@extends('admin.layouts.master')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Shoping Cart</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">عرض الأصناف</a></li>
                <li class="breadcrumb-item active">لوحة التحكم</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop
@section('content')

    <div class="row">
        <div class="col-12">
            <!-- /.card-header -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title" style="float: right">تعديل تصنيف جديد</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('admin.categories.update',$category->id)}}" enctype="multipart/form-data" role="form">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="title">عنوان التصنيف</label>
                                    <input name="name" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">وصف التصنيف</label>
                                    <textarea  class="textarea @error('description') is-invalid @enderror"  style="width: 100%; font-size: 14px; line-height: 18px; " name="description" >
                                        {{$category->description}}
                                    </textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>

                        <!-- /end-col-sm-8 -->
                        <div class="col-sm-4">
                            <br>
                            <div class="form-group">
                                <img src="{{url(Storage::url($category->image))}}" height="120" width="100%" alt="">                            </div>
                            <div class="form-group">
                                <label for="customFile">أضافة صورة</label>
                                <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                        </div>

                            <button type="submit" class="btn btn-dark btn-block">حفظ</button>
                        </div>
                    </div>
                </form>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@stop
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(function () {
        // Summernote
        $('.textarea').summernote()
    })
</script>
