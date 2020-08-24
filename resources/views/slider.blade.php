<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						
							 
						<?php
								$slider=DB:: table('slider')->where('publication_status',1)->get();
								
						?>
                     @foreach( $slider as $row )
            <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                    @endforeach
					</ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    @foreach( $slider as $row )
                        <div class="item {{ $loop->first ? ' active' : '' }}" >
                            <img src="{{ $row->slider_image }}"  style="width:100%; height:400px; min-height:400px; line-height:400px;">
                        </div>
                    @endforeach
                </div>
							
							
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->