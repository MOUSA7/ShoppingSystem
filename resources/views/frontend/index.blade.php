@extends('frontend._layout')
{{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">--}}
@section('header')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            @foreach($products as $key=>$product)
                <div class="carousel-item {{$key == 2 ? 'active' : '' }}">

{{--                    <img  width="100%" class="image" src="{{$product->image ? asset($product->image):url(asset('/frontend/img/1.jpg'))}}" alt="">--}}
                    <img width="100%" class="image" src="https://i.pinimg.com/originals/79/98/e4/7998e4aa36f6bf78c6b15d6d30e279cf.jpg" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>{{$product->name}}</h3>
                        <p>{!! Str::limit($product->description,20) !!}</p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

@stop
@section('content')

    @foreach($categories->take(3) as $cat)
        <section class="gray-sec">
            <div class="container">

                <!-- category Section -->
                <h3>  <span class="badge badge-success float-right">{{$cat->name}}</span></h3>
                <br>
                <br>
                <div class="row">
                    @foreach($cat->products->take(3) as $product)
                        <div class="col-lg-4 col-sm-6 portfolio-item">
                            <div class="card h-100">
{{--                                <img class="card-img-top" src="{{asset($product->image)}}" alt="">--}}
                                <img class="card-img-top" src="https://pimpamacitycentre.com.au/wp-content/uploads/2018/09/web-slider.jpg" alt="">
                                <div class="card-body">
                                    <h4 class="card-title text-center">
                                        <a href="#" style="font-size: 17px"><b>{{$product->name}}</b></a>
                                    </h4>
                                    <p class="card-text text-center">{{Str::limit($product->description,80)}}</p>
                                    <p class=" card-text text-center">Price : ${{$product->price}}</p>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="{{route('home.show',$product->id)}}" class="btn btn-sm btn-outline-primary col-4">عرض</a>
                                    <a href="{{route('home.add.cart',$product->id)}}" class="btn btn-sm btn-outline-success col-4">شراء</a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div align="center"><a class="btn btn-outline-success" href="{{route('home.category',$cat->slug)}}">Display More</a></div>
            </div>
        </section>
    @endforeach

    <div class="jumbotron">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

            <br>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        @foreach($products as $product)
{{--                            <div class="col-4"></div>--}}
                            <div class="col-md-3">
                                <div class="card mb-4 shadow-sm">
{{--                                    <img class="card-img-top" src="{{asset($product->image)}}" height="200"width="100%" alt="">--}}
                                    <img class="card-img-top" height="200"width="100%" src="https://www.beautyandfashionfreaks.com/wp-content/uploads/2018/08/Top-affordable-beauty-products-on-Amazon-US-beauty-and-fashion-freaks-1110x530.jpg" alt="">
                                    <div class="card-body">
                                        <p><b>{{$product->name}}</b></p>
                                        <p class="card-text">
                                            {!! Str::limit($product->description,17) !!}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-success">View</button>&nbsp;
                                                <button type="button" class="btn btn-sm btn-outline-primary">Buy</button>
                                            </div>
                                            <small class="text-muted">${{$product->price}}</small>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-3">
                                <div class="card mb-4 shadow-sm">
{{--                                    <img class="card-img-top" src="{{asset($product->image)}}" height="200"width="100%" alt="">--}}
                                    <img class="card-img-top" src="https://cdn.myimaginestore.com/media/catalog/product/cache/7/image/745x/602f0fa2c1f0d1ba5e241f914e856ff9/i/p/iphone-12-2020.jpg" height="200"width="100%" alt="">

                                    <div class="card-body">
                                   <p><b>{{$product->name}}</b></p>
                                   <p class="card-text">
                                       {!! Str::limit($product->description,17) !!}
                                   </p>
                                   <div class="d-flex justify-content-between align-items-center">
                                       <div class="btn-group">
                                           <button type="button" class="btn btn-sm btn-outline-success">View</button>&nbsp;
                                           <a href="{{route('home.add.cart',[$product->id])}}" class="btn btn-sm btn-outline-primary">Buy</a>
                                       </div>
                                       <small class="text-muted">${{$product->price}}</small>

                                   </div>
                               </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>

@stop
{{--@notifyCss--}}
{{--<x:notify-messages />--}}
{{--@notifyJs--}}
