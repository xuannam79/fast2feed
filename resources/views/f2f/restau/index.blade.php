@extends('templates.f2f.master')
@section('title')
	Khách hàng
@endsection
@section('content')
	@php
		$name = title_case($getCustomer->customer_name);
		$images = $getCustomer->images;
		$catalog_name = title_case($getCustomer->catalog_name);
		$address = title_case($getCustomer->address);
		$rate = round($getCustomer->rate,1);
		$timeopen = $getCustomer->time_open;
		$timeclose = $getCustomer->time_close;
		$min_money = number_format($getCustomer->min_money);
		$max_money = number_format($getCustomer->max_money);
		$transport_fee = $getCustomer->transport_fee;
		$transport_fee1 = number_format($getCustomer->transport_fee);
		$idCus = $getCustomer->customer_id;
		$slug = str_slug($getCustomer->customer_name);
		$arrName = 'arrCart'.$idCus;
		$adminStatus = 0;

		if(session()->has('admin')){
			$avatar = session()->get('admin')[0]->avatar;
			$accName = session()->get('admin')[0]->username;
		}else{
			$avatar = 'userUnKnown.png';
			$accName = '';
		}

	@endphp
	<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding" style="margin-top: 15px;">
				
				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 clearpaddingr" style="width: 96%">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
						
						<div class="panel panel-info " style="margin-bottom: 15px">
						  
						  <div class="panel-body">
					  		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center">
				                <a href="/fast2feed/public/files/customer/{{ $images }}" class="jqzoom" rel="gal1" title="triumph">
						            <img src="/fast2feed/public/files/customer/{{ $images }}" alt="" style="width:480px;height: 300px">
						        </a>
								<p style="margin-top: 35px;font-size: 15px;text-align: left;padding-left: 12px">Đặt món giao hàng tận nơi tại {{ $name }}</p>
						  	</div>
						  	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="font-family: Time New Roman;border-bottom: 1px solid #EEEEEE">
						  		<span style="font-size: 14px">
						  			<a href="{{ route('trangChu') }}" title="">Trang chủ »</a><a href="" title="">{{ $name }}</a>
						  		</span>
						  		<p style="font-size: 15px;color: gray;margin-top: 15px">
						  			{{ $catalog_name }}
						  		</p>
						  		<h3>
						  			<strong>{{ $name }}</strong>
						  		</h3>
						  		<p style="font-size: 14px;color: #464646">
						  			{{ $address }}
						  		</p>
						  		
						  		<div class="star-rate">
						  			@php
						  			$rate2 = strlen($rate);
						  			$arrRate = explode('.',$rate);


						  			
					  				if($rate2 > 1){
					  					if($arrRate[1] >= 1 && $arrRate[1] <= 3){
							  				for($i=1;$i<=$rate;$i++){
						  						echo '<i class="fa fa-star" aria-hidden="true"></i>&nbsp;';
						  					}
							  			}else if($arrRate[1] >= 4 && $arrRate[1] <= 6){
							  				for($i=1;$i<=$rate;$i++){
						  						echo '<i class="fa fa-star" aria-hidden="true"></i>&nbsp;';
						  					}
						  					echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
							  			}else {
							  				for($i=1;$i<=$rate;$i++){
						  						echo '<i class="fa fa-star" aria-hidden="true"></i>&nbsp;';
						  					}
						  						echo '<i class="fa fa-star" aria-hidden="true"></i>&nbsp;';
							  			}
					  				}else {
					  					for($i=1;$i <= $rate;$i++){
					  						echo '<i class="fa fa-star" aria-hidden="true"></i>&nbsp;';
					  					}
					  				}

							  		@endphp
							  		
							  	</div>
						  		&nbsp;
						  		<span style="color: #02A5E5;font-size: 16px">2 bình luận</span>
						  		<br>	
						  		<i class="fa fa-circle" style="color: green"></i>&nbsp; 
						  		<span style="font-family: Arial;font-size: 15px;color: green">
						  			Mở cửa
						  		</span>&nbsp;
						  		<span>
						  			<i class="fa fa-clock-o" aria-hidden="true" style="color: gray;font-size: 18px"></i>
						  		</span>
						  		<span style="font-weight: 500;font-size: 16px">
						  			{{ $timeopen }} - {{ $timeclose }}
						  		</span><br>
						  		<i class="fa fa-money" aria-hidden="true" style="color: gray;font-size: 16px">
						  			
						  		</i>&nbsp;
						  		<span style="color: gray;font-size: 16px;">
						  			{{ $min_money }} - {{ $max_money }}
						  		</span>

						  	</div>
						  	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="font-family: Time New Roman;margin-top: 10px;color: gray;font-size: 17px">
						  		<span>
						  			Phí vận chuyển : 
						  		</span>
						  		<span>
						  			{{ $transport_fee1 }}đ / 1km
						  		</span><br>	
						  	</div>
						  	
						  </div>
						</div>
						
					</div>
				</div>
			</div>
			<!-- Leftbar of customer -->
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 clearpaddingl">
					<div class="panel panel-info">
					  <div class="panel-body" style="padding:0px">
					  	
					  	<div class="list-group">
					  		@foreach($getMenu as $key => $menu)
					  		@php
					  			$menuName = title_case($menu->menu_name);
					  			$idMenu = $menu->menu_id;
					  		@endphp
						  	<a href="#menu{{ $idMenu }}" class="list-group-item">{{ $menuName }}</a>
						  	
						  	@endforeach
						  	{{-- <a id="active" href="{{ route('trangDanhMuc') }}" class="list-group-item">Kem sữa</a> --}}
						</div>
					  </div>
					</div>
				</div>
				<!-- end-leftbar of customer-->
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 clearpaddingr" style="width:585px;height: 100%">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
					<div class="panel panel-info">
						<div class="discount">
					  		<div class="code-discount">
					  			<div class="code-discount-img">
					  				<img src="/fast2feed/public/templates/f2f/images/discount.png" alt="">
					  				<img src="/fast2feed/public/templates/f2f/images/airpay.png" alt="">
					  			</div>
					  			<div class="code-discount-text">
					  				<div class="discount-text1">
					  					<p>Giảm giá <strong style="color: #DC3545">30%</strong> - Mã: <strong>XUANNAM1234</strong></p>
					  					<p>Hết hạn: <strong>24/10/2018 21:00</strong></p>
					  					<p>Đặt tối thiểu: <strong>0đ</strong>  - Giảm tối đa:  <strong>Không giới hạn</strong></p>
					  				</div>
					  				<div class="discount-text2">
					  					<p><strong>Khuyến mãi qua ví AirPay </strong></p>
					  					<p>Hết hạn: <strong>Hết hạn: 31/12/2018 23:59</strong></p>
					  					<p>Đặt tối thiểu: <strong>0</strong> - Giảm tối đa: <strong>30,000đ</strong></p>
					  				</div>
					  			</div>
					  		</div>
						</div>
					  	<div class="panel-body">
					  		@foreach($getMenu as $key => $menuProduct)
					  		@php
					  			$nameMenu = $menuProduct->menu_name;
					  			$idMenuPK = $menuProduct->menu_id;
					  		@endphp
					  		<div class="item">
						  		<div class="item-cat" id="menu{{ $idMenuPK }}">
						  			<h4>{{ $nameMenu }}</h4>
						  		</div>
						  		@foreach($getProduct as $key => $product)
						  		@php
						  			$idMenuFK = $product->menu_id;
						  			$idProduct = $product->product_id;
						  			$images = $product->images;
						  			$name = $product->product_name;
						  			$ordered = $product->quantify_ordered;
						  			$price = $product->price;
						  			$amount = 1;
						  			$bool = 0;
						  			if(session()->has('admin')){
						  				$adminStatus = 1;
										if (session()->has($arrName)){
											$arrCart = session()->get($arrName);
											if (!array_key_exists($idProduct, $arrCart)) {
												$bool = 0;
											} else {
												$bool = 1;
											}
										}
									}
						  		@endphp
						  		@if($idMenuFK == $idMenuPK)
								<div class="list-item">
									<div class="img-item">
										<img src="/fast2feed/public/files/product/{{ $images }}" alt="">
									</div>
									<div class="name-item">
										<h4>{{ $name }}</h4>
										<p>Order <strong style="color: black">{{ $ordered}}</strong> lần</p>
									</div>
									<div class="price-item">
										<span>{{ $price }}đ</span>
										{{-- <a href="#" title=""><i class="fa fa-plus-square" aria-hidden="true" style="color: #CF2127;font-size: 25px"></i></a> --}}
										
										<button onclick="ajaxToggleCartUpdate('{{$slug}}', {{$idCus}}, {{$idProduct}}, '{{$name}}', {{$price}}, {{$amount}}, {{$bool}}, {{$adminStatus}});" style="border: none;background-color: white"><i class="fa fa-plus-square" aria-hidden="true" style="color: #CF2127;font-size: 25px;"></i></button>
									</div>
									<div class="clear"></div>
								</div>
								@endif
								@endforeach
							</div>
							@endforeach
					  	</div>

					</div>
				</div>
			</div>

			{{-- ajaxCart --}}
			<script type="text/javascript">
		        function ajaxToggleCartUpdate(slug, idCus, idProduct, name, price, amount, bool, adminStatus){
		        	if(adminStatus != 1){
		        		top.location.href = '/fast2feed/public/dang-nhap';
		        	}else {
		        		$.ajaxSetup({
			                headers: {
			                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			                  }
			            });
			            $.ajax({
			                url: "{{ route('trangAjaxCart', ['slug' => $slug, 'cusId' => $idCus]) }}",
			                type: 'POST',
			                cache: false,
			                data: {idProduct:idProduct, name:name, price:price, amount:amount},
			                success: function(data){
			                    if(bool == 0){
			                    	$('.onCart'+idCus).append(data);
			                    }else{
			                    	// function showDetails(data) {

									    // var newCountPrice = data.getAttribute("data-newCountPrice");
									    // console.log($dataParse.filter("#onCartProduct1_"+idProduct));
									    // alert("The " + animal.innerHTML + " is a " + animalType + ".");
									// }
			                    	// console.log(inputVal);
			                    	$('.onCartProduct1_'+idProduct).replaceWith(data);
			                    	//document.getElementById("demo").innerHTML = "Paragraph changed!";
			                    	var count = $("#onCartProduct1_"+idProduct).text();
			                    	var newCountPrice = count * price;
			                    	$('.onCartProduct2_'+idProduct).replaceWith(newCountPrice);
			                    	// <span style='float: right;' class='onCartProduct2_'>đ</span>
			                    	console.log(newCountPrice);
								    // $( "#onCartProduct1_"+idProduct ).keyup(count * price);

			                    }
			                },
			                error: function (){
			                    alert('có lỗi xảy ra');
			                }
			            });
		        	}
		       }
		    </script>

			{{-- //smooth scrolling page --}}
			<script>
				$("a[href*='#']:not([href='#])").click(function() {
				  let target = $(this).attr("href");
				  $('html,body').stop().animate({
				    scrollTop: $(target).offset().top
				  }, 1000);
				  event.preventDefault();
				});
			</script>	

			<div style="float: right;width: 270px;height: 100%;border: 1px solid #BCE8F1;border-radius: 5px;font-size: 13px">

				<div class="giohang" style="background-color: #F9F9F9;height: 45px;">
					<img src="/fast2feed/public/files/account/{{ $avatar }}" class="img-circle" alt="{{$accName}}" width="35px">&nbsp;<span style="font-weight: 800;color: #6D6F71;line-height: 33px">{{ $accName }}</span><span style="float: right;line-height: 35px;">2 món</span>
				</div>
				@if(!session()->has($arrName))
					<div class="onCart{{$idCus}}"></div>
					
				@endif
				@if(session()->has($arrName))
					
					@php
						$arrCart = session()->get($arrName);
						$totalPrice = 0;
					@endphp
					@foreach($arrCart as $key => $aCart)
					@php
						$name = $aCart['nameProduct'];
						$amount = $aCart['amountProduct'];
						$price = $aCart['priceProduct'];
						$countPrice = number_format($amount * $price);
						$totalPrice += ($amount * $price);
						$totalPrice1 = number_format($totalPrice);
					@endphp

			  				<div class="giohang" style="height: 45px;">
					  			<a href="#" title=""><i class="fa fa-plus-square" aria-hidden="true" style="color: green"></i></a>
					  				<strong><span class="onCartProduct1_{{$key}}">{{ $amount }}</span></strong>
					  			<a href="#" title=""><i class="fa fa-minus-square" aria-hidden="true" style="color: black"></i></a>
					  			<strong>{{ $name }}</strong>
					  			<input type="text" name="" style="border: none" placeholder="Thêm ghi chú..."><span style="float: right;" class="onCartProduct2_{{$key}}">{{ $countPrice }}đ</span>

					  		</div>
			  		@endforeach
			  		
			  	<div class="onCart{{$idCus}}">
			  	</div>
				<div class="giohang" style="background-color: #F9F9F9;">
					<span>Cộng</span>
					<span style="float: right;">{{ $totalPrice1 }}đ</span>
				</div>
				<div class="giohang" style="background-color: #F9F9F9">
					<span>Phí vận chuyển (Est.)</span>
					<span style="float: right;">{{ $transport_fee1 }}đ/km</span>
				</div>
				<div class="giohang" style="background-color: #FBF9D8;height: 30px">
					<p style="text-align: center;"><span style="color: red">(*)</span>Nhập mã khuyến mãi ở bước hoàn tất</p>
				</div>
				<div class="giohang" style="background-color: #F9F9F9">
					<span>Tổng cộng:</span>
					<span style="font-size:15px;float: right; color: #0288D1;font-weight: 800;">
						@php
							echo number_format($totalPrice + $transport_fee).'đ';
						@endphp
					</span>
				</div>
				<div class="giohang">
					<button class="dat-truoc" type="submit" style="" data-toggle="modal" data-target="#payModal"><i class="fa fa-check-circle" aria-hidden="true" style="color: white;font-size: 16px"></i>&nbsp;<span style="color: white">Đặt trước</span></button>
				</div>
				
				@else
					<div class="giohang" style="background-color: #F9F9F9;">
						<span>Cộng</span>
						<span style="float: right;">0</span>
					</div>
					<div class="giohang" style="background-color: #F9F9F9">
						<span>Phí vận chuyển (Est.)</span>
						<span style="float: right;">{{ $transport_fee1 }}đ/km</span>
					</div>
					<div class="giohang" style="background-color: #FBF9D8;height: 30px">
						<p style="text-align: center;"><span style="color: red">(*)</span>Nhập mã khuyến mãi ở bước hoàn tất</p>
					</div>
					<div class="giohang" style="background-color: #F9F9F9">
						<span>Tổng cộng:</span>
						<span style="font-size:15px;float: right; color: #0288D1;font-weight: 800;">
							0
						</span>
					</div>
					<div class="giohang">
					<button class="dat-truoc" type="submit" style="" data-toggle="modal" data-target="#payModal"><i class="fa fa-check-circle" aria-hidden="true" style="color: white;font-size: 16px"></i>&nbsp;<span style="color: white">Đặt trước</span></button>
				</div>
				@endif

			</div>
			{{-- pay modal --}}

			  <div class="modal fade" id="payModal" role="dialog">
			    <div class="modal-dialog modal-lg">
			      <div class="modal-content" style="height: 610px;background-color: #EBEBEB">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title"><strong>Xác nhận đơn hàng</strong></h4>
			        </div>
			        <div class="modal-body" style="height: 470px">
			          	<div class="pay-left">
				          	<div id="map" class="pay-left-top">
				          		
				          	</div>
				          	<div class="pay-left-bot">
				          		<div>
				          			<div class="directionn-content" >
                                        <div class="directionn-info">
                                            <div class="directionn-from">
                                                <div class="directionn-name">Điểm lấy hàng - Tên quán
                                                </div>
                                                <input id="start" type="hidden" value="254 Nguyễn Văn Linh, Thanh Khê, Đà Nẵng" style="width: 300px">254 Nguyễn Văn Linh, Thanh Khê, Đà Nẵng
                                            </div>
                                            <div class="directionn-to">
                                                    <div class="directionn-name"
                                                        id="shipping-address">
                                                        <span>Điểm giao hàng - Tên khách</span><span> - Sđt khách </span>
                                                    </div>
                                                        <input id="end" type="hidden" value="254 Hoàng Diệu, Hải Châu, Đà Nẵng" style="width: 300px">254 Hoàng Diệu, Hải Châu, Đà Nẵng
                                            </div>
                                        </div>
                                        <div>
                                            <div class="directionn-time" style="border: 1px solid #464646;
												    border-radius: 12px;
												    display: inline-block;
												    padding: 2px 3px;
												    background-color: #fbf9d8;"><span class="fa">
											    <i class="far fa-clock"></i></span><span
                                                  class="txt-bold"> Thời gian giao:  15:35 - 24/10 - </span><span
                                                  class="txt-red">3.0km</span>
                                            </div>
                                            <div id="submit" class="change-info" style="font-size: 14px;
											    color: #0288d1;
											    padding: 10px;
											    position: relative;
											    cursor: pointer;">
											    Hiển thị khoảng cách trên bản đồ
                                            </div>
                                        </div>
                                    </div>
				          		</div>
				          	</div>
			          	</div>
			          	<div class="pay-right">
				          	<div class="pay-right-top">
				          		<div class="pay-right-top-head">
				          			<a href="" title="">
				          			<strong>CHI TIẾT ĐƠN HÀNG</strong><i class="fa fa-angle-right" style="font-size:22px;position: absolute;right: 22px;color: #959595"></i>
				          			</a>
				          		</div>
				          		<div class="pay-right-top-body">
				          			<div class="list-order">
				          				<span class="order-number">1</span><strong class="order-name">Bibimbap gạo lứt trộn gà cay </strong><span>[Sốt thêm]</span><span class="order-price">66,000đ</span>
				          			</div>
				          			<div class="list-order">
				          				<span class="order-number">1</span><strong class="order-name">Cơm gạo lứt đậu phụ sốt sả ớt & rau xào </strong><span>[Sốt thêm]</span><span class="order-price">44,000đ</span>
				          			</div>

				          		</div>
				          	</div>
				          	<div class="pay-right-bot">
				          		<div>
				          			<div style="padding-left: 10px;height: 54px;font-size: 16px;line-height: 28px;">
				          				<span style="color: #464646">Tổng cộng <strong>3</strong> phần</span><strong style="float: right;">110,000đ</strong><br>
				          				<span style="color: #464646">Phí vận chuyển: </span><span style="color: #CF2127">0.5 km</span>
										<i class="fa fa-question-circle-o" aria-hidden="true" style="font-size: 15px"></i><span style="float: right;">15,000đ</span>
				          			</div>
				          			<div style="background-color: #FBF9D8;height: 32px;font-size: 16px;line-height: 29px;">
				          				<span style="padding-left: 10px;margin-right: 42px;">Mã khuyến mãi</span>
				          				<input type="text" name="" placeholder="NHẬP MÃ" style="width: 82px;height: 25px;font-size: 14px"><button type="button" style="background-color: #6CC942;color: white;height: 25px;line-height: 0px;">Áp dụng</button>
				          				
				          			</div>
				          			<div style="padding-left: 10px;height: 50px;font-size: 18px;line-height: 50px;">
				          				<span><strong>Tổng cộng</strong></span><span style="float: right;">125,000đ</span>
				          			</div>
				          			<div style="background-color: #FBF9D8;height: 40px;font-size: 18px;line-height: 40px;">
				          				<a href="" title="">
				          					<strong style="color: black;padding-left: 10px">Tiền mặt</strong><span style="float: right;">Thay đổi &nbsp;<i class="fa fa-angle-right" style="font-size:22px;color: #959595"></i></span>
				          				</a>
				          			</div>
				          			<textarea placeholder="Ví dụ: Tòa nhà ABC, lầu 8, cho thêm 2 ly nhựa" name="note" class="pay-right-bot-note"></textarea>
				          		</div>
				          	</div>
			          	</div>		

			        </div>
			        <div class="modal-footer">
			          <a href="#" title="">
		          		<div class="payButton">
		          			<strong><span class="payDathang">Đặt hàng &nbsp;<i class="fa fa-arrow-right" style="font-size:19px"></i></span></strong>
		          			<span class="payGia">81,000đ</span>
		          		</div>
			          </a>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>

		</div>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b4ec0a436ed7084"></script>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b4ec0a436ed7084"></script>
		<script>
			var map;
      function initMap() {
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: 16.0544068, lng: 108.2021667},
          disableDefaultUI: true
        });
        
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('right-panel'));
        
        

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        document.getElementById('submit').addEventListener('click', onChangeHandler);
        //document.getElementById('start').addEventListener('click', onChangeHandler);
        //document.getElementById('end').addEventListener('click', onChangeHandler);
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var start = document.getElementById('start').value;
        var end = document.getElementById('end').value;
        directionsService.route({
          origin: start,
          destination: end,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var m = Math.ceil((response.routes[0].overview_path.length)/2);
            var middle = response.routes[0].overview_path[m];
            var service = new google.maps.DistanceMatrixService;
            service.getDistanceMatrix({
              origins: [start],
              destinations: [end],
              travelMode: 'DRIVING',
              unitSystem: google.maps.UnitSystem.METRIC,
              avoidHighways: false,
              avoidTolls: false
        }, function(response, status) {
          if (status === 'OK') {
            var originList = response.originAddresses;
            var destinationList = response.destinationAddresses;
            for (var i = 0; i < originList.length; i++) {
              var results = response.rows[i].elements;
              for (var j = 0; j < results.length; j++){
                var element = results[j];
                var dt = element.distance.text;
                var dr = element.duration.text;
              }
            }
            var i = new google.maps.InfoWindow();
            var content = '<div>'+dt+
            '<br>'+dr+
            '</div>';
            //alert(content);
            i.setContent(content);
            i.setPosition(middle);
            i.open(map);
          }
        })
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
		</script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzmyhWaNEQ_i55-LLOfNPka-8BAhZRUaM&callback=initMap"
    async defer></script>
@endsection