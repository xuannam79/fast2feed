@extends('templates.f2f.master')
@section('title')
    Tài khoản cá nhân
@endsection
@section('content')
   
    <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding" style="margin-top: 15px;">
        		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 clearpaddingl">
    				<div class="panel panel-info">
			        	<div class="panel-body" style="padding:0px">
			           		<div class="list-group">
				                <p href="#" class="list-group-item" position: relative style="font-size: 16px; font-weight: bold; text-align: center; background: #4C66A4; color: white">Thông tin tài khoản</p>
				                <a href="{{ route('trangQLTKShipper') }}" class="list-group-item">Cập nhật thông tin</a>
				                <a href="{{ route('trangDoiMKShipper') }}" class="list-group-item">Đổi mật khẩu</a>
						        <a href="{{ route('trangTaiSanShipper') }}" class="list-group-item">Tài khoản cá nhân</a>
						        <a href="{{ route('trangDeliveryHistoryShipper') }}" class="list-group-item">Lịch sử giao hàng</a>
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
				                <p class="list-group-item" position: relative style="font-size: 16px;font-weight: bold; text-align: center; background: #4C66A4; color: white">TÀI KHOẢN CÁ NHÂN</p>
				                <p style="margin-top: 10px">Xin chào,<strong style="font-size: 20px">Võ Văn An</strong></p>
				                <p>Trạng thái: <i style="color: blue">đã kích hoạt</i></p>
				                <div style="margin: 0 auto;width: 339px; height: 225px;background-image: url('/fast2feed/public/files/shipper/the-ngan-hang1.png');background-repeat: no-repeat;background-size: 339px 220px ">
				                	<img src="/fast2feed/public/templates/f2f/images/f2f.png" alt="" width="50" height="30" style="margin-top: 15px;margin-left: 15px ">
				                	<strong style="font-weight: normal;padding-left: 160px; color: #DCDCDC"><strong style="color: white"><i class="glyphicon glyphicon-send" style="color: orange"></i> TANQ</strong>Bank</strong>
				                	<p style="padding-top: 65px; color: white; padding-left: 20px"><strong style="font-size: 25px">5214269850013457</strong><br><br>
				                		<strong style="font-size: 12px"><strong style="color: yellow">EXP</strong> 05/2020</strong><br>
				                		VO VAN AN
				                	</p>
				                	
				                </div>
				                <p style="color: red; text-align: center;">Số dư thẻ: <strong>500.000</strong> VNĐ</p>
			            	</div>
			        	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
