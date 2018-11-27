@extends('layouts.app')

@section('content')

    <a href="/admin" class="btn btn-primary" role="button"> <-- </a>
    
    <hr>

    <h3> Add Book </h3>

    <form action="/admin/addBook" method="POST">
        <div class="form-group">
            <label> Name: </label>
            <input type="text" name="name"> 
        </div>

        <div class="form-group">
            <label> Author: </label>
            <input type="text" name="author">
        </div>

        {{csrf_field()}}  
        <button type="submit" class="btn btn-primary"> Add </button>  
    </form>

    <hr><hr>

    @foreach($books as $book)
        <div>               

            <form action="/admin/add/{{$book->id}}" method="POST">
                {{$book->name}} / {{$book->author}} /
                Price <input type="text" name="price" size='2'>€
                {{csrf_field()}}  
                <button type="submit" class="btn btn-default"> Add </button>  
            </form>               
        </div>

        <ul style="list-style-type:none">
        @foreach($book->bookinstances as $i)

            @if($i->sold == false)
                <li> {{$i->price}}€ <a href="/admin/delete/{{$i->id}}"> x </a> </li>
            @else
                <li> <strike> {{$i->price}} </strike> sold </li>
            @endif

         @endforeach
        </ul>

        <hr>

    @endforeach

@endsection