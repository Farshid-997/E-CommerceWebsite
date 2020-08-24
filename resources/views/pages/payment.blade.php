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
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Payment method</li>
			</ol>
		</div>
		<div class="paymentCont col-sm-8">
					<div class="headingWrap">
							<h3 class="headingTop text-center">Select Your Payment Method</h3>	
							<p class="text-center">Created with bootsrap button and using radio button</p>
					</div>
                    <form action="{{url('orderPlace')}}" method="post">

                    @csrf
					<div class="paymentWrap">
						<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
				            <label class="btn paymentMethod active">
				            	<div class="method visa"></div>
				                <input type="radio" name="payment_gateway" value="visa" > 
				            </label>
				            <label class="btn paymentMethod">
				            	<div class="method master-card"></div>
				                <input type="radio" name="payment_gateway" value="mastercard"> 
				            </label>
				            <label class="btn paymentMethod">
			            		<div class="method amex"></div>
				                <input type="radio" name="payment_gateway" value="amex">
				            </label>
				       <label class="btn paymentMethod">
			             		<div class="method vishwa"></div>
				                <input type="radio" name="payment_gateway" value="DebitCard"> 
				            </label>
				         
				          </div>
                          </div>
                  <input type="submit" value="Done" class="btn btn-success pull-left btn-fyi">
					
                    </form>
				</div>
	</div>
</section><!--/#do_action-->


@endsection