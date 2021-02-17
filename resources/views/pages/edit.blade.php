@extends('layouts.app')
@section('title')
Home
@endsection
@section('content')
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
{{--laravelcollective--}}
{!! Form::open(['action'=>'PagesController@updateProduct','method'=>'POST'])!!}
{{ csrf_field() }}
<div class="form-group">
    {{ Form::hidden('id', $product->id)}}
    {{Form::label('','Product Name')}}
    {{Form::text('product_name',$product->product_name,['placeholder'=>'Product Name'])}}
</div>
<br>
<div class="form-group">
    {{Form::label('','Product Price')}}
    {{Form::number('product_price',$product->product_price,['placeholder'=>'Product Price','min'=>'1'])}}
</div>
<br>
<div class="form-group">
    {{Form::label('','Product Description')}}
    {{Form::text('product_description',$product->product_description,['placeholder'=>'Product Description'])}}
</div>
<br>
{{Form::submit('Update Product',['class'=>'btn btn-primary'])}}
{!!Form::close()!!}


{{-- <form action="{{url('/updateProduct')}}" method="POST">
{{ csrf_field() }}
<div class="form-group">
    <label for="product_name">Product Name</label>
    <input type="text" id="product_name" name="product_name" value="{{$product->product_name}}"
        placeholder="Product Name" required>
</div>
<br>
<div class="form-group">
    <label for="product_price">Product Price</label>
    <input type="number" id="product_price" name="product_price" value="{{$product->product_price}}" min="1"
        placeholder="Product Price" required>
</div>
<br>
<div class="form-group">
    <label for="product_description">Product Description</label>
    <input type="text" id="product_description" name="product_description" value="{{$product->product_description}}"
        placeholder="Product description" required>
</div>
<br>
<input type="submit" value="Update Product" class="btn btn-primary">
</form> --}}
@endsection