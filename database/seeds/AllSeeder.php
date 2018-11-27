<?php

use Illuminate\Database\Seeder;
use App\Book;
use App\Bookinstance;
use App\Role;
use App\User;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = new Book();
        $book->author = 'Madeleine Brent';
        $book->name = 'Elektran tytar';
        $book->save();

        $book1 = new Book();
        $book1->author = 'Mika Waltari';
        $book1->name = 'Turms kuolematon';
        $book1->save();


        $book2 = new Book();
        $book2->author = 'Shelton Gilbert';
        $book2->name = 'Friikkilan pojat Mexicossa';
        $book2->save();


        $inst = new Bookinstance();
        $inst->sold = false;
        $inst->price = 10;
        $inst->book_id = $book->id;
        $inst->save();

        $inst1 = new Bookinstance();
        $inst1->sold = false;
        $inst1->price = 15;
        $inst1->book_id = $book->id;
        $inst1->save();

        $inst2 = new Bookinstance();
        $inst2->sold = false;
        $inst2->price = 30;
        $inst2->book_id = $book1->id;
        $inst2->save();

        $inst3 = new Bookinstance();
        $inst3->sold = false;
        $inst3->price = 20;
        $inst3->book_id = $book2->id;
        $inst3->save();

        $role = new Role();
        $role->name="admin";
        $role->save();

        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = "Admin";
        $user->email = "a@a.a";
        $user->password = bcrypt('admin');
        $user->save();
        $user->roles()->attach($role_admin);


    }
}
