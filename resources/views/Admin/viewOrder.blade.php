@extends('Admin.admin_layout')

@section('adminContent')

	
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Orders</a></li>
			</ul>
			<p class="alert-success">
					 <?php
					 $message=Session::get('message');
					 if($message){
					  echo $message;
					  Session::put('message',NULL);
					 }
					 ?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Order</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
						
							  <tr>
								  <th>Customer Name</th>
								  <th>Customer Mobile Number</th>
                                  <th>shipping First Name</th>
                                  <th>shipping Last Name</th>
                                  <th>shipping Address</th>
                                  <th>shipping Mobile Number</th>
                                  <th>Shipping Email</th>
								  <th>Order ID</th>
								  <th>Product Name</th>
                                  <th>Product Price</th>
                                  <th>Product Sales Quantity</th>
                               
							  </tr>
						  </thead>   
						
						  <tbody>
                          @foreach($view_order as $v_order)
							<tr>
                           
								<td>{{ $v_order->customer_name}}</td>
								<td class="center">{{ $v_order->mobile_number}}</td>
								<td class="center">{{ $v_order->shipping_first_name}}</td>
                                <td class="center">{{ $v_order->shipping_last_name}}</td>
                                <td class="center">{{ $v_order->shipping_address}}</td>
                                <td class="center">{{ $v_order->shipping_mobile_number}}</td>
                                <td class="center">{{ $v_order->shipping_email}}</td>
                              
                                <td class="center">{{ $v_order->order_id}}</td>
                                <td class="center">{{ $v_order->product_name}}</td>
                                <td class="center">{{ $v_order->product_price}}</td>
                                <td class="center">{{ $v_order->product_sales_quantity}}</td>
                                @endforeach

								
							</tr>
							
						  </tbody>
						 
					  </table>            
					</div>
				</div>
			
			</div>

		
@endsection