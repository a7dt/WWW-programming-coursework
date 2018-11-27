<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Returns user index page with pre-filled form of user information
     */
    public function getUserInfo() {
        $info = User::find(auth()->user()->id);
        return view('user_index')->with('info', $info);
    }

    /**
     * Confirm edit
     */
    public function confirmEdit(Request $request, $id) {

        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user->name =  htmlspecialchars($request->input('name'), ENT_QUOTES, "utf-8");
        $user->email = htmlspecialchars($request->input('email'), ENT_QUOTES, "utf-8");

        $user->save();

        return redirect('/')->with('success', 'User updated');

    }

    /**
     * Shows books that the user has purchased
     */
    public function myPurchases() {

        $res = DB::table('users')
        ->join('orders', 'users.id', '=', 'orders.user_id')
        ->join('bookinstance__orders', 'orders.id', '=', 'bookinstance__orders.order_id')
        ->join('bookinstances', 'bookinstance__orders.bookinstance_id', '=', 'bookinstances.id')
        ->join ('books', 'bookinstances.book_id', '=', 'books.id')
        ->where('users.id', '=', auth()->user()->id)
        ->get();

        return view('myBooks')->with('res', $res);
    }

    /**
     * Returns view with dialog (closing account)
     */
    public function closeAccount() {
        return view('includes.confirm');
    }

    /**
     * Set user status to 0 so that he cannot log in anymore. Destroy session.
     */
    public function confirmClose(Request $request) {

        $user = User::find(auth()->user()->id);
        $user->status = '0';
        $user->save();

        $request->session()->flush();

        return redirect('/')->with('success', 'Account closed');

    }


}
