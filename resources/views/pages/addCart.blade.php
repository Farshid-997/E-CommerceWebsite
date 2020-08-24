@extends('welcome')

@section('home_content')
<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
                    <?php
                   $content= Cart::getcontent();
					// echo "<pre>";
					// print_r($content);
					// echo "</pre>";
					// exit();
                    ?>
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>

                    @foreach($content as $show_content)
						<tr>
							<td class="cart_product">
								<a href="#"><img src="{{URL::to($show_content->attributes->image)}}" height="80px" width="80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="#">{{$show_content->name}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{$show_content->price}}Tk</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
								<form action="{{url('UpdateCart')}}" method="post">
								@csrf
							<input class="cart_quantity_input" type="text" name="qty" value="{{$show_content->quantity}}" 
							autocomplete="off" size="2">

							<input  type="hidden" name="id" value="{{$show_content->id}}">

									<input type="submit" name="submit" value="update" class="btn btn-sm btn-default" >
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$show_content->getPriceSum()}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{url('deleteToCart/'.$show_content->id)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                        @endforeach
						
                    </tbody>
                    
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
			
				<div class="col-sm-8">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{(Cart::getSubTotal())}}</span></li>
							<li>Eco Tax <span></span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{(Cart::getTotal())}}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<?php $customer_id=Session::get('customer_id');
                                  $shipping_id=Session::get('shipping_id');

							?>
							@if($customer_id != NULL && $shipping_id==NULL ) 
							<a href="{{url('Checkout')}}" class="btn btn-default check_out"> Checkout</a>
						    @elseif($customer_id != NULL && $shipping_id  != NULL)
							<a href="{{url('payment')}}" class="btn btn-default check_out"> Checkout</a>
							@else
							<a class="btn btn-default check_out" href="{{url('loginCheck')}}">Check Out</a>
							@endif
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection