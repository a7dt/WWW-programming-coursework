<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Bookinstance;
use App\Bookinstance_Order;

class ConfirmOrder extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Saves order information to database and connects it to the currently logged in user
     */
    public function __invoke(Request $request) {

        $ord = new Order();
        $ord->order_date = date('Y-m-d');
        $ord->user_id = auth()->user()->id;
        $ord->save();

        foreach($request->session()->get('cart') as $b) {

            $ins = Bookinstance::find($b);
            $ins->sold = '1';
            $ins->save();

            $a = new Bookinstance_Order();
            $a->order_id = $ord->id;
            $a->bookinstance_id = $b;
            $a->save();
        }

        // Make cart empty
        $request->session()->put('cart', []);

        return redirect("/")->with('success', 'Purchase confirmed');
    }
}
