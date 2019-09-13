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
  <h2><u>EDit Category Form</u></h2>
  {{ Form::open(['url' => '/update-category', 'method'=>'POST', 'name'=>'editForm']) }}
    <div class="form-group">
      <label for="categoryName">Category Name:</label>
      <input type="text" class="form-control" id="categoryName" placeholder="Category Name" name="categoryName" value="{{ $editdata->categoryName }}">
    </div>
	<div class="form-group">
      <label for="categoryDescription">Category Description:</label>
      <textarea class="form-control" id="categoryDescription" placeholder="Description" name= "categoryDescription"> {{ $editdata->categoryDescription }}
	  </textarea>
    </div>
    <div class="form-group">
      <label for="publicationStatus">Publication Status:</label>
      <select class="form-control" id="publicationStatus" name="publicationStatus">
	  <option>Select Status</option>
	  <option value="1">Published</option>
	  <option value="0">Unpublished</option>
	  </select>
    </div>
	
    <input type="hidden" name="editdata" value="{{ $editdata->id }}">
    <button type="submit" class="btn btn-success">Submit</button>
  {{ Form::close() }}
		<script>
			document.forms['editForm'].elements['publicationStatus'].value="{{ $editdata->publicationStatus }}"
		</script>
  
</div>
</body>
</html>
@endsection




