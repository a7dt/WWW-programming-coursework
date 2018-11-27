@extends('layouts.app')

@section('content')

    <a href="/" class="btn btn-primary" role="button"> <-- </a>

    <hr>

    <h2> Edit </h2>
    @include('form_views.user_edit_form')

    <hr>
    <br>
    <hr>

    <a href="/myPurchases" class="btn btn-primary" role="button"> My purchases </a>

    <hr>

    <a href="/closeAccount" class="btn btn-danger" role="button"> Close Account </a>

@endsection