@extends('Admin.master')
@section('content')
<div class="container">
<h2>Your Shopping Product</h2>
	{{ Session::get('msg') }}
	{{ Session::get('Msg') }}
	
  <table class="table table-hover table-dark">
    <thead>
      <tr align="center">
        <th>Sl</th>
        <th>Id</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Product Quantity</th>
        <th>SubTotal</th>
        <th>Action</th>
      </tr>
    </thead>
  <tbody>
	<?php $i = 0; $total = 0; ?>
	@foreach($cartProducts as $cartProduct)
	
      <tr align="center">
         <td>{{++$i}}</td>
         <td>{{$cartProduct->id}}</td>
         <td>{{$cartProduct->name}}</td>
         <td>{{$cartProduct->price}}</td>
         <td>
			{{Form::open(['url'=>'/update-cart', 'method'=>'POST'])}}
				<input type="number" value="{{$cartProduct->qty}}" min="1" name="qty" >
				<input type="hidden" value="{{$cartProduct->rowId}}" name="rowId">
				<input type="submit" value="update">
			{{Form::close()}}
		</td>
		 <?php 
			$subTotal = $cartProduct->qty*$cartProduct->price; 
		 ?>
         <td>{{$subTotal}}Tk.</td>
         <td><a href="{{url('/delete-cart/'.$cartProduct->rowId)}}">Delete</a></td>
      </tr>
	  
	  <?php $total = $total+$subTotal; ?>
	  @endforeach
	  <tr align="center">
		  <td colspan="4"></td>
		  <td>Total Price:</td>
		  <td>{{$total}}Tk.</td>
	  </tr>
    </tbody>
  </table>
<a href="{{url('/cart')}}">Back-to-Cart</a>
</div>
<br><br><br><br><br>

@endsection