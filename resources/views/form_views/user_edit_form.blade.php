{!! Form::open(['action' => ['UserController@confirmEdit', $info->id], 'method' => 'POST']) !!}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', $info->name)}}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', $info->email)}}
    </div>

    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Update', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}