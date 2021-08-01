@extends('admin.layouts.master')

@section('title')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">لوحة التحكم</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">عرض الأخبار</a></li>
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
                            <a href="{{route('admin.subcategories.create')}}"  class="btn btn-success float-right">
                                <i class="fa fa-plus"></i>
                                أضافة خبر
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">

                    <table class="table table-hover">
                        @if($subcategories->count() > 0)
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th> التصنيف الفرعي</th>
                                <th>التصنيف</th>
                                <th>الوقت</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subcategories as $index => $value)
                                <tr>
                                    <td>{{$index +1}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->category ? $value->category->name:'Not Found'}}</td>
                                    <td>{{$value->created_at->diffForHumans()}}</td>

                                    <td class="d-flex">
                                        <a href="{{route('admin.subcategories.show',$value->id)}}" class="btn btn-sm btn-info">عرض</a>&nbsp;
                                        <a href="{{route('admin.subcategories.edit',$value->id)}}" class="btn btn-sm btn-primary">تعديل</a>&nbsp;
                                        <form action="{{route('admin.subcategories.destroy',$value->id)}}" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" onclick="return confirm('هل تريد حذف تصنيف الفرعي{{$value->name}}')" class="btn btn-sm btn-danger">
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
