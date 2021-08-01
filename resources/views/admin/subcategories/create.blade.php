@extends('admin.layouts.master')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">لوحة التحكم</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">أضافة تصنيف</a></li>
                <li class="breadcrumb-item active">لوحة التحكم</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop
@section('content')

    <div class="row">
        <div class="col-12">
            <!-- /.card-header -->
            <div class="row justify-content-center">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title" style="float: right">تسجيل تصنيف جديد</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('admin.subcategories.store')}}"  enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title"> أسم التصنيف الفرعي</label>
                            <input name="name" placeholder="أدخل عنوان التصنيف الفرعي" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for=""> أسم التصنيف </label>
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">تحديد التصنيف الفرعي</option>
                                @foreach($categories as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="form-group">&nbsp;
                        <button type="submit" class="btn  btn-primary">حفظ</button>
                    </div>
                </form>

            </div>
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
