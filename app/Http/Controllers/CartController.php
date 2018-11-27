<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookinstance;

class CartController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Creates a session variable (array) called cart and adds instance to it
     */
    public function addToCart(Request $request, $id) {

        // If session has not cart variable, it must be created first
        if(!$request->session()->has('cart')) {
            $request->session()->put('cart', []);
            $request->session()->push('cart', $id);
            return redirect('/');
        }

        $request->session()->push('cart', $id);

        return redirect('/');
    }

    /**
     * Counts total price of the cart and shows books that are in cart
     */
    public function showCart(Request $request) {

        if(!$request->session()->get('cart')) {
            return redirect('/')->with('error', "Cart is empty");
        }

        $inCart = Bookinstance::find( $request->session()->get('cart') );

        $totalPrice = 0;

        foreach($inCart as $one) {
            $totalPrice += $one->price;
        }

        $data = array('inCart'=>$inCart, 'totalPrice'=>$totalPrice);

        return view('cart')->with($data);

    }


    /**
     * Deletes book instance id from cart
     */
    public function deleteFromCart(Request $request, $id) {

        $arr = $request->session()->get('cart');

        if (($key = array_search($id, $arr)) !== false) {
            unset($arr[$key]);
        }

        $request->session()->put('cart', $arr);

        $inCart = Bookinstance::find( $request->session()->get('cart') );

        $totalPrice = 0;

        foreach($inCart as $one) {
            $totalPrice += $one->price;
        }

        $data = array('inCart'=>$inCart, 'totalPrice'=>$totalPrice);

        return view('cart')->with($data);
    }
}
