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
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Product Elements</h2>
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
						<form class="form-horizontal" action="{{url('saveProduct')}}" method="post" enctype="multipart/form-data">
                            @csrf
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_name" required="">
							  </div>
                            </div>
                            <?php
								$publish_category_product=DB:: table('category')->where('publication_status',1)->get();
								
								?>
                            <div class="control-group">
								<label class="control-label" for="selectError3">Product Category</label>
								<div class="controls">
								  <select id="selectError3" name="category_id">
                                      <option>Select Category</option>
                                  @foreach($publish_category_product as $rows)
									<option value="{{$rows->id}}">{{$rows->category_name}}</option>
									@endforeach
								  </select>
								</div>
                              </div>

                              <?php
								$publish_manufacture_product=DB::table('manufacture')->where('publication_status',1)->get();
								
								?>
                              <div class="control-group">
								<label class="control-label" for="selectError3">Manufacture Name</label>
								<div class="controls">
								  <select id="selectError3" name="manufacture_id">
                                  <option>Select Manufacture</option>

                                   @foreach($publish_manufacture_product as $row)
									<option value="{{$row->manufacture_id}}">{{$row->manufacture_name}}</option>
									@endforeach
								  </select>
								</div>
							  </div>

							         
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Short Descrption</label>
							  <div class="controls">
								<textarea class="cleditor"  name="product_short_description"  rows="3" required=""></textarea>
							  </div>
                            </div>

                            <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Descrption</label>
							  <div class="controls">
								<textarea class="cleditor"  name="product_long_description"  rows="3" required=""></textarea>
							  </div>
                            </div>

                            <div class="control-group">
							  <label class="control-label" for="date01">Product Price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_price" required="">
							  </div>
                            </div>

                            <div class="control-group">
							  <label class="control-label" for="fileInput">Product Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
							  </div>
                            </div>    
                            
                            <div class="control-group">
							  <label class="control-label" for="date01">Product Size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_size" >
							  </div>
                            </div>

                            <div class="control-group">
							  <label class="control-label" for="date01">Product Color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_color" required="">
							  </div>
                            </div>
                            
                            <div class="control-group hidden-phone">
							
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value="1" >
							  </div>
                            </div>
                            

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

            </div><!--/row-->
            @endsection
