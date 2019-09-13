@extends('Admin.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Database Product Show</h2>
  
  <h3>{{Session::get('msg')}}</h3>
  
  <table class="table table-hover table-bordered">
    <thead>
      <tr class="success">
        <th>Sl</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Picture</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
		<?php
			$i=0;
		?>
	@foreach($products as $product)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{$product->productName}}</td>
        <td>{{$product->categoryName}}</td>
        <td>{{$product->productPrice}}</td>
        <td>{{$product->productQuantity}}</td>
        <td><img src="{{asset($product->productPicture)}}" width="80"></td>
        <td>{{$product->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
		<td><a href="{{ url('/view-product/'.$product->id) }}">View </a>
			| 
		<a href="{{ url('/edit-product/'.$product->id) }}">Edit</a> 
			| 
		<a href="{{ url('/delete-product/'.$product->id) }}" onclick="return confirm('Are You Sure To Delete ?')" >Delete</a>
		</td>
	  @endforeach
    </tbody>
  </table>
</div>

</body>
</html>

<br><br><br><br><br><br>
@endsection