@extends('layouts.app')
@section('title')
About
@endsection
@section('content')
<h1>Welcome To About</h1>
@foreach ($tests as $test)
<div class="card">
    <h4>{{$test->name}}</h4>
</div>
@endforeach
@endsection