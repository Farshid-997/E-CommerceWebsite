@extends('Admin.admin_layout')

@section('adminContent')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Forms</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Elements</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>

					<p class="alert-success">
					 <?php
					 $message=Session::get('message');
					 if($message){
					  echo $message;
					  Session::put('message',NULL);
					 }
					 ?>
					</p>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('Update-product/'.$product->product_id)}}" method="post" enctype="multipart/form-data">
                           
                               @csrf

						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_name" value="{{$product->product_name}}">
							  </div>
							</div>

                            <div class="control-group">
							  <label class="control-label" for="date01">Product Category</label>

							  <div class="controls">
                             
								<input type="text" class="input-xlarge" name="category_name" value="{{$product->category_name}}">
                              
							  </div>
							</div>

                            <div class="control-group">
							  <label class="control-label" for="date01">Manufacture Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="manufacture_name" value="{{$product->manufacture_name}}">
							  </div>
							</div>

                            <div class="control-group">
							  <label class="control-label" for="date01">Product Short Descrption</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_short_description" value="{{$product->product_short_description}}">
							  </div>
							</div>


                            <div class="control-group">
							  <label class="control-label" for="date01">Product Long Descrption</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_long_description" value="{{$product->product_long_description}}">
							  </div>
							</div>


                            <div class="control-group">
							  <label class="control-label" for="date01">Product Price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_price" value="{{$product->product_price}}">
							  </div>
							</div>


                            <div class="control-group">
							  <label class="control-label" for="date01">Product Image</label>
							  <div class="controls">
                              <input type="file" class="input-file uniform_on"  id="fileInput" name="product_image"> <br>
                              Old Image:<img src="{{URL::to($product->product_image)}}" style="height:60px; width:100px;"> <br>
							<input type="file" class="input-file uniform_on" id="fileInput" name="old_product_image" value="{{$product->product_image}}">
							  </div>
							</div>


                            <div class="control-group">
							  <label class="control-label" for="date01">Product Size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_size" value="{{$product->product_size}}">
							  </div>
							</div>


                            <div class="control-group">
							  <label class="control-label" for="date01">Product Color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_color" value="{{$product->product_color}}">
							  </div>
							</div>


                           <div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

            </div><!--/row-->
            @endsection
