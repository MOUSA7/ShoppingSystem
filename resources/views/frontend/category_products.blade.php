@extends('frontend._layout')

@section('content')

    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">{{$category->name}}
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home.index')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">{{$category->name}}</li>
        </ol>
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
{{--                                <img class="card-img-top" src="{{asset($product->image)}}" height="200"width="100%" alt="">--}}
                                <img class="card-img-top" src="https://www.hiatak.com/img/slider/s5.jpg" alt="" height="200"width="100%">
                                <div class="card-body">
                                    <p><b>{{$product->name}}</b></p>
                                    <p class="card-text">
                                        {!! Str::limit($product->description,17) !!}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a type="button" href="{{route('home.show',$product->id)}}" class="btn btn-sm btn-outline-success">View</a>&nbsp;
                                            <a type="button" class="btn btn-sm btn-outline-primary">Buy</a>
                                        </div>
                                        <small class="text-muted">${{$product->price}}</small>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="col-md-2">
                <form action="{{route('home.category',[$slug])}}" method="GET">
                    <p>
                        @foreach($category->subCategory as $sub)
                            <input type="checkbox" name="subcategory[]" value="{{$sub->id}}" class="float-right">
                            {{$sub->name}}
                            <br>
                        @endforeach
                    </p>
                    <input type="submit" class="btn btn-primary" value="Filter">
                </form>
                <br>
                <hr>
                <br>
                <h3>Filter Price</h3>
                <form action="{{route('home.category',[$slug])}}" method="GET">
                    <input type="text" name="min" placeholder="Minimum Price" class="form-control">
                    <br>
                    <input type="text" name="max" placeholder="Maximum Price" class="form-control">
                    <input type="hidden" name="categoryId" value="{{$categoryId}}">
                    <br>
                    <input type="submit" class="btn btn-primary" value="Filter">

                </form>
            </div>

        </div>
    <!-- /.row -->

        <hr>

        <!-- Pagination -->
    </div>

@endsection
