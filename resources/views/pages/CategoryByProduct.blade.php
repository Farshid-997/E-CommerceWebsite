@extends('welcome')

@section('home_content')
<h2 class="title text-center">Features Items</h2>
                 @foreach($products as $row)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
										
											<img src="{{URL::to($row->product_image)}}" style="height:200px;" alt="" />
											<h2>{{$row->product_price}}Tk</h2>
											<p>{{$row->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>{{$row->product_price}}Tk</h2>
												<p>{{$row->product_name}}</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Product details</a></li>
									</ul>
								
								</div>
							</div>
						</div>
						@endforeach
								
				
				</div>
@endsection