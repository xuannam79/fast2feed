@extends('templates.f2f.master')
@section('title')
    Cập nhật tài khoản
@endsection
@section('content')
   
    <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding" style="margin-top: 15px;">
        		@include('templates.f2f.leftInfoAcc')
    		
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 clearpaddingr">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
					<div class="panel panel-info">
						<div class="panel-body" style="padding:0px">
							<ul class="nav navbar-nav" style="margin-bottom: 20px;border-bottom: 3px solid #bce8f1; text-align: center;">
								<li style="width: 215px"><a href="{{ route('trangPostRestaurant') }}">Bài đăng</a></li>
								<li style="width: 215px"><a href="{{ route('trangPost') }}">Thêm nhà hàng</a></li>
								<li style="width: 215px"><a href="{{ route('trangThemMenu') }}">Thêm menu</a></li>
								<li style="width: 215px"><a href="{{ route('trangpostProduct') }}">Thêm sản phẩm</a></li>
							</ul>
			           		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
			           			@foreach($getManagePostInfo as $key => $customer)
											@php
												$images = $customer->images;
								  				$customer_name = $customer->customer_name;
								  				$slug = str_slug($customer_name);
									  			$name = title_case($customer_name);
									  			$catalog = title_case($customer->catalog_name);
									  			$oldAddress = title_case($customer->address);
									  			$address = str_limit($oldAddress, 25);
									  			//$url = route('trangCustomer',['slug' => $slug, 'cusId' => $cusId])
											@endphp
			           			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 re-padding">
						  			<div class="product_item">
						  				<div class="product-image">
						  					<a href="#"><img src="/files/customer/{{ $images }}" alt="" class=""></a>
						  				</div>
										<a href="#" title="{{ $name }}">
											<p><span class='price text-right'>{{ $name }}</span></p>
										</a>
										<p style="color: gray;font-size: 13px; border-bottom: 1px solid gray">{{ $address }}</p>
										<p style="color: black;font-size: 14px;">{{ $catalog }}</p>
						  			</div>
								</div>
								@endforeach
								<a href="{{ route('trangPost') }}" style="color: black">
									<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 re-padding" title="chọn để thêm nhà hàng" style="cursor: pointer;">	
						  				<div class="product_item">
						  					<i class="glyphicon glyphicon-plus" style="height: 235px; padding-top: 95px; font-size: 50px"></i>
						  				</div>
									</div>
								</a>
			           		</div>
			        	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
