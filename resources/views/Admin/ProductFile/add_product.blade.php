@extends('Admin.master')
@section('content')
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
  <h2>Product Add Form</h2>
  <hr>
	<h3>{{Session::get('msg')}}</h3>
  <hr>
  
  {{ Form::open(['url' => 'save-product', 'method'=>'POST', 'enctype'=>'multipart/form-data']) }}
    <div class="form-group">
      <label for="productName">Product Name:</label>
      <input type="text" class="form-control" id="productName" placeholder="Product Name" name="productName" required="productName">
    </div>
	
	<div class="form-group">
      <label for="productCategory">Product Category</label>
      <select class="form-control" id="productCategory" name="productCategory">
			<option>Select Category</option>
			@foreach($categories as $category)
			<option value="{{$category->id}}">{{$category->categoryName}}</option>
			@endforeach
	  </select>
    </div>
	<div class="form-group">
      <label for="productPrice">Product price:</label>
      <input type="text" class="form-control" id="productPrice" placeholder="Product Price" name="productPrice" required="productName">
    </div>
	<div class="form-group">
      <label for="productQuantity	">Product Quantity:</label>
      <input type="text" class="form-control" id="productQuantity" placeholder="Product Quantity" name="productQuantity" required="productQuantity">
    </div>
	<div class="form-group">
      <label for="productDescription">Product Description:</label>
      <textarea class="form-control" id="productDescription" placeholder="Product Description" name="productDescription" required="productDescription"></textarea>
    </div>
	<div class="form-group">
      <label for="productPicture">Product Picture:</label>
      <input type="file" class="form-group" id="productPicture" placeholder="Product Picture" name="productPicture" required="productPicture">
    </div>
    <div class="form-group">
      <label for="publicationStatus">Publication Status:</label>
      <select class="form-control" id="publicationStatus" name="publicationStatus">
	  <option>Select Status</option>
	  <option value="1">Published</option>
	  <option value="0">Unpublished</option>
	  </select>
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  {{ Form::close() }}
</div>

</body>
</html>
@endsection