@extends('templates.f2f.master')
@section('title')
Chi Tiết Hóa Đơn
@endsection
@section('content')

@php
    $total_product = 0;
    $count_product = 0;
@endphp
@php
    $order = ($getAllDanhSachHD->order_id);
    $res_name = ($getAllDanhSachHD->customer_name);
    $cus_name = ($getAllDanhSachHD->restaurant_name);
    $address_res = ($getAllDanhSachHD->address);
    $address_cus = ($getAllDanhSachHD->address_res);
    $phone = ($getAllDanhSachHD->phone_res);
    $date = ($getAllDanhSachHD->date_create);
    $time = ($getAllDanhSachHD->time);
    $slug = str_slug($res_name);
    $url = route('trangTestMap',['slug' => $slug, 'order' => $order]) 
@endphp
<!-- model content -->
<div id="myModel" style="display: block" class="model fade1 model-order show1" tabindex="-1"
     role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="model-dialog model-dialog-centered" role="document">
        <div class="model-content model-order-detail"><a href="{{ route('trangShipper') }}"><span id="x" class="close"
                                                            data-dismiss="model">x</span></a>
            <div class="model-header">Chi tiết hóa đơn</div>
            <div class="model-body">
                <div class="order-left">
                    <div id="map" class="map-order"></div>
                    <div class="direction-content">
                        <div class="direction-info">
                            <div class="direction-from">
                                <div class="direction-name">Điểm lấy hàng - {{ $res_name}}
                                </div>
                                <input id="start" type="hidden" value="{{ $address_res}}" style="width: 300px">
                                {{ $address_res}}
                            </div>
                            <div class="direction-to">
                                <div class="">
                                    <div class="direction-name"
                                         id="shipping-address">
                                        <span>Điểm giao hàng - {{ $cus_name }}</span><span> - {{ $phone}} </span>
                                    </div>
                                    <input id="end" type="hidden" value="{{ $address_cus}}" style="width: 300px">
                                    {{ $address_cus}}
                                </div>
                            </div>
                        </div>
                        <div>
                            <div id="result" class="direction-time"><span class="fa"><i
                                            class="far fa-clock"></i></span><span
                                        class="txt-bold"> Thời gian giao:  {{ $time}} - {{ $date}} - </span><span id="in_kilo"
                                        class="txt-red"></span></div>
                            <div id="submit" class="change-info">
                                Hiển thị khoảng cách trên bản đồ
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="order-right">
                    <p class="title-popup-order">Thông tin sản phẩm</p>
                    <div class="order-list">
                        @foreach($getAmountProduct as $key => $value)
                        @php
                        $sanpham = $value->order_id;
                        if($order == $sanpham){
                            $product_name = $value->product_name;
                            $money_transport_fee = $value->transport_fee_order;
                            $total = $value->total;
                            $amount = $value->amount;
                            $price = $value->price;
                            $total3 = $amount * $price;
                            $count_product += $amount;
                            $total_product = $total_product + $total3;
                        }   
                        else continue;
                        @endphp
                        <div class="order-item">
                            <span class="order-item-number">{{ $amount }}</span>
                            <div class="order-item-info">
                                <div class="order-item-name"><span class="txt-bold">
                                {{ $product_name }}&nbsp;</span>
                                </div>
                                <div class="order-item-note"></div>
                            </div>
                            <div class="order-item-price">{{ number_format($total3) }} <span class="unit">đ</span>
                            </div>
                           
                        </div>
                        @endforeach
                    </div>
                    <div class="info-order">
                        <div class="row1">
                            <div class="cel">Tổng tiền lấy <span class="txt-bold">{{ $count_product }}</span> phần
                            </div>
                            <div class="cel-auto txt-bold">{{ number_format($total_product) }} <span class="unit">đ</span>
                            </div>
                        </div>
                        <div class="row1">
                            <div class="cel">Phí vận chuyển: <span
                                        class="txt-red" id="in_kilo1"></span><span
                                        class="show1-fee-min">&nbsp;</span>
                            </div>
                            <div class="cel-auto"><span></span>{{ number_format($money_transport_fee) }} <span class="unit">đ</span>
                            </div>
                        </div>
                    </div>
                    <div class="note-order "></div>
                    <div class="pedding-10 txt-bold font16">
                        <div class="row1">
                            <div class="cel"><span>Tổng tiền giao hàng</span></div>
                            <div class="cel-auto"><span>{{number_format($total) }} </span><span class="unit">đ</span></div>
                        </div>
                    </div>
                    <div class="payment-methods">
                        <div class="row1">
                            <div class="cel"><span class="txt-bold font16 txt-black">Kiểu thanh toán</span>
                            </div>
                            <div class="cel-auto"><span class="txt-blue">
                                    Trực tiếp
                                </span><i class="icon-arrow-thin right" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>

                    <div class="not-vat"><span class="icon icon-vatnot"></span><span 
                        class="txt-gray">Hóa đơn VAT không dược cung cấp</span>
                    </div>
                </div>
            </div>
            <div class="model-footer">
                
                <a href="{{ $url }}" title="chọn để tới bảng hướng dẫn đường đi" style="width: 885px" target="_blank"><div class="submit-order">CHỈ ĐƯỜNG ĐI</div></a>
                
            </div>
        </div>
     </div>
</div>

<div class="row" style="margin-bottom: 375px">
    
</div>
<!-- end model -->  

    

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
      var map;
      function initMap() {
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: {lat: 16.0544068, lng: 108.2021667},
          disableDefaultUI: true
        });
        
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('right-panel'));

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
          test(directionsService, directionsDisplay);
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
            var i = new google.maps.InfoWindow();
            var myin_kilo = document.getElementById('in_kilo');
            //dt = in_kilo.innerHTML();
            document.getElementById('in_kilo').innerHTML= dt;
            document.getElementById('in_kilo1').innerHTML=dt;
            //var total_price = so * total;
            
          }
        })
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }

        function khoangcach(){
            var start = document.getElementById('start').value;
            var end = document.getElementById('end').value;
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [start],
                destinations: [end],
                travelMode: 'DRIVING',
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false
                }, callback);
        }
        function callback(reponse, status){
            if(status != google.maps.DistanceMatrixStatus.OK){
                $('#result').html(err);
            } else {
                var start = reponse.originAddresses[0];
                var end = reponse.destinationAddresses[0];
                if(response.rows[0].element[0].status === "ZERO_RESULTS"){
                    $('#result').html("a" + start + "and" + end);
                } else {
                    var distance = reponse.rows[0].element[0].distance;
                    var duration = reponse.rows[0].element[0].duration;
                    console.log(reponse.rows[0].element[0].distance);
                    var distance_in_kilo = distance.value / 1000;
                    var duration_text = duration.text;
                    var duration_value = duration.value;
                    $('in_kilo').text(distance_in_kilo.toFixed(2));
                }
            }
        }
        $('#distance_form').submit(function(e){
            e.preventDefault();
            khoangcach();
        });
      // Get the model
        var model = document.getElementById('myModel');

        // Get the button that opens the model
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the model
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the model
        btn.onclick = function () {
            model.style.display = "block";
            console.log("cc");
            }
        // When the user clicks on <span> (x), close the model
        span.onclick = function () {
            model.style.display = "none";
            initMap();
        }

        // When the user clicks anywhere outside of the model, close it
       window.onclick = function (event) {
            if (event.target == model) {
                model.style.display = "none";
            }
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVq1eRO3SMYnmnXu213mAa9hTj_B7EMcI&callback=initMap"
    async defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection