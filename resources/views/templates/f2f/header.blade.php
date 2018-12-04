<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <script src="/fast2feed/public/templates/f2f/js/jquery-3.1.1.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/fast2feed/public/templates/f2f/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/fast2feed/public/templates/f2f/bootstrap/css/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="/fast2feed/public/templates/f2f/css/style.css">
    <link rel="stylesheet" type="text/css" href="/fast2feed/public/templates/f2f/css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="container">
        <a href="{{ route('trangChu') }}" title=""><img src="/fast2feed/public/templates/f2f/images/f2f.png" alt="" width="290px" height="145px"></a>
        <a href="#" title=""><img src="/fast2feed/public/templates/f2f/images/banner.gif" alt="" width="845px" height="110px"></a>
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
                            <li><a href="{{ route('trangDinhViMap') }}">Tất cả</a></li>
                            @foreach($getCatOffset0 as $key => $catOffset0)
                                @php
                                    $nameCatOffset0 = title_case($catOffset0->catalog_name);
                                @endphp
                                <li><a href="{{ route('trangDanhMuc') }}">{{ $nameCatOffset0 }}</a></li>
                            @endforeach
                            <li>
                                <a href="#">...</a>
                                <ul class="sub-menu">
                                    @foreach($getCatOffset2 as $key => $catOffset2)
                                    @php
                                        $nameCatOffset2 = title_case($catOffset2->catalog_name);
                                    @endphp
                                        <li><a href="{{ route('trangDanhMuc') }}">{{ $nameCatOffset2 }}</a></li>
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
                                    <div class="modal-content" style="width: 175%;right:226px;">
                                        <div class="order_list">
                                            <div class="order_list_heading order_table_row">
                                                <div class="order_table_cell order_list_row_col1">STT
                                                </div>
                                                <div class="order_table_cell order_list_row_col2">Nơi nhận hàng
                                                </div>
                                                <div class="order_table_cell order_list_row_col3">Nơi giao hàng
                                                </div>
                                                <div class="order_table_cell order_list_row_col4">Tiền nhận hàng
                                                </div>
                                                <div class="order_table_cell order_list_row_col5">Tiền giao hàng
                                                </div>
                                                <div class="order_table_cell order_list_row_col6">Trạng thái
                                                </div>
                                                <div class="order_table_cell order_list_row_col7">
                                                </div>
                                                <div class="order_table_cell order_list_row_col8">
                                                </div>
                                            </div>
                                            <div class="order_table_row">
                                                <div class="order_table_cell order_list_row_col1">01
                                                </div>
                                                <div class="order_table_cell order_list_row_col2">134 Hoàng Diệu, P.2, Q. Hải Châu, TP.Đà Nẵng
                                                </div>
                                                <div class="order_table_cell order_list_row_col3">148 Tiểu La, P.3, Q. Hải Châu, TP.Đà Nẵng
                                                </div>
                                                <div class="order_table_cell order_list_row_col4">95.000đ
                                                </div>
                                                <div class="order_table_cell order_list_row_col5">116,000đ
                                                </div>
                                                <div class="order_table_cell order_list_row_col6">Còn 5 phút
                                                </div>
                                                <div class="order_table_cell order_list_row_col7">
                                                    <button title="Nhấn vào để xem chi tiết" class="font_weight_bold order_table_status gray pointer" id="oderNoti">Xem
                                                    </button>
                                                    <div class="order_table_cell order_list_row_col8">
                                                        <button title="Nhấn vào để nhận đơn hàng" class="order_table_status gray pointer" style="width: 100px">Nhận đơn
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end modal --}}

                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Tải App</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"><span class="badge">1</span></span> Giỏ Hàng<span class="caret"></span></a>
                                <ul class="dropdown-menu" style="width: 350px;">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Ảnh</th>
                                                    <th>LS</th>
                                                    <th>Tên <span></span></th>
                                                    <th>Giá</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> <img style="height: 30px;width: 40px;border-radius: 30%;" src="https://media.foody.vn/res/g19/184588/prof/s/foody-mobile-main-avatar-foody-ap.jpg" alt=""></td>
                                                    <td>1</td>
                                                    <td>Trà sữa</td>
                                                    <td>30.000 VNĐ</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <a href="{{ route('trangGioHang') }}" type="button" class="btn btn-success"> Chi Tiết Giỏ Hàng </a>
                                        <a href="#" type="button" class="btn btn-danger pull-right"> Xóa </a>
                                    </div>
                                </ul>
                            </li>
                            @if(session()->has('admin')) @php $role = session()->get('admin')[0]->role; if($role == 2){ $url = route('trangpostProduct'); echo '
                            <li><a href="'.$url.'">Đăng sản phẩm</a></li>'; } @endphp @endif @if(session()->has('admin')) @foreach($getAdmin as $key => $admin)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
               <img src="/fast2feed/public/files/account/{{ $admin->avatar }}" alt="" width="20px" height="20px">
               <span>{{ $admin->username }}</span>
               <span class="caret"></span>
               </a>
                                <ul class="dropdown-menu" style="width: 250px;">
                                    <div class="table-responsive" style="width: 250px">
                                        <div class="account">
                                            <div class="account-head">
                                                <div class="account-head-img">
                                                    <img src="/fast2feed/public/files/account/{{ $admin->avatar }}" alt="" width="60px" height="60px">
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
                        </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-fluid -->
            </nav>
            </div>
            <script language="JavaScript">
window.onbeforeunload = WindowCloseHanlder;
function WindowCloseHanlder()
{
window.alert('My Window is reloading');
}
</script>  
            <!-- Kết thúc header -->

