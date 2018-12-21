@extends('templates.f2f.master')
@section('title')
	Giỏ hàng
@endsection
@section('content')
<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding" style="margin-top: 15px;">
				@include('templates.f2f.leftbar')
				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 clearpaddingr">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
						<ol class="breadcrumb">
						  <li><a href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Trang chủ</a></li>
						  <li><a href="#">Sản phẩm</a></li>
						  <li class="active">Chi tiết giỏ hàng</li>
						</ol>
						<div class="panel panel-info " style="margin-bottom: 15px">
						  <div class="panel-heading">
						    <h3 class="panel-title">Thông tin giỏ hàng</h3>
						  </div>
						  	@if (Session::has('msg'))
	                            <p style="color: red">{{ Session::get('msg') }}</p>
	                        @endif
	                        @if(session()->has('arrCart'))
							@php
								$arrCart = session()->get('arrCart');
								$totalPrice = 0;
							@endphp
							  <div class="panel-body">
							  	<table class="table table-hover">
									<thead>
										<th>STT</th>
										<th>Tên sản phẩm</th>
										<th>Hình ảnh</th>
										<th>Số lượng</th>
										<th>Thành tiền</th>
										<th>Xóa</th>
									</thead>
									

									<tbody>
										@foreach($arrCart as $key => $aCart)
										@php
											$STT = $loop->index+1;
											$images = $aCart['imagesProduct'];
											$name = $aCart['nameProduct'];
											$amount = $aCart['amountProduct'];
											$price = $aCart['priceProduct'];
											$countPrice = $amount * $price;
											$totalPrice += $countPrice;
										@endphp
										<tr>
											<td>{{ $STT }}</td>
											<td>{{ $name }}</td>
											<td><img src="/fast2feed/public/files/product/{{ $images }}" class="img-thumbnail" alt="" style="width: 50px;height: 40px"></td>
											<td><a href="">-</a><input type="text" value="{{ $amount }}" style="width: 30px"><a href="">+</a></td>
											<td>{{ $countPrice }} VNĐ</td>
											<td><a href=""><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
										</tr>
										@endforeach
										<tr>
											<td colspan="4"><strong>Tổng tiền:</strong></td>
											<td>@php
													echo $totalPrice;
												@endphp
											 VNĐ</td>
											<td style="font-weight: bold;color: red">Xóa toàn bộ</td>
										</tr>
									</tbody>
								</table>
							  	
							  </div>
	                        @endif

						</div>
					</div>
				</div>
			</div>
		</div>
@endsection