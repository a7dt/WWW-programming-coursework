@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col">

        <div style="margin-bottom: 40px">
             @include('form_views.search')
            <a href="/"> Reset search </a>
        </div>


        @foreach($books as $book)
                     
            <p> {{$book->name}} / {{$book->author}} </p>

            <ul style="list-style-type: none">
                @foreach($book->bookinstances as $inst)

                    @guest
                        @if($inst->sold == false)
                           <li> {{$inst->price}}€  </li>
                        @endif
                    @else
                        @if((!in_array($inst->id, (session('cart') ? session('cart') : []))) && ($inst->sold == false))
                            <li> {{$inst->price}}€ 
                                <a href="/add/{{$inst->id}}"> 
                                    to cart
                                </a> 
                            </li>
                        @endif
                    @endguest

                @endforeach
            </ul>

            <hr>

        @endforeach

    </div>

    <div class="col">

        @if(!Auth::guest())

            <a href="/showCart" class="btn btn-primary" role="button"> 
                Cart 
                <?php 
                    if(session()->get('cart')) {
                        echo '(' . count(session()->get('cart')) . ')';
                    } 
                ?> 
            </a>
    
            <a href="/user_index" class="btn btn-primary" role="button"> My info </a>

        @endif
    </div>

</div>


@endsection
