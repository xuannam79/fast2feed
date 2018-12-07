@extends('templates.f2f.master')
@section('title')
	Tìm kiếm
@endsection
@section('content')
	<div class="row" style="margin-top: 20px">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <a href="#" title=""><img src="/fast2feed/public/templates/f2f/images/slide/slide1.jpg" alt="" style="width: 1169px;height: 300px"></a>
			      <div class="carousel-caption">
			      </div>
			    </div>
			    <div class="item">
			      <a href="# title=""><img src="/fast2feed/public/templates/f2f/images/slide/slide2.jpg" alt="" style="width: 1169px;height: 300px"></a>
			      <div class="carousel-caption">
			      </div>
			    </div>
			    <div class="item">
			      <a href="#" title=""><img src="/fast2feed/public/templates/f2f/images/slide/slide3.jpg" alt="" style="width: 1169px;height: 300px"></a>
			      <div class="carousel-caption">
			      </div>
			    </div>
			    <div class="item">
			      <a href="#" title=""><img src="/fast2feed/public/templates/f2f/images/slide/slide4.jpg" alt="" style="width: 1169px;height: 300px"></a>
			      <div class="carousel-caption">
			      </div>
			    </div>
			    <div class="item">
			      <a href="#" title=""><img src="/fast2feed/public/templates/f2f/images/slide/slide5.jpg" alt="" style="width: 1169px;height: 300px"></a>
			      <div class="carousel-caption">
			      </div>
			    </div>
			  </div>
	
			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
		   </div>
		</div>
			<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding" style="margin-top: 15px;">
				@include('templates.f2f.leftbar')
				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 clearpaddingr">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
						<div class="panel panel-info">
						  <div class="panel-body">
						  	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
						  		<div class="alert alert-success alert-block">
									<button type="button" class="close" data-dismiss="alert">×</button>	
								    <strong>Từ khóa: <span style="color: red">{{$keySearch}},</span>
										<p style="color: red">{{ count($getSearch) }} kết quả:</p>
								    </strong>
								</div>
								@if(isset($getSearch))
						  		@foreach($getSearch as $key => $getsearch)
						  		@php
						  			$cusId = $getsearch->customer_id;
						  			$images = $getsearch->images;
						  			$customer_name = $getsearch->customer_name;
						  			$slug = str_slug($customer_name);
						  			$name = title_case($customer_name);
						  			$catalog = title_case($getsearch->catalog_name);
						  			$oldAddress = title_case($getsearch->address);
						  			$address = str_limit($oldAddress, 25);
						  			$url = route('trangCustomer',['slug' => $slug, 'cusId' => $cusId])
						  		@endphp
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 re-padding">
						  			<div class="product_item">
						  				<div class="product-image">
						  					<a href="{{ $url }}"><img src="/fast2feed/public/files/customer/{{ $images }}" alt="" class=""></a>
						  				</div>
										<a href="{{ $url }}" title="{{ $name }}">
											<p><span class='price text-right'>{{ $name }}</span></p>
										</a>
										<p style="color: gray;font-size: 13px; border-bottom: 1px solid gray">{{ $address }}</p>
										<p style="color: black;font-size: 14px;">{{ $catalog }}</p>
						  			</div>
								</div>
								@endforeach
								@endif
								<!-- <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 re-padding">
						  			<div class="product_item">
						  				<div class="product-image">
						  					<a href=""><img src="/fast2feed/public/templates/f2f/images/product/somi.png" alt="" class=""></a>
						  				</div>
										<p><span class='price text-right'>200.000 VNĐ</span> <del class="product-discount">250.000 VNĐ</del></p>
										<p><span class="glyphicon glyphicon-eye-open" aria-hidden="true" title="Số lượt xem"></span> 190 <span class="glyphicon glyphicon-star-empty" aria-hidden="true" title="Số lượng đặt mua">9</p>
										<a href=""><button class='btn btn-info'><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Thêm giỏ hàng</button></a>
						  			</div>
								</div> -->
					  		</div>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>

		
	 	<div id="floating-panel" style="width: 370px">
      <strong>Start:</strong>
      <input id="start" type="text" value="254 Nguyễn Văn Linh, Thanh Khê, Đà Nẵng" style="width: 300px">
      <br>
      <strong>End:</strong>
      <input id="end" type="text" value="254 Hoàng Diệu, Hải Châu, Đà Nẵng" style="width: 300px">
      <input id="submit" type="submit" value="Chỉ đường">
    </div>
	<div class="row">
	 		<div id="map" style="width:1169px;height:300px;z-index: 1px;position: relative;">
	 		</div>
	 		
	</div>
	
	

	
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzmyhWaNEQ_i55-LLOfNPka-8BAhZRUaM&callback=initMap"
    async defer></script>
{{-- test --}}
@endsection
