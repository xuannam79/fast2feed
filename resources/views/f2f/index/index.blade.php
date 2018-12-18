@extends('templates.f2f.master')
@section('title')
	Trang chủ
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
			      <a href="#" title=""><img src="/templates/f2f/images/slide/slide1.jpg" alt="" style="width: 1169px;height: 300px"></a>
			      <div class="carousel-caption">
			      </div>
			    </div>
			    <div class="item">
			      <a href="# title=""><img src="/templates/f2f/images/slide/slide2.jpg" alt="" style="width: 1169px;height: 300px"></a>
			      <div class="carousel-caption">
			      </div>
			    </div>
			    <div class="item">
			      <a href="#" title=""><img src="/templates/f2f/images/slide/slide3.jpg" alt="" style="width: 1169px;height: 300px"></a>
			      <div class="carousel-caption">
			      </div>
			    </div>
			    <div class="item">
			      <a href="#" title=""><img src="/templates/f2f/images/slide/slide4.jpg" alt="" style="width: 1169px;height: 300px"></a>
			      <div class="carousel-caption">
			      </div>
			    </div>
			    <div class="item">
			      <a href="#" title=""><img src="/templates/f2f/images/slide/slide5.jpg" alt="" style="width: 1169px;height: 300px"></a>
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
						  		@foreach($customers as $key => $customer)
						  		@php
						  			$cusId = $customer->customer_id;
						  			$images = $customer->images;
						  			$customer_name = $customer->customer_name;
						  			$slug = str_slug($customer_name);
						  			$name = title_case($customer_name);
						  			$catalog = title_case($customer->catalog_name);
						  			$oldAddress = title_case($customer->address);
						  			$address = str_limit($oldAddress, 25);
						  			$url = route('trangCustomer',['slug' => $slug, 'cusId' => $cusId])
						  		@endphp
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 re-padding">
						  			<div class="product_item">
						  				<div class="product-image">
						  					<a href="{{ $url }}"><img src="/files/customer/{{ $images }}" alt="" class=""></a>
						  				</div>
										<a href="{{ $url }}" title="{{ $name }}">
											<p><span class='price text-right'>{{ $name }}</span></p>
										</a>
										<p style="color: gray;font-size: 13px; border-bottom: 1px solid gray">{{ $address }}</p>
										<p style="color: black;font-size: 14px;">{{ $catalog }}</p>
						  			</div>
								</div>
								@endforeach

								<!-- <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 re-padding">
						  			<div class="product_item">
						  				<div class="product-image">
						  					<a href=""><img src="/templates/f2f/images/product/somi.png" alt="" class=""></a>
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
	 	<a href="{{ route('trangAllDanhMuc') }}" title="Xem thêm sản phẩm">
	 		<div style="border: 1px solid #BCE8F1;width: 1135px;height: 50px;margin: 20px 0px;color: black">
	 			<p style="text-align: center;line-height: 50px">Xem thêm &nbsp;<span class="glyphicon">&#xe092;</span></p>
	 		</div>
	 	</a>

		
	<div class="row">
	 		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2672.254017094827!2d108.20836680561693!3d16.059954725707726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219b4239d8e51%3A0x8e614086e99beb7c!2zMTgyIE5ndXnhu4VuIFbEg24gTGluaCwgVGjhuqFjIEdpw6FuLCBRLiBUaGFuaCBLaMOqLCDEkMOgIE7hurVuZyA1NTAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1544243119343" width="1169" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
	 		
	</div>
	
	
@endsection
