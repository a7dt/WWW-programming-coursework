{!! Form::open(['action' => 'BooksController@searchBooks', 'method' => 'POST']) !!}

    {{Form::label('searchstr', 'Search term')}}
    {{Form::text('searchstr', '')}}

    {{Form::label('', 'from: ')}}
    {{Form::select('search_from', ['author', 'name'])}}

    <nobr>

    {{Form::submit('Search', ['class'=>'btn btn-primary'])}}
    
{!! Form::close() !!}