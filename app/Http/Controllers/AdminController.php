<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Book;
use App\Bookinstance;

class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }


    /**
     * Returns admin index page
     */
    public function index() {
        return view('admin.admin_index');
    }

    /**
     * Returns page where user roles can be modified
     */
    public function usercontrol() {
        $users = User::all();
        return view('admin.user_control')->with('users', $users);
    }

    /**
     * Updates user roles and returns back to index page with message
     */
    public function updateRole(Request $request, $id) {

        $user = User::find($id);
        
        if(!$request->input('isActive')) {
            $user->status = '0';
            $user->save();
        }
        else {
            $user->status = '1';
            $user->save();
        }

        if(!$request->input('isAdmin')) {
            $user->roles()->detach(Role::where('name', 'admin')->first());
            $user->save();
        }
        else {
            $role_admin = Role::where('name', 'admin')->first();
            $user->roles()->attach($role_admin);
            $user->save();
        }

        return redirect('/')->with('success', 'Roles updated');
    }

    /**
     * Shows page where book information can be modified
     */
    public function bookcontrol() {

        $books = Book::all();

        return view('admin.book_control')->with('books', $books);
    }

    /**
     * Adds new book instance to a book
     */
    public function addInstance(Request $request, $id) {

        $this->validate($request, [
            'price' => 'required|numeric|min:0|max:9999.99',
        ]);

        $inst = new Bookinstance;
        $inst->price = $request->input('price');
        $inst->sold = '0';
        $inst->book_id = $id;
        $inst->save();

        return redirect('/admin/book_control');
    }

    /**
     * Deletes book instance
     */
    public function deleteInstance($id) {

        $inst = Bookinstance::find($id);
        $inst->delete();
        return redirect('/admin/book_control');
    }

    /**
     * Adds new book
     */
    public function addBook(Request $request) {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        $book = new Book;
        $book->name = htmlspecialchars($request->input('name'), ENT_QUOTES, "utf-8");
        $book->author = htmlspecialchars($request->input('author'), ENT_QUOTES, "utf-8");
        $book->save();

        return redirect('admin/book_control');
    }
}
