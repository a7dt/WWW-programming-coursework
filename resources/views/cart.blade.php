@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col">

            <div class="card">
                <div class="card-body">

                    @foreach($inCart as $one)

                        <p> 
                            {{$one->book->name}}
                            {{$one->price}}€
                            <a href="/delete/{{$one->id}}" > X </a>                           
                        </p>

                    @endforeach

                    <p> ------------------------- </p>
                    <p> Total price : {{$totalPrice}}€ </p>

                    <a href="/"> Back </a>

                    @if(session()->get('cart'))
                        <div class = "float-right">
                            <a href="/confirmOrder"> Confirm </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>

        <div class="col">
        </div>
    </div>

@endsection