@extends('templates.f2f.master')
@section('title')
    Lịch sử đặt hàng
@endsection
@section('content')

    <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding" style="margin-top: 15px;">
        		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 clearpaddingl">
    				<div class="panel panel-info">
			        	<div class="panel-body" style="padding:0px">
			           		<div class="list-group">
				                <p href="#" class="list-group-item" position: relative style="font-size: 16px; font-weight: bold; text-align: center; background: #4C66A4; color: white">Thông tin tài khoản</p>
				                <a href="{{ route('trangCapNhatTK') }}" class="list-group-item">Cập nhật thông tin</a>
				                <a href="{{ route('trangDoiMK') }}" class="list-group-item">Đổi mật khẩu</a>
						        <a href="{{ route('trangPayment') }}" class="list-group-item">Phương thức thanh toán</a>
						        <a href="{{ route('trangPost') }}" class="list-group-item">Đăng sản phẩm</a>
						        <a href="{{ route('trangTransactionHistory') }}" class="list-group-item">Lịch sử đặt hàng</a>
						        <a href="{{ route('trangManagePost') }}" class="list-group-item">Lịch sử đăng hàng</a>
						        <a href="{{ route('trangChu') }}" class="list-group-item">Đăng xuất</a>
			            	</div>
			        	</div>
			    	</div>
				</div>
    		
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 clearpaddingr">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
					<div class="panel panel-info">
						<div class="panel-body" style="padding:0px">
			           		<div class="list-group">
				                <p href="#" class="list-group-item" position: relative style="font-size: 16px;font-weight: bold; text-align: center; background: #4C66A4; color: white">Lịch sử đặt hàng</p>
				                
                                <div>
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Mã hóa đơn</th>
                                                <th>Nhà hàng</th>
                                                <th>Ngày đặt</th>
                                                <th>Tổng tiền</th>
                                                <th>Thanh toán</th>
                                                <th>Trạng thái</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getTransactionHistory as $key => $info)
											@php
												$restaurant = $info->customer_name;
                                                $order = $info->order_id;
                                                $date = $info->date_create;
                                                $total = $info->total;
                                                $payment = $info->payment;
												$status = $info->payment;
											@endphp
                                            <tr>
                                                <td>
                                                    {{ $loop->index+1 }}
                                                </td>
                                                <td style="width: 100px"><span>{{ $order }}</span></td>
                                                <td style="width: 200px">
                                                    <span><span>{{ $restaurant }}</span>
                                                </td>
                                                <td><span>{{ $date }}</span></td>
                                                <td>{{ $total }}</td>
                                                <td>
                                                    @if($status == 1)
                                                    <span>Đã thanh toán</span>
                                                    @elseif($status == 2)
                                                    <span>Chưa thanh toán</span>
                                                    @else
                                                    <span>Đã hủy</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($status == 1)
                                                    <span>Đã giao</span>
                                                    @elseif($status == 2)
                                                    <span>Đang giao</span>
                                                    @else
                                                    <span></span>
                                                    @endif
                                                </td>
                                                 <td>
                                                    @if($status == 1)
                                                    <span></span>
                                                    @elseif($status == 2)
                                                    <a style="cursor: pointer;" data-toggle="modal" data-target="#myModal">Xem vị trí</a>
                                                    @else
                                                    <span></span>
                                                    @endif
                                                 </td>
                                            </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
			            	</div>
			        	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div id="map" style="width: 1000px; height: 500px; margin: auto 0;">
          
        </div>
      </div>
      
    </div>
  </div>
<script>
      var map, infoWindow, marker;
      function initMap() {
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: 16.0544068, lng: 108.2021667},
          disableDefaultUI: true
        });
        marker = new google.maps.Marker({
        
        map: map,
      });
      infoWindow = new google.maps.InfoWindow({
          content: 'Bạn đang ở đây'
        });
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            
        infoWindow.open(map, marker);
            marker.setPosition(pos);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
        
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('right-panel'));
        
        var control = document.getElementById('floating-panel');
        control.style.display = 'block';
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        document.getElementById('submit').addEventListener('click', onChangeHandler);
        //document.getElementById('start').addEventListener('click', onChangeHandler);
        //document.getElementById('end').addEventListener('click', onChangeHandler);
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var start = document.getElementById('start').value;
        var waypts = [];
          waypts.push({
              location: document.getElementById('start').value,
              stopover: true
            });
        var end = document.getElementById('end').value;
        directionsService.route({
          origin: marker.getPosition(),
          destination: end,
          waypoints: waypts,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var m = Math.ceil((response.routes[0].overview_path.length)/2)+Math.ceil((response.routes[0].overview_path.length)/3);
            var middle = response.routes[0].overview_path[m];
            var service = new google.maps.DistanceMatrixService;
            service.getDistanceMatrix({
              origins: [start],
              destinations: [end],
              travelMode: 'DRIVING',
              //unitSystem: google.maps.UnitSystem.METRIC,
              //avoidHighways: false,
              //avoidTolls: false
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
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVq1eRO3SMYnmnXu213mAa9hTj_B7EMcI&language=vi&callback=initMap">
    </script>
@endsection
