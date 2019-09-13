@extends('Admin.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Manage Category</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Database Category Show</h2>
  <table class="table table-hover">
    <thead>
      <tr class="danger">
        <th>Id</th>
        <th>Category Name</th>
        <th>Category Description</th>
        <th>Category Status</th>
        <th>Active</th>
      </tr>
    </thead>
    <tbody>
	@foreach($alldata as $data)
      <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->categoryName}}</td>
        <td>{{$data->categoryDescription}}</td>
        <td>{{$data->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
		<td>
		<a href="{{url('/edit-category/'.$data->id)}}">Edit </a>
			|
		<a href="{{url('/delete-category/'.$data->id)}}">Delete</a>
		</td>
      </tr>
	  @endforeach
    </tbody>
  </table>
</div>
{{ $alldata->links() }}
</body>
</html>
@endsection