@extends('Admin.master')
@section('content')
<h1>Product Details</h1>
<img src="{{ asset($product->productPicture) }}" width="300"> <br><br>

<table>
	<tr>
		<td><b>Product Name</td><td>:</td><td></b>{{ $product->productName }}</td>
	</tr>
	<tr>
		<td><b>Product Price</td><td>:</td><td></b>{{ $product->productPrice }}</td>
	</tr>
	<tr>
		<td><b>Product Quantity</td><td>:</td><td></b>{{ $product->productQuantity }}</td>
	</tr>
	<tr>
		<td><b>Product Description</td><td>:</td><td></b>{{ $product->productDescription }}</td>
	</tr>
</table>
<br>

<a href="{{url('/manage-product')}}">Back-to-Manage</a>

<br>
<br>
<br>

@endsection