@extends('Admin.admin_layout')

@section('adminContent')

	
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
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
								  <th>Manufacture Id</th>
								  <th>Manufacture Name</th>
								  <th>Manufacture Description</th>
								  <th>Publication Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  @foreach($manufacture as $row)
						  <tbody>
							<tr>
								<td>{{$row->manufacture_id}}</td>
								<td class="center">{{$row->manufacture_name}}</td>
								<td class="center">{{$row->manufacture_descrition}}</td>

								@if( $row->publication_status==1)
								<td class="center">
									<span class="label label-success">Active</span>
								
								@else
								<td class="center">
									<span class="label label-danger">Inactive</span>
									@endif
								</td>
								<td class="center">
								   @if( $row->publication_status==1)
									<a class="btn btn-danger" href="{{url('UpdateinactiveManufacture/'.$row->manufacture_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-success" href="{{url('UpdateactiveManufacture/'.$row->manufacture_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									 @endif
									<a class="btn btn-info" href="{{url('Edit/manufacture/'.$row->manufacture_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" id="delete" href="{{url('Deletemanufacture/'.$row->manufacture_id)}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							
						  </tbody>
						  @endforeach
					  </table>            
					</div>
				</div>
			
			</div>

		
@endsection