@extends('layouts.app')

@section('content')

<a href="/user_index" class="btn btn-primary" role="button"> <-- </a>

<table class="table">

  <thead class="thead-light">
    <th> date </th>
    <th> name </th>
    <th> author </th>
    <th> price </th>
  </thead>

  <tbody>
    @foreach($res as $one)
      <tr>
        <td> {{$one->order_date}} </td>
        <td> {{$one->name}} </td>
        <td> {{$one->author}} </td>
        <td> {{$one->price}}€ </td>
      </tr>
    @endforeach

  </tbody>

</table>
@endsection