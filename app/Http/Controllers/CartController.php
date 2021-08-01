<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Product;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addCart($id){
        $product = Product::whereId($id)->first();
        if (\session()->has('cart')){
            $cart = new Cart(\session()->get('cart'));
        }else{
            $cart = new Cart();
        }
        $cart->add($product);
//        dd($cart);
        \session()->put('cart',$cart);
        notify()->success('!تم أضافة السلعة بنجاح');
        return redirect()->back();
    }

    public function showCart(){
        if (\session()->has('cart')){
            $cart = new Cart(\session()->get('cart'));
        }else{
            $cart = null;
            notify()->warning('!لا يوجد عناصر لعرضها');
            return redirect()->back();
        }

        return view('frontend.cart',compact('cart'));
    }

    public function UpdateCart(Request $request , Product $product){

        $request->validate([
            'qty' => 'required|min:1|numeric'
        ]);
        $cart = new Cart(session()->get('cart'));
        $cart->updateQty($product->id,$request->qty);
        session()->put('cart',$cart);
        notify()->success('!تم تعديل الكمية بنجاح');
        return redirect()->back();
    }

    public function RemoveCart(Product $product){
        $cart = new Cart(session()->get('cart'));
        $cart->remove($product->id);
        if ($cart->totalQty <=0 ){
            session()->forget('cart');
        }else{
            session()->put('cart',$cart);
        }
        notify()->success('!تم حذف السلعة بنجاح');
        return redirect('/');
    }

    public function checkout($amount){
        if (\session()->has('cart')){
            $cart = new Cart(\session()->get('cart'));
        }else{
            $cart = null;
        }
        return view('frontend.checkout',compact('amount','cart'));
    }

    public function charge(Request $request){
        $charge = Stripe::charges()->create([
           'currency' => "USD",
           'source'   => $request->stripeToken,
           'amount'   => $request->amount,
            'description'=>'Test'
        ]);

        $chargeId = $charge['id'];
        if ($chargeId){
            auth()->user()->orders()->create([
               'cart' => serialize(session()->get('cart'))
            ]);
            session()->forget('cart');
            notify()->success('!تم حذف السلعة بنجاح');
            return redirect('/');
        }
    }
}
