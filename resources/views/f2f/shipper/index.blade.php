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
        <div class="row">
        <div class="order_panel order_panel_info">
            <div class="order">
                <h1 class="order_title mb-4 text-center" style="font-size: 20px">Hóa đơn đã nhận</h1>
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
                            @foreach($getAllDanhSachHD as $key => $value)
                            @php
                                $order = $value->order_id;
                                $address = $value->address;
                                $address_cus = $value->address_res;
                                $name_res = $value->customer_name;
                                $slug = str_slug($name_res); 
                                $name_cus = $value->restaurant_name;
                                $phone = $value->phone_res;
                                $status = $value->status;
                                $status_2 = $value->status_2;
                                $transport_fee = $value->transport_fee;
                                $count_product = 0;
                                $total_product=0;
                                $url = route('trangDetailShipper',['slug' => $slug, 'order' => $order])
                            @endphp
                                @foreach($getAmountProduct as $key => $value)
                                @php
                                    $sanpham = $value->order_id;
                                    if($order == $sanpham){
                                        $product_name = $value->product_name;
                                        $amount = $value->amount;
                                        $price = $value->price;
                                        $total = $amount * $price;
                                        $total2 = number_format($total);
                                        $count_product += $amount;
                                        $total_product = $total_product + $total;
                                    }   
                                    else continue;
                                @endphp
                                @endforeach
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td style="padding-left: 40px">{{ $order }}</td>
                                <td>{{ $address }}</td>
                                <td>{{ $address_cus }}</td>
                                <td>
                                    @if($status_2 == 1)
                                    Đang giao
                                    @elseif($status_2 == 0)
                                    Đã hủy
                                    @else
                                    Đã giao
                                    @endif
                                </td>
                                <td>
                                    @if($status_2 == 1)
                                    <a href="{{ $url }}" style="color: black"><button title="Nhấn vào để xem chi tiết" class="font_weight_bold order_table_status gray pointer" style="width: 70px;float: left;">Xem
                                    </button>
                                    </a>
                                    @else
                                    @endif                
                                </td>
                                <td>
                                    @if($status_2 == 1)
                                    <form action="{{ route('trangShipper') }}" method="post">
                                        {{  csrf_field() }}
                                        <input type="hidden" name="orderID" value="{{  $order }}">
                                        <button type="submit" title="Nhấn vào để hủy đơn hàng"
                                                class="order_table_status gray pointer" style="width: 80px; float: right;">Hủy
                                        </button>
                                    </form>
                                    
                                    @else
                                    @endif
                                </td>
                                <td>
                                    @if($status_2 == 1)
                                    <form action="{{ route('functionDelivered') }}" method="post">
                                        {{  csrf_field() }}
                                        <input type="hidden" name="orderID" value="{{  $order }}">
                                        <button type="submit" title="Nhấn vào khi đã giao hàng"
                                                class="order_table_status gray pointer" style="width: 80px; float: right;">Đã giao
                                        </button>
                                    </form>
                                    
                                    @else
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

    <div class="row" style="margin-top: 15px">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.12085798816!2d108.20519251494088!3d16.05921698888712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219b15a13c381%3A0x2a8f705f1bfbf085!2zMjU0IE5ndXnhu4VuIFbEg24gTGluaCwgVGjhuqFjIEdpw6FuLCBUaGFuaCBLaMOqLCDEkMOgIE7hurVuZyA1NTAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1541927221492" width="1169" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            
    </div>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzmyhWaNEQ_i55-LLOfNPka-8BAhZRUaM&callback=initMap"
    async defer></script>

@endsection
