@extends('layouts.app')

@section('content')
  <script>
     if(confirm('Are you sure?')) {
         window.location.href = "/confirmClose";
     }
     else {
        window.location.href = "/user_index";
     }
  </script>
@endsection