@extends('admin.layouts.master')
@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">لوحة التحكم</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">أضافة سلعة</a></li>
                <li class="breadcrumb-item active">لوحة التحكم</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop
@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title" style="float: right">تسجيل سلعة جديدة</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('admin.products.store')}}"  enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="title">عنوان التصنيف</label>
                                    <input name="name" placeholder="أدخل إسم السلعة" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for=""> أسم التصنيف </label>
                                    <select id="category" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">أختيار التصنيف </option>
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

                                <div class="form-group">
                                    <label for="">وصف السلعة</label>
                                    <textarea id="textarea" class=" form-control @error('description') is-invalid @enderror" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; " name="description" ></textarea>
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
                        <div class="col-sm-6">
                            <br>
                            <div class="form-group">
                                <label for="price">السعر($)</label>
                                <input name="price" placeholder="سعر السلعة" class="form-control @error('price') is-invalid @enderror">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for=""> أسم التصنيف الفرعي</label>
                                <select name="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror">
                                    <option value="">أختيار التصنيف </option>
                                </select>
                                @error('subcategory_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <br>
                            <div class="form-group">
                                <label for="customFile">أضافة صورة</label>
                                <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-lg rounded-30">حفظ السلعة</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    </div>

@stop
{{--<script src="{{asset('dist/js/jquery.min.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // $('document').ready(function (){
    //     alert('as');
    //     $('#category')->on('change',function (){
    //         alert('success')
    //     });
    // });
</script>
