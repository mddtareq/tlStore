@extends('layouts.app')
@section('title')
Services
@endsection
@section('content')
<h1>Product Id : {{$product->id}}</h1>
<div class="card">
    <h4>{{$product->product_name}}</h4>
    <h4>{{$product->product_price}}</h4>
    <h4>{{$product->product_description}}</h4>
</div>
@endsection