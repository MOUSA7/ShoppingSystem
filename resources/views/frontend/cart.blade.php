@extends('frontend._layout')

@section('content')

    <div class="container">

        <br><br><br>
        @if($errors->any())
            @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
            @endforeach
            @endif
        @if($cart)
        <table class="table text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
                <th scope="col">remove</th>

            </tr>
            </thead>
            <tbody>
            @foreach($cart->items as $key=>$product)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$product['name']}}</td>
                <td>
                    <img src="{{asset($product['image'])}}" height="60" width="70" alt="">
                </td>
                <td>${{$product['price']}}</td>
                <td>
                    <form action="{{route('home.update.cart',$product['id'])}}" method="post">
                        @csrf
                        <input type="text" value="{{$product['qty']}}" class="col-3"  placeholder="Quantity" name="qty">
                        &nbsp;
                        <button type="submit" class="btn btn-secondary btn-sm">
                            <i class="fas fa-sync">&nbsp;Update</i>
                        </button>
                    </form>
                </td>
                <td>
                    <form action="{{route('home.remove.cart',$product['id'])}}" method="post">
                        @csrf
                        <button class="btn btn-danger btn-sm">
                            Remove
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <h3 class="text-center"><b>Not Found Any Cart</b></h3>
        @endif
    </div>

    <hr>
    <br>
    <br>
    <div class="card-footer ">
        <button class="btn btn-primary float-right">Continue Shopping</button>
        <span style="margin-left: 300px" class="text-center">${{$cart->totalPrice ?? 'Empty'}} : Total Price</span>
        <a href="{{route('home.checkout',$cart->totalPrice)}}" class="btn btn-info float-left">CheckOut</a>
    </div>
    <br>
    <br>
    <br>
    <br>
@stop
