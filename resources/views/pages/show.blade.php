@extends('layouts.app')
@section('title')
Services
@endsection
@section('content')
<h1>Product Id : {{$product->id}}</h1>
<div class="">
    <h4>{{$product->product_name}}</h4>
    <h4>{{$product->product_price}}</h4>
    <h4>{{$product->product_description}}</h4>
    <hr>
    <a href="/edit/{{$product->id}}" class="btn btn-info">Edit</a>
    <a href="/delete/{{$product->id}}" class="btn btn-danger">Delete</a>
</div>
@endsection