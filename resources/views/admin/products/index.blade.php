@extends('admin.layouts.master')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><b>عرض المنتجات </b></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">عرض المنتجات</a></li>
                <li class="breadcrumb-item active">لوحة التحكم</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a href="{{route('admin.products.create')}}"  class="btn btn-success float-right">
                                <i class="fa fa-plus"></i>
                                أضافة سلعة
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">

                    <table class="table table-hover">
                        @if($products->count() > 0)
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>السلعة</th>
                                <th>السعر($)</th>
                                <th>التفاصيل</th>
                                <th>الصورة</th>
                                <th>التصنيف</th>
                                <th>الوقت</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $index => $value)
                                <tr>
                                    <td>{{$index +1}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{'$'.$value->price}}</td>
                                    <td>{!! substr(strip_tags($value->description), 0, 50) !!}</td>
                                    <td>
                                        <img src="{{$value->image ? asset($value->image) :'Not Found'}}" height="60" width="70" alt="">
                                    </td>
                                    <td>{{$value->subcategory ? $value->subcategory->name:'Not Found'}}</td>
                                    <td>{{$value->created_at->diffForHumans()}}</td>

                                    <td class="d-flex">
                                        <a href="{{route('admin.products.show',$value->id)}}" class="btn btn-sm btn-info">عرض</a>&nbsp;
                                        <a href="{{route('admin.products.edit',$value->id)}}" class="btn btn-sm btn-primary">تعديل</a>&nbsp;
                                        <form action="{{route('admin.products.destroy',$value->id)}}" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" onclick="return confirm('هل تريد حذف السلعة{{$value->name}}')" class="btn btn-sm btn-danger">
                                                حذف
                                            </button>
                                        </form>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        @else
                            <h3 class="text-center">No Category Created Yet</h3>
                        @endif
                    </table>

                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
        </div>
    </div>

@stop

{{--<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>--}}
{{--<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>--}}
{{--<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>--}}
{{--<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>--}}
{{--<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>--}}
{{--<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>--}}
{{--<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>--}}
{{--<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>--}}
{{--<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>--}}

