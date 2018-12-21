<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta http-equiv="refresh" content="number"> --}}
    
    <script src="/templates/f2f/js/jquery-3.1.1.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/templates/f2f/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/templates/f2f/bootstrap/css/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="/templates/f2f/css/style.css">
    <link rel="stylesheet" type="text/css" href="/templates/f2f/css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVq1eRO3SMYnmnXu213mAa9hTj_B7EMcI&callback=initMap"
    async defer></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    <style>
        
</style>
</head>

<body onload="initialize()">
    {{-- script loader page --}}
        <script>
            $('body').append('<div style="" id="loadingDiv"><div class="loader"></div></div>');
            $(window).on('load', function(){
              setTimeout(removeLoader, 200); //wait for page load PLUS two seconds.
            });
            function removeLoader(){
                $( "#loadingDiv" ).fadeOut(500, function() {
                  // fadeOut complete. Remove the loading div
                  $( "#loadingDiv" ).remove(); //makes page more lightweight 
              });  
            }
        </script>
    <div class="container">
        <a href="{{ route('trangChu') }}" title=""><img src="/templates/f2f/images/f2f.png" alt="" width="290px" height="145px"></a>
        <a href="#" title=""><img src="/templates/f2f/images/banner.gif" alt="" width="845px" height="110px"></a>
        <div class="row">
            <nav class="navbar navbar-info re-navbar" style="margin-top: 10px">
                <div class="container-fluid re-container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">--- Menu ---</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse re-navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="{{ route('trangChu') }}">Fast2Feed.vn</a></li>
                            <li><a href="{{ route('trangAllDanhMuc') }}">Tất cả</a></li>
                            @foreach($getCatOffset0 as $key => $catOffset0)
                                @php
                                    $idCatOffset0 = $catOffset0->catalog_id;
                                    $slug = str_slug($catOffset0->catalog_name);
                                    $nameCatOffset0 = title_case($catOffset0->catalog_name);
                                @endphp
                                @if($catOffset0->status == 1)
                                <li><a href="{{ route('trangDanhMuc', ['slug' => $slug, 'cid' => $idCatOffset0]) }}">{{ $nameCatOffset0 }}</a></li>
                                @endif
                            @endforeach
                            <li>
                                <a href="#">...</a>
                                <ul class="sub-menu">
                                    @foreach($getCatOffset2 as $key => $catOffset2)
                                    @php
                                        $idCatOffset2 = $catOffset2->catalog_id;
                                        $slug2 = str_slug($catOffset2->catalog_name);
                                        $nameCatOffset2 = title_case($catOffset2->catalog_name);
                                    @endphp
                                    @if($catOffset2->status == 1)
                                        <li><a href="{{ route('trangDanhMuc', ['slug' => $slug2, 'cid' => $idCatOffset2]) }}">{{ $nameCatOffset2 }}</a>
                                        </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                            @if(session()->has('admin')) @php $role = session()->get('admin')[0]->role; if($role == 3){ $url1 = route('trangDanhSachHD'); $url2 = route('trangShipper'); echo '
                            <li><a href="'.$url1.'">Danh sách hóa đơn</a></li>
                            '; echo '
                            <li><a href="'.$url2.'">Hóa đơn đã nhận</a></li>
                            '; } @endphp @endif @if(session()->has('admin')) @php $role = session()->get('admin')[0]->role; @endphp @if($role == 3)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-bell"><span class="badge">1</span></span><span class="caret"></span></a>
                                <ul class="dropdown-menu" style="width: 250px;">
                                    <div class="table-responsive" style="width: 250px">
                                        <div class="dsHoadon-head">
                                            <span>Bạn có 1 thông báo mới</span>
                                        </div>
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="background-color: white;font-size: 15px;border:none;width: 248px;">
                                            <div class="dsHoadon-body">
                                                <i class="material-icons" style="font-size:36px;color: #00AD5F">sms</i>
                                                <div class="dsHoadon-body-content">
                                                    <p>
                                                        Có 1 hóa hóa đơn gần bạn
                                                        <br>
                                                        <span>10/04/2018 07:39</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </ul>
                            </li>
                            @endif @endif
                            <!-- Modal thông báo order -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content" style="width: 193%;right:285px;">
                                        <div class="order_list">
                                            <table class="table table-data2">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th style="width: 100px">Mã hóa đơn</th>
                                                        <th style="width: 310px">Nơi nhận hàng</th>
                                                        <th style="width: 310px">Nơi giao hàng</th>
                                                        <th style="width: 150px">Trạng thái</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>21</td>
                                                        <td>146 Nguyễn hữu Thọ, Q.Hải Châu, Đà Nẵng</td>
                                                        <td>151 Tiểu La, Đà Nẵng</td>
                                                        <td>Còn 10 phút</td>
                                                        <td>
                                                            <a href="#" style="color: black"><button title="Nhấn vào để xem chi tiết" class="font_weight_bold order_table_status gray pointer" id="myBtn"style="width: 70px;float: left;" >Xem
                                                            </button></a>
                                                        </td>
                                                        <td>
                                                            <form action="#" method="post">
                                                              <input type="hidden" name="orderID" value="">
                                                              
                                                            <button type="submit" title="Nhấn vào để nhận đơn hàng"
                                                                        class="order_table_status gray pointer" style="width: 105px; float: right;">Nhận đơn
                                                            </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>    
                                        </div>
                                    </div>
                                </div>
                                {{-- end modal --}}

                        </ul>
                        @php
                        @endphp
                        <ul class="nav navbar-nav navbar-right">
                            @if(session()->has('admin')) @php $role = session()->get('admin')[0]->role; if($role == 2){ $url = route('trangpostProduct'); echo '
                            <li><a href="'.$url.'">Đăng sản phẩm</a></li>'; } @endphp @endif @if(session()->has('admin')) @foreach($getAdmin as $key => $admin)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
                               <img src="/files/account/{{ $admin->avatar }}" alt="" width="20px" height="20px">
                               <span>{{ $admin->username }}</span>
                               <span class="caret"></span>
                               </a>
                                <ul class="dropdown-menu" style="width: 250px;">
                                    <div class="table-responsive" style="width: 250px">
                                        <div class="account">
                                            <div class="account-head" style="padding-left: 10px">
                                                <div class="account-head-img">
                                                    <img src="/files/account/{{ $admin->avatar }}" alt="" width="60px" height="60px">
                                                </div>
                                                <div class="account-head-info">
                                                    <p><strong>{{ $admin->username }}</strong></p>
                                                    <span style="color: #9F9F9C;">{{ $admin->email }}</span>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div style="border-top: 1px solid #F8F8F8;border-bottom: 1px solid #F8F8F8;">
                                                @php
                                                    if(session()->get('admin')[0]->role == 3){
                                                        $routeInfo = route('trangInfoShipper');
                                                    }else{
                                                        $routeInfo = route('trangTTtaikhoan');
                                                    }
                                                @endphp
                                                
                                                <a href="{{ $routeInfo }}" title="">
                                                    <div class="account-body">
                                                        <strong><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Thông tin tài khoản</strong>
                                                    </div>
                                                </a>
                                                <a href="#" title="">
                                                    <div class="account-body">
                                                        <strong><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Tổng tiền</strong>
                                                    </div>
                                                </a>
                                            </div>
                                            @if (Session::has('msg'))
                                            <script type="text/javascript">
                                                alert("{{ Session::get('msg') }}");
                                            </script>
                                            @endif
                                            <div class="account-foot">
                                                <a href="#" title="">
                                                    <a href="{{ route('trangDangXuat') }}" title="">
                                                        <div class="account-body">
                                                            <strong><i class="fa fa-power-off"></i>&nbsp;Đăng xuất</strong>
                                                        </div>
                                                    </a>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                            @endforeach @else()
                            <li><a href="{{ route('trangDangNhap') }}">Đăng nhập</a></li>
                            @endif @if(!session()->has('admin'))
                            <li><a href="{{ route('trangDangKiShipper') }}">Trở thành shipper</a></li>
                            @endif
                            <li><a href="#">Tải App</a></li>

                            
                             

                        </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-fluid -->
            </nav>
            </div>
            {{-- script dropdown button --}}
            <script>
            function myFunction() {
                document.getElementById("myDropdown").classList.toggle("show");
            }

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
              if (!event.target.matches('.dropbtnInfo')) {

                var dropdowns = document.getElementsByClassName("dropdownInfo-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                  }
                }
              }
            }
            </script>
            <script language="JavaScript">
            window.onbeforeunload = WindowCloseHanlder;
            function WindowCloseHanlder()
            {
            window.alert('My Window is reloading');
            }
            </script>  
            <!-- Kết thúc header -->

