@extends('Admin.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Category Add</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<h1 class="btn-success">
	{{Session::get('msg')}}
	</h1>
  <hr>
  <h2><u>Category Add Form</u></h2>
  {{ Form::open(['url' => '/save-category', 'method'=>'POST', 'class'=>'form-group']) }}
    <div class="form-group">
      <label for="categoryName">Category Name:</label>
      <input type="text" class="form-control" id="categoryName" placeholder="Category Name" name="categoryName" required="categoryName">
    </div>
	<div class="form-group">
      <label for="categoryDescription">Category Description:</label>
      <textarea class="form-control" id="categoryDescription" placeholder="Description" name="categoryDescription" required="categoryDescription"></textarea>
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