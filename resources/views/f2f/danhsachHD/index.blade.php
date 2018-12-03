@extends('templates.f2f.master')
@section('title')
Trang chủ shipper
@endsection
@section('content')
<div class="row" style="margin-top: 20px">
   <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
         <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
         <li data-target="#carousel-example-generic" data-slide-to="1"></li>
         <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
         <div class="item active">
            <img src="/fast2feed/public/templates/f2f/images/slide/slide6.jpg" alt="" style="width: 1169px;height: 300px">
            <div class="carousel-caption">
            </div>
         </div>
         <div class="item">
            <img src="/fast2feed/public/templates/f2f/images/slide/slide7.jpg" alt="" style="width: 1169px;height: 300px">
            <div class="carousel-caption">
            </div>
         </div>
         <div class="item">
            <img src="/fast2feed/public/templates/f2f/images/slide/slide8.jpg" alt="" style="width: 1169px;height: 300px">
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
<div onload="initialize()" class="row">
        <div class="order_panel order_panel_info">
            <div class="order">
                <h1 class="order_title mb-4 text-center" style="font-size: 20px">Danh sách hóa đơn</h1>
                <div class="order_table">
                    <div class="order_list">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã hóa đơn</th>
                                    <th style="width: 310px">Nơi nhận hàng</th>
                                    <th style="width: 310px">Nơi giao hàng</th>
                                    <th style="width: 150px">Trạng thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($getTransactionHistory as $key => $value)
                                @php
                                    $order = $value->order_id;
                                    $address = $value->address_res;
                                    $address_cus = $value->address;
                                    $status = $value->status;
                                @endphp
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td style="padding-left: 40px">{{ $order }}</td>
                                    <td>{{ $address }}</td>
                                    <td>{{ $address_cus }}</td>
                                    <td>
                                        @if($status == 1)
                                        Còn 10 phút
                                        @else
                                        Đã hủy
                                        @endif
                                    </td>
                                    <td>
                                        @if($status == 1)
                                        <button title="Nhấn vào để xem chi tiết"
                                        class="font_weight_bold order_table_status gray pointer" id="myBtn"
                                        style="width: 70px;float: left;">Xem
                                        </button>

                                <div id="myModel" class="model">

                                    <!-- model content -->
                                    <div id="myModel" class="model fade1 model-order show1" id="model-order"
                                         tabindex="-1"
                                         role="dialog" data-backdrop="static" data-keyboard="false"
                                         style="padding-right: 16px; display: block;">
                                        <div class="model-dialog model-dialog-centered" role="document">
                                            <div class="model-content model-order-detail"><span id="x" class="close"
                                                                                                data-dismiss="model">x</span>
                                                <div class="model-header">Chi tiết hóa đơn</div>
                                                <div class="model-body">
                                                    <div class="order-left">
                                                        <div id="map" class="map-order">
                                                            
                                                        </div>
                                                        <div class="direction-content">
                                                            <div class="direction-info">
                                                                <div class="direction-from">
                                                                    <div class="direction-name">Điểm lấy hàng - tên quán
                                                                    </div>
                                                                    <input id="start" type="hidden" value="{{ $address }}" style="width: 300px">
                                                                    {{ $address }}
                                                                </div>
                                                                <div class="direction-to">
                                                                    <div class="">
                                                                        <div class="direction-name"
                                                                             id="shipping-address">
                                                                            <span>Điểm giao hàng - tên khách</span><span> - phone </span>
                                                                        </div>
                                                                        <input id="end" type="hidden" value="{{ $address_cus }}" style="width: 300px">
                                                                        {{ $address_cus }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="direction-time"><span class="fa"><i
                                                                                class="far fa-clock"></i></span><span
                                                                            class="txt-bold"> Thời gian giao:  15:35 - 24/10 - </span><span id="abc"
                                                                            class="txt-red">km</span></div>
                                                                <div id="submit" class="change-info">Hiển thị khoảng cách trên bản đồ
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="order-right"><p class="title-popup-order">Thông tin sản
                                                            phẩm</p>
                                                        <div class="order-list">
                                                            <div class="order-item">
                                                                @foreach($getAmountProduct as $key => $value)
                                                                @php
                                                                    $product_name = $value->product_name;
                                                                    $amount = $value->amount;
                                                                @endphp
                                                                <span class="order-item-number">{{ $amount }}</span>
                                                                <div class="order-item-info">
                                                                    <div class="order-item-name"><span class="txt-bold">{{ $product_name }}&nbsp;</span>
                                                                
                                                                    </div>
                                                                    <div class="order-item-note"></div>
                                                                </div>
                                                                <div class="order-item-price">54000 <span class="unit">đ</span>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="info-order">
                                                            <div class="row1">
                                                                <div class="cel">Tổng tiền lấy <span
                                                                            class="txt-bold">2</span>
                                                                    sản phẩm
                                                                </div>
                                                                <div class="cel-auto txt-bold">95,000 <span
                                                                            class="unit">đ</span></div>
                                                            </div>
                                                            <div class="row1">
                                                                <div class="cel">Phí vận chuyển: <span
                                                                            class="txt-red">3.0km</span><span
                                                                            class="show1-fee-min">&nbsp;</span>
                                                                </div>
                                                                <div class="cel-auto">21,000 <span class="unit">đ</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="note-order "></div>
                                                        <div class="pedding-10 txt-bold font16">
                                                            <div class="row1">
                                                                <div class="cel"><span>Tổng tiền giao hàng</span></div>
                                                                <div class="cel-auto"><span>116,000 </span><span
                                                                            class="unit">đ</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="payment-methods">
                                                            <div class="row1">
                                                                <div class="cel"><span
                                                                            class="txt-bold font16 txt-black">Kiểu thanh toán</span>
                                                                </div>
                                                                <div class="cel-auto"><span
                                                                            class="txt-blue">
                                                                        Trực tiếp
                                                                    </span><i
                                                                            class="icon-arrow-thin right"
                                                                            aria-hidden="true"></i></div>
                                                            </div>
                                                        </div>

                                                        <div class="not-vat"><span class="icon icon-vatnot"></span><span
                                                                    class="txt-gray">Hóa đơn VAT không dược cung cấp</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="model-footer">
                                                    <div class="submit-order">NHẬN</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button title="Nhấn vào để nhận đơn hàng"
                                        class="order_table_status gray pointer" style="width: 105px; float: right;">Nhận đơn
                            </button>
                            @else
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                       <div class="pagination" style="float: right;margin-top: 30px; margin-right: 10px">
                                {{ $getTransactionHistory->links() }}
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 15px">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.12085798816!2d108.20519251494088!3d16.05921698888712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219b15a13c381%3A0x2a8f705f1bfbf085!2zMjU0IE5ndXnhu4VuIFbEg24gTGluaCwgVGjhuqFjIEdpw6FuLCBUaGFuaCBLaMOqLCDEkMOgIE7hurVuZyA1NTAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1541927221492" width="1169" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            
    </div>
    

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
        
      // Get the model
        var model = document.getElementById('myModel');

        // Get the button that opens the model
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the model
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the model
        btn.onclick = function () {
            model.style.display = "block";
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzmyhWaNEQ_i55-LLOfNPka-8BAhZRUaM&callback=initMap"
    async defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection