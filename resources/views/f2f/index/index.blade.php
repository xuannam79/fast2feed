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
	 	<a href="{{ route('trangDanhMuc') }}" title="Xem thêm sản phẩm">
	 		<div style="border: 1px solid #BCE8F1;width: 1135px;height: 50px;margin: 20px 0px;color: black">
	 			<p style="text-align: center;line-height: 50px">Xem thêm &nbsp;<span class="glyphicon">&#xe092;</span></p>
	 		</div>
	 	</a>

		
	 	<div class="row">
	 		<div id="mep" style="width:1169px;height:300px;">
	 			<div class="control-left-wrapper">
	 				<div class="zoom-in" id="zoom-in"><i class="fa fa-plus"></i></div>
	 				<div class="zoom-out" id="zoom-out"><i></i>></div>
	 				<div></div>
	 			</div>
	 		</div>
	 	</div>
	 		
	 	
	
	<script>
      	
      	function initMap() {
        var myLatLng = {lat: 16.059911, lng: 108.209889};

        var map = new google.maps.Map(document.getElementById('mep'), {
          zoom: 16,
          center: myLatLng,
          zoomControl: true, //ẩn or k ẩn nút phóng thu trong map
          scrollwheel: true, //có or không thể zoom map
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Trường Đại Học Duy Tân'
        });

        /*var customerMapType = new google.maps.StyledMapType([
        	{ stylers: [{hue: '#D2E4C8'}]},
        	]);
        var customerMapTypeID = 'customer_style';
        map.mapTypes.set(customerMapTypeID, customerMapType);
        map.setMapTypeID(customerMapTypeID);*/
        
	 <div id="floating-panel">
      <strong>Start:</strong>
      <select id="start">
        <option value="Nguyễn Văn Huề, Liên Chiểu, Đà Nẵng">Nguyễn Văn Huề</option>
        <option value="9 Ngô Văn Sở, Liên Chiểu, Đà Nẵng">9 Ngô Văn Sở</option>
        <option value="Mộc Bài 8, Liên Chiểu, Đà Nẵng">Mộc Bài 8, MO</option>
        <option value="254 Nguyễn Văn Linh, Thanh Khê, Đà Nẵng ">254 Nguyễn Văn Linh</option>
        
      </select>
      <br>
      <strong>End:</strong>
      <select id="end">
        <option value="Mộc Bài 8, Liên Chiểu, Đà Nẵng">Mộc Bài 8</option>
        <option value="9 Ngô Văn Sở, Liên Chiểu, Đà Nẵng">9 Ngô Văn Sở</option>
        <option value="Nguyễn Văn Huề, Liên Chiểu, Đà Nẵng">Nguyễn Văn Huề</option>
        <option value="254 Nguyễn Văn Linh, Thanh Khê, Đà Nẵng ">254 Nguyễn Văn Linh</option>
        
      </select>
    </div>
	<div class="row">
	 		<div id="map" style="width:1169.px;height:300px;z-index: 1px;position: relative;">
	 		</div>
	 		
	</div>
	<script>
		var map;
      function initMap() {
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: 16.0544068, lng: 108.2021667}
        });
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('right-panel'));
        
        var control = document.getElementById('floating-panel');
        control.style.display = 'block';
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);

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

	<script>
      	/*var map;
      	function initMap() {
        var myLatLng = {lat: 16.059911, lng: 108.209889};

        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Trường Đại Học Duy Tân',
        });

        
      }*/
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVq1eRO3SMYnmnXu213mAa9hTj_B7EMcI&callback=initMap"
    async defer></script>

	{{-- test --}}
	{{-- test --}}
@endsection
