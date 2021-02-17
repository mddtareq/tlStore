@extends('layouts.app')
@section('title')
Home
@endsection
@section('content')
<form action="{{url('/createProduct')}}" method="POST">
    {{ csrf_field() }}
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{-- {{Session::get('success')}} --}}
        {{session()->get('success')}}
        {{-- {{Session::put('success',null)}} --}}
        {{session()->put('success',null)}}
    </div>
    @endif
    <div class="form-group">
        <label for="product_name">Product Name</label>
        <input type="text" id="product_name" name="product_name" placeholder="Product Name" required>
    </div>
    <br>
    <div class="form-group">
        <label for="product_price">Product Price</label>
        <input type="number" id="product_price" name="product_price" min="1" placeholder="Product Price" required>
    </div>
    <br>
    <div class="form-group">
        <label for="product_description">Product Description</label>
        <input type="text" id="product_description" name="product_description" placeholder="Product description"
            required>
    </div>
    <br>
    <input type="submit" value="Add Product" class="btn btn-primary">
</form>
@endsection