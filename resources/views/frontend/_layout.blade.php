<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shopping System</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

    <!-- Custom styles for this template -->
    <link href="{{asset('frontend/css/modern-business.css')}}" rel="stylesheet">

</head>

<body>
<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    @notifyCss
    <x:notify-messages />
    @notifyJs
    <div class="container">
        <a class="navbar-brand " href="{{route('home.index')}}" style="font-family: 'Courier New', Courier, monospace"><b>Shopping</b></a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{route('home.show.cart')}}">
                        <span class="nav-link fas fa-shopping-cart">({{session()->has('cart')?session()->get('cart')->totalQty:'0'}})</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.index')}}">الرئيسية</a>
                </li>

{{--                @foreach($categories->take(3) as $category)--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{route('home.category',$category->id)}}">{{$category->name}} News</a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       التصنيفات
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach($categories as $category)
                        <a class="dropdown-item" href="{{route('home.category',$category->slug)}}">{{$category->name}}</a>
                        @endforeach
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">أتصل بنا</a>
                </li>


            </ul>
        </div>

        @guest()
            <a class="navbar-brand ml-auto" href="{{route('login')}}">Sign In</a>
        @else
            <li style="list-style: none;color: white" class="nav-item dropdown">
                <a  class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{auth()->user()->name}}&nbsp;{{auth()->user()->lastName}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard</a>
                    <a class="dropdown-item" href="{{route('logout')}}">Sign Out</a>
                </div>
            </li>

        @endguest

    </div>
</nav>

<header>
    @yield('header')
</header>

<!-- Page Content -->
@yield('content')

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Shopping System</p>
        <p class="m-0 text-center text-white">Phone : 453833571</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
