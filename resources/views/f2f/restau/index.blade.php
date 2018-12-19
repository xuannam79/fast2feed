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
		$totalPrice = 0;

		if(session()->has('admin')){
			$avatar = session()->get('admin')[0]->avatar;
			$accName = session()->get('admin')[0]->username;
			$account_id = session()->get('admin')[0]->account_id;
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
				                <a href="/files/customer/{{ $images }}" class="jqzoom" rel="gal1" title="triumph">
						            <img src="/files/customer/{{ $images }}" alt="" style="width:480px;height: 300px">
						        </a>
								<p style="margin-top: 35px;font-size: 15px;text-align: left;padding-left: 12px">Đặt món giao hàng tận nơi tại <strong>{{ $name }}</strong></p>
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
							@if($menu->status == 1)
						  		<a href="#menu{{ $idMenu }}" class="list-group-item">{{ $menuName }}</a>
						  	@endif
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
					  				<img src="/templates/f2f/images/discount.png" alt="">
					  				<img src="/templates/f2f/images/airpay.png" alt="">
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
					  		@if($menuProduct->status == 1)
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
						  			$approved = $product->approved;
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
						  		@if(session()->has($arrName))
									@php
										$arrCart = session()->get($arrName);
										$totalPrice = 0;
									@endphp
									@foreach($arrCart as $key => $aCart)
										@php
											$price = $aCart['priceProduct'];
											$amount = 1;

											$totalPrice += ($amount * $price);
										@endphp
									@endforeach
								@endif
						  		@if($idMenuFK == $idMenuPK)
						  		@if($approved == 1)
								<div class="list-item">
									<div class="img-item">
										<img src="/files/product/{{ $images }}" alt="">
									</div>
									<div class="name-item">
										<h4>{{ $name }}</h4>
										<p>Order <strong style="color: black">{{ $ordered}}</strong> lần</p>
									</div>
									<div class="price-item">
										<span>{{ $price }}đ</span>
										{{-- <a href="#" title=""><i class="fa fa-plus-square" aria-hidden="true" style="color: #CF2127;font-size: 25px"></i></a> --}}
										@php
										@endphp
										<button class="PlusDistance" onclick="ajaxToggleCartUpdate('{{$slug}}', {{$idCus}}, {{$idProduct}}, '{{$name}}', {{$price}}, {{$amount}}, {{$bool}}, {{$adminStatus}}, {{$totalPrice}}, {{$transport_fee}});" style="border: none;background-color: white"><i class="fa fa-plus-square" aria-hidden="true" style="color: #CF2127;font-size: 25px;" ></i></button>
									</div>
									<div class="clear"></div>
								</div>
								@endif
								@endif
								@endforeach
							</div>
							@endif
							@endforeach
					  	</div>

					</div>
				</div>
			</div>

    
			{{-- ajaxCart --}}
			<script type="text/javascript">
		        function ajaxToggleCartUpdate(slug, idCus, idProduct, name, price, amount, bool, adminStatus,
		         oldTotalPrice, transport_fee){
		         	function formatMoney(n, c, d, t) {
					  var c = isNaN(c = Math.abs(c)) ? 0 : c,
					    d = d == undefined ? "." : d,
					    t = t == undefined ? "," : t,
					    s = n < 0 ? "-" : "",
					    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
					    j = (j = i.length) > 3 ? j % 3 : 0;

					  return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
					};
		        	if(adminStatus != 1){
		        		top.location.href = '/dang-nhap';
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
			          //           if(bool == 0){
			          //           	$('.onCart'+idCus).append(data);
			          //           }else{
									    // // var newCountPrice = data.getAttribute("data-newCountPrice");
									    // // console.log($dataParse.filter("#onCartProduct1_"+idProduct));
									    // // alert("The " + animal.innerHTML + " is a " + animalType + ".");
			          //           	$('.onCartProduct1_'+idProduct).replaceWith(data);

			          //           	var count = $("#onCartProduct1_"+idProduct).text();
			          //           	var newCountPrice = count * price;
			          //           	var newCountPriceFormat = formatMoney(newCountPrice);
			          //           	$('.onCartProduct2_'+idProduct).replaceWith('<span style="float: right;" class="onCartProduct2_'+idProduct+'">'+newCountPriceFormat+'đ</span>');

			          //           	var newTotalPrice = oldTotalPrice + price;
			          //           	var newTotalPriceFormat = formatMoney(newTotalPrice);
			          //           	$('.onCart2_'+idCus).replaceWith('<span style="float: right;" class="onCart2_'+idCus+'">'+newTotalPriceFormat+'đ</span>');

			          //           	var TotalPriceOnFee	 = formatMoney(newTotalPrice + 7000);
			          //           	$('.onCart3_'+idCus).replaceWith('<span style="font-size:15px;float: right; color: #0288D1;font-weight: 800;" class="onCart3_'+idCus+'">'+TotalPriceOnFee+'đ</span>');
			          //           }
			                },
			                error: function (){
			                    alert('có lỗi xảy ra');
			                }
			            });

			            
		        	}
		        	window.setTimeout(function(){window.location.reload()}, 300);
		       }
		       var map;
			
			function initMap() {
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: 16.0544068, lng: 108.2021667},
          disableDefaultUI: true
        });
        

        var onChangeHandler = function() {
        	directionsDisplay.setMap(map);
          	calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        var onChangeHandler2 = function() {
        	//directionsService = null;
          	test(directionsService, directionsDisplay);
        };
        var onChangeHandler3 = function() {
        	calculateAndDisplayRoute(directionsService, directionsDisplay);
        	test(directionsService, directionsDisplay);
        };
        var onChangeHandler4 = function() {
        	map = new google.maps.Map(document.getElementById('map'), {
	          zoom: 12,
	          center: {lat: 16.0544068, lng: 108.2021667},
	          disableDefaultUI: true
	        });
        };
        var onChangeHandler5 = function() {
        	test2(directionsService, directionsDisplay);
        };

        directionsDisplay.addListener('directions_changed', function() {
          computeTotalDistance(directionsDisplay.getDirections());
        });

        document.getElementById('submit').addEventListener('click', onChangeHandler);
        document.getElementById('submit2').addEventListener('click', onChangeHandler2);
        document.getElementById('reset').addEventListener('click', onChangeHandler3);
        document.getElementById('dongMap').addEventListener('click', onChangeHandler4);
        document.getElementById('totalTotal').addEventListener('click', onChangeHandler5);
        //document.getElementById('start').addEventListener('click', onChangeHandler);
        //document.getElementById('end').addEventListener('click', onChangeHandler);
        new AutocompleteDirectionsHandler(map);
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
            //var InfoWindow = new google.maps.InfoWindow();
            var content = '<div>'+dt+
            '<br>'+dr+
            '</div>';
            //alert(content);
            InfoWindow.setContent(content);
            InfoWindow.setPosition(middle);
            InfoWindow.open(map);
          }
        })
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
      function computeTotalDistance(result) {
		  var total = 0;
		  var myroute = result.routes[0];
		  for (var i = 0; i < myroute.legs.length; i++) {
		    total += myroute.legs[i].distance.value;
		  }
		  total = total / 1000;
		  var total2 = parseFloat(total).toFixed(1);
		  document.getElementById('in_kilo').innerHTML = total2 + ' km';
		  document.getElementById('in_kilo1').innerHTML = total2 + ' km';
        var transport_fee = 7000*total2;
        document.getElementById('phiVanChuyen').innerHTML=formatMoney(transport_fee);
        var total = <?php echo json_encode($totalPrice); ?>;
        var newtotal = total + transport_fee;
        document.getElementById('bigTotal').innerHTML=formatMoney(newtotal);
        document.getElementById('bigTotal1').innerHTML=formatMoney(newtotal);
        
		}
		function computeTotalDistance2(result) {
		  var total = 0;
		  var myroute = result.routes[0];
		  for (var i = 0; i < myroute.legs.length; i++) {
		    total += myroute.legs[i].distance.value;
		  }
		  total = total / 1000;
		  var total2 = parseFloat(total).toFixed(1);
		  document.getElementById('in_kilo').innerHTML = total2 + ' km';
		  document.getElementById('in_kilo1').innerHTML = total2 + ' km';
        var transport_fee = 7000*total2;
        document.getElementById('phiVanChuyen').innerHTML=formatMoney(transport_fee);
        var total = <?php echo json_encode($totalPrice); ?>;
        var newtotal = total + transport_fee;
        document.getElementById('bigTotal').innerHTML=formatMoney(newtotal);
        document.getElementById('bigTotal1').innerHTML=formatMoney(newtotal);
		}
      
      
      function test(directionsService, directionsDisplay) {
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

          }
        })
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
      function test2(directionsService, directionsDisplay) {
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
            var total2 = parseFloat(dt);
	        var transport_fee = 7000*total2;

	        var total = <?php echo json_encode($totalPrice); ?>;
	        var slug = <?php echo json_encode($slug); ?>;
	        var idCus = <?php echo json_encode($idCus); ?>;
	        var account_id = <?php echo json_encode($account_id); ?>;
	        var newtotal = total + transport_fee;
	        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });

            $.ajax({

                url: "{{ route('trangAjaxOrder', ['slug' => $slug, 'cusId' => $idCus]) }}",
                type: 'POST',
                cache: false,
                data: {newtotal:newtotal, transport_fee:transport_fee, account_id:account_id},
                success: function(data){
                	console.log(data);
          //           
                },
                error: function (){
                    alert('có lỗi xảy ra');
                }
            });
            window.setTimeout(function(){window.location.reload()}, 300);
          }
        })
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
      	 function AutocompleteDirectionsHandler(map) {
	        this.map = map;
	        this.originPlaceId = null;
	        this.destinationPlaceId = null;
	        var destinationInput = document.getElementById('end');

	        var destinationAutocomplete = new google.maps.places.Autocomplete(
	            destinationInput, {placeIdOnly: true});
	        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

	        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);

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
					<img src="/files/account/{{ $avatar }}" class="img-circle" alt="{{$accName}}" width="35px">&nbsp;<span style="font-weight: 800;color: #6D6F71;line-height: 33px">{{ $accName }}</span><span style="float: right;line-height: 35px;"></span>
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
						$idProduct = $aCart['idProduct'];
						$name = $aCart['nameProduct'];
						$amount = $aCart['amountProduct'];
						$price = $aCart['priceProduct'];
						$countPrice = number_format($amount * $price);
						$totalPrice += ($amount * $price);
						$totalPrice1 = number_format($totalPrice);
					@endphp
					@if($amount > 0)
			  				<div class="giohang" style="height: 45px;">
			  					<span onclick="return ajaxToggleMinusProduct('{{$slug}}', {{$idCus}}, {{$idProduct}}, {{$amount}})" style="cursor: pointer;"><i class="fa fa-minus-square" aria-hidden="true" style="color: black"></i></span>
					  			<strong><span class="onCartProduct1_{{$key}}">{{ $amount }}</span></strong>
					  			<span onclick="return ajaxTogglePlusProduct('{{$slug}}', {{$idCus}}, {{$idProduct}}, {{$amount}})" style="cursor: pointer;"><i class="fa fa-plus-square" aria-hidden="true" style="color: green"></i></span>
					  			<strong>{{ $name }}</strong>
					  			<input type="text" name="" style="border: none" placeholder="Thêm ghi chú..."><span style="float: right;" class="onCartProduct2_{{$key}}">{{ $countPrice }}đ</span>

					  		</div>
					 @endif
			  		@endforeach
			  {{-- ajax minus --}}
			  <script type="text/javascript">
		        function ajaxToggleMinusProduct(slug, idCus, idProduct, amount){
		        		$.ajaxSetup({
			                headers: {
			                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			                  }
			            });
			            $.ajax({
			                url: "{{ route('trangMinusProduct', ['slug' => $slug, 'cusId' => $idCus]) }}",
			                type: 'POST',
			                cache: false,
			                data: {idProduct:idProduct, amount:amount},
			            });
		        	window.setTimeout(function(){window.location.reload()}, 300);
		       }
		       function ajaxTogglePlusProduct(slug, idCus, idProduct, amount){
		        		$.ajaxSetup({
			                headers: {
			                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			                  }
			            });
			            $.ajax({
			                url: "{{ route('trangPlusProduct', ['slug' => $slug, 'cusId' => $idCus]) }}",
			                type: 'POST',
			                cache: false,
			                data: {idProduct:idProduct, amount:amount},
			            });
		        	window.setTimeout(function(){window.location.reload()}, 300);
		       }
		    </script>
			  	<div class="onCart{{$idCus}}">
			  	</div>
				<div class="giohang" style="background-color: #F9F9F9;">
					<span>Cộng</span>
					<span style="float: right;" class="onCart2_{{$idCus}}">{{ $totalPrice1 }}đ</span>
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
					<span style="font-size:15px;float: right; color: #0288D1;font-weight: 800;" class="onCart3_{{$idCus}}">
						@php
							echo number_format($totalPrice + $transport_fee).'đ';
						@endphp
					</span>
				</div>

						<div class="giohang">
							<button id="submit2" class="dat-truoc" type="submit" style="" data-toggle="modal" data-target="#payModal"><i class="fa fa-check-circle" aria-hidden="true" style="color: white;font-size: 16px"></i>&nbsp;<span style="color: white">Đặt trước</span></button>
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
					<button id="submit2" class="dat-truoc" type="submit" style="" data-toggle="modal" data-target="#payModal"><i class="fa fa-check-circle" aria-hidden="true" style="color: white;font-size: 16px"></i>&nbsp;<span style="color: white">Đặt trước</span></button>
				</div>
				@endif

			</div>
			{{-- pay modal --}}
				@if(session()->has($arrName))
			  <div class="modal fade" id="payModal" role="dialog">
			    <div class="modal-dialog modal-lg">
			      <div class="modal-content" style="height: 610px;background-color: #EBEBEB">
			        <div class="modal-header">
			          <button id="dongMap" type="button" class="close" data-dismiss="modal">&times;</button>
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
                                                <div class="directionn-name">Điểm lấy hàng - {{ $getCustomer->customer_name }}
                                                </div>
                                                <input id="start" type="hidden" value="{{ $getCustomer->address }}" style="width: 300px">{{ $getCustomer->address }}
                                            </div>
                                            <div class="directionn-to">
                                                <div class="directionn-name" id="shipping-address">
													@if(session()->has('admin')) 
	                                            	@php $role = session()->get('admin')[0]->role; 
	                                            	if($role == 2){
														$url1 = $getRestaurant->restaurant_name;
														$url2 = $getRestaurant->phone_res;
	                                            		echo ' <span>Điểm giao hàng - '.$url1.' </span> <span> - '.$url2.' </span>';
	                                            	}
													else {
														$url1 = $getShipper->shipper_name;
														$url2 = $getShipper->phone;
														echo ' <span>Điểm giao hàng - '.$url1.'</span> <span> - '.$url2.' </span>';
													}
													@endphp
													@endif
                                                </div>
                                                @if(session()->has('admin')) 
	                                            	@php $role = session()->get('admin')[0]->role; 
	                                            	if($role == 2){
														$url1 = $getRestaurant->address_res;
	                                            		echo ' <input id="end" type="text" value="'.$url1.'" style="width: 200px;" >
	                                            		<input id="reset" type="submit" value="Cập nhật">';
	                                            	}
													else {
														$url1 = $getShipper->address;
														echo ' <input id="end" type="text" value="'.$url1.'" style="width: 200px">
														<input id="reset" type="submit" value="Cập nhật">';
													}
													@endphp
													@endif
                                                    
                                            </div>
                                        </div>
                                        <div>
                                            <div class="directionn-time" style="border: 1px solid #464646;
												    border-radius: 12px;
												    display: inline-block;
												    padding: 2px 3px;
												    background-color: #fbf9d8;"><span class="fa">
											    <i class="far fa-clock"></i></span><span
                                                  class="txt-bold"> Thời gian đặt:  {{ $dt->toTimeString() }} - {{ $dt->toDateString() }} - </span><span
                                                  class="txt-red" id="in_kilo" ></span>
                                                  
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
				          		<input type="hidden" id="in_kilo3" name="in_kilo3" />
				          		<div class="pay-right-top-body">
									
									
									@php
										$arrCart = session()->get($arrName);
										$totalPrice = 0;
										$count = 0;
										$countAmount = 0;
										$newtransport_fee = 0;
										$bigtotal = 0;
										$distance = 0.5;
									@endphp
									@foreach($arrCart as $key => $aCart)
									@php
										$idProduct = $key;
										$name = $aCart['nameProduct'];
										$amount = $aCart['amountProduct'];
										$countAmount += $amount;
										$price = $aCart['priceProduct'];
										$totalPrice += ($price * $amount);
										$totalPrice1 = number_format($totalPrice);
										$total = number_format($amount * $price);
										
										$newtransport_fee = number_format($transport_fee * $distance);
										$bigtotal = number_format(($transport_fee * $distance) + $totalPrice);
									@endphp

				          			<div class="list-order">
				          				<span class="order-number">{{$amount}}</span><strong class="order-name">{{$name}}</strong><span class="order-price">{{$total}}đ</span>
				          			</div>
				          			@endforeach

				          		</div>
				          	</div>
				          	<div class="pay-right-bot">
				          		<div>
				          			<div style="padding-left: 10px;height: 54px;font-size: 16px;line-height: 28px;">
				          				<span style="color: #464646">Tổng cộng <strong>{{ $countAmount }}</strong> phần</span>
				          				<strong style="float: right;">{{$totalPrice1}}đ</strong><br>
				          				<span style="color: #464646">Phí vận chuyển: </span><span id="in_kilo1" style="color: #CF2127"></span>
										<i class="fa fa-question-circle-o" aria-hidden="true" style="font-size: 15px"></i><span style="float: right;">đ</span><span id="phiVanChuyen" style="float: right;"></span>
				          			</div>
				          			<div style="background-color: #FBF9D8;height: 32px;font-size: 16px;line-height: 29px;">
				          				<span style="padding-left: 10px;margin-right: 42px;">Mã khuyến mãi</span>
				          				<input type="text" name="" placeholder="NHẬP MÃ" style="width: 82px;height: 25px;font-size: 14px"><button type="button" style="background-color: #6CC942;color: white;height: 25px;line-height: 0px;">Áp dụng</button>
				          				
				          			</div>
				          			<div style="padding-left: 10px;height: 50px;font-size: 18px;line-height: 50px;">
				          				<span><strong>Tổng cộng</strong></span>
				          				<span style="float: right;">đ</span><span id="bigTotal" style="float: right;"></span>
				          			</div>
				          			<div style="background-color: #FBF9D8;height: 40px;font-size: 18px;line-height: 40px;">
				          				<a href="#" title="">
				          					<strong style="color: black;padding-left: 10px">Tiền mặt</strong><span style="float: right;">Thay đổi &nbsp;<i class="fa fa-angle-right" style="font-size:22px;color: #959595"></i></span>
				          				</a>
				          			</div>
				          			<textarea placeholder="Ví dụ: Tòa nhà ABC, lầu 8, cho thêm 2 ly nhựa" name="note" class="pay-right-bot-note"></textarea>
				          		</div>
				          	</div>
			          	</div>		

			        </div>
			        <div class="modal-footer">
		          		<div class="payButton">
		          			<button id="totalTotal" type="submit">Đặt hàng</button>
		          			
		          			<span class="payGia">đ</span>
		          			<span class="payGia" style="padding-right: 10px;" id="bigTotal1"></span>
		          		</div>
			        </div>
			      </div>
			    </div>
			  </div>
			  @else
			  	<!-- Modal -->
				  <div class="modal fade" id="payModal" role="dialog">
				    <div class="modal-dialog modal-lg" style="padding-top: 150px">
				      <div class="modal-content" style="width: 92%">
				        <div class="modal-header" style="background-color: #F2F2F2">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h5 class="modal-title"><strong style="color: #CF2127">Fast2Feed</strong>&nbsp;<strong>Thông báo</strong></h5>
				        </div>
				        <div class="modal-body" style="background-image: url('/templates/f2f/images/background2.png'); height: 173px;">
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: #CF2127;color: white">OK</button>
				        </div>
				      </div>
				    </div>
				  </div>
			  @endif
			</div>

		</div>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b4ec0a436ed7084"></script>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b4ec0a436ed7084"></script>
		<script>
			

      function formatMoney(n, c, d, t) {
                      var c = isNaN(c = Math.abs(c)) ? 0 : c,
                        d = d == undefined ? "." : d,
                        t = t == undefined ? "," : t,
                        s = n < 0 ? "-" : "",
                        i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
                        j = (j = i.length) > 3 ? j % 3 : 0;

                      return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
                    };
		</script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAzmyhWaNEQ_i55-LLOfNPka-8BAhZRUaM&callback=initMap"
    async defer></script>
@endsection