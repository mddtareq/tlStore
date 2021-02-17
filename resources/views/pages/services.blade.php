@extends('layouts.app')
@section('title')
Services
@endsection
@section('content')
<h1>Welcome To Services</h1>
@if (Session::has('success'))
<div id='cus-alt' class="alert alert-success">
    {{-- {{Session::get('success')}} --}}
    {{session()->get('success')}}
    {{-- {{Session::put('success',null)}} --}}
    {{session()->put('success',null)}}
</div>
<script>
    setTimeout(function(){
            document.getElementById('cus-alt').style.display='none';
        }, 3000);
</script>
@endif
@foreach ($products as $product)
<div class="card">
    <h4><a href="show/{{ $product->id}}">{{$product->product_name}}</a></h4>
    <h4>{{$product->product_price}}</h4>
    <h4>{{$product->product_description}}</h4>
</div>
@endforeach
{{$products->links()}}
@endsection