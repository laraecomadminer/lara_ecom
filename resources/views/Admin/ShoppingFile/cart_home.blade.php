@extends('Admin.master')
@section('content')
  <!--cart-->
	<link href="{{asset('Admin/cartimg/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('Admin/cartimg/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('Admin/cartimg/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('Admin/cartimg/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('Admin/cartimg/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('Admin/cartimg/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('Admin/cartimg/css/responsive.css')}}" rel="stylesheet">
  <!--Endcart-->
<section>
<div class="container">
<div class="row">
<div class="col-sm-9 padding-right">
<div class="category-tab"><!--category-tab-->
<div class="tab-content">
<div class="tab-pane fade active in" id="tshirt" >
  @foreach($products as $product)
	<div class="col-sm-3">
	<div class="product-image-wrapper">
		<div class="single-products">
		<div class="productinfo text-center">
		<img src="{{asset($product->productPicture)}}" width="100">
			<h2>{{$product->productName}}</h2>
			<p>{{ $product->productPrice }} Tk.</p>
			{{Form::open(['url'=>'/cart-add', 'method'=>'POST'])}}
				<input type="hidden" name="productId" value="{{$product->id}}">
				<input type="hidden" name="qty" value="1">
				<button type="submit" class="btn btn-default add-to-cart">Add To Cart</button>
			{{Form::close()}}
		</div>
		</div>
	</div>
	</div>
	@endforeach
</div>
</div>
</div><!--/category-tab-->
</div>
</div>
<a href="{{url('/cart-show')}}">Back-to-Manage</a>
</div>
</section>
	<!---cart--->
	<script src="{{asset('Admin/cartimg/js/jquery.js')}}"></script>
	<script src="{{asset('Admin/cartimg/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('Admin/cartimg/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('Admin/cartimg/js/price-range.js')}}"></script>
    <script src="{{asset('Admin/cartimg/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('Admin/cartimg/js/main.js')}}"></script>
  <!---Endcart--->
  
  <br><br><br><br><br><br>
@endsection