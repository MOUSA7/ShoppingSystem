@extends('frontend._layout')

@section('content')


    <div class="container">

        <!-- Page Heading/Breadcrumbs -->

        <br>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">{{$product->category->name}}</li>
        </ol>

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-sm-6">

                <!-- Preview Image -->
                <div class="text-center">
                    <img class="img-fluid rounded" height="100%" width="70%" src="{{$product->image ? asset($product->image):url(asset('/frontend/img/1.jpg'))}}" alt="">

                </div>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-6">

                <!-- Side Widget -->
                <div class="card">
                    <h5 class="card-header text-center">تفاصيل السلعة</h5>
                    <div class="card-body" >
                        <div class="text-right">
                            <h3><span class="badge badge-success"  style="font-size: 20px;"> إسم السلعة  </span> : {{$product->name}}</h3>
                            <h3 class="d-flex"><span class="badge badge-success" style="font-size: 20px;">&nbsp; &nbsp; التفاصيل </span>   : {!! Str::limit($product->description,30) !!}</h3>
                            <h3><span class="badge badge-success"  style="font-size: 20px;">&nbsp; &nbsp; السعر   </span> : <span style="color: red">{{'$'.$product->price}}</span></h3>
                            <h3> <span class="badge badge-success" style="font-size: 20px;">التصنيف   </span> : {{$product->category->name}}</h3>
                            <h3> <span class="badge badge-success" style="font-size: 20px;">التصنيف الفرعي   </span> : {{$product->subcategory->name}}</h3>
                        </div>
                        <br>
                        <form action="#" method="post">
                            @csrf
                            <div class="form-inline">
                                <h3 style="font-family: 'Simplified Arabic Fixed'"><b>الكمية: </b> </h3>
                                <input type="text" value="{{$product['qty']}}" name="qty" class="form-control">&nbsp;
                                <input type="submit" class="btn btn-primary" value="save">
                            </div>
                        </form>
                        <br>
                        <hr>
                        <br>
                        <a href="{{route('home.add.cart',$product->id)}}" class="btn btn-lg btn-outline-primary text-uppercase">Add To Cart</a>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>
    <div class="jumbotron">
        <h3 class="text-right"><b>The Same Category</b></h3>
        <hr>
        <div class="row">
            @foreach($productSameCategory as $product)
                <div class="col-md-3">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="{{asset($product->image)}}" height="200"width="100%" alt="">
                        <div class="card-body">
                            <p><b>{{$product->name}}</b></p>
                            <p class="card-text">
                                {!! Str::limit($product->description,20) !!}
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
@stop
