@extends('layouts.app')

@section('content')

    <div>
        <a href="/admin" class="btn btn-primary" role="button"> <-- </a>
        // Admin: Can access admin pages // Active: If disabled, user cannot login
    </div>

    <hr>

    @foreach($users as $user)

        <p> <strong> {{$user->email}} </strong> </p>

        <form action="/admin/updateRole/{{$user->id}}" method="POST">

            <div>
                <input type="checkbox" 
                    {{$user->isAdmin() ? 'checked': ''}} 
                    name="isAdmin"
                >
                <label for="isAdmin"> Admin </label>
            </div>

            <div>
                <input type="checkbox" 
                    {{$user->status ? 'checked' : ''}}
                    name="isActive"
                >
                <label for="isActive"> Active </label>
            </div>

            {{csrf_field()}}

            <button type="submit" class="btn btn-primary"> Apply </button> 

        </form>

        <br>
        <hr>

    @endforeach

@endsection