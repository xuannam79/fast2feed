@extends('templates.f2f.master')
@section('title')
    Thông tin tài khoản
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
							@php
								$username = $getAccountInfo[0]->username;
								$email = $getAccountInfo[0]->email;
								$avatar = $getAccountInfo[0]->avatar;
								$phone = $getAccountInfo[0]->phone;
								$address = $getAccountInfo[0]->address;
								$birthday = $getAccountInfo[0]->birthday;
							@endphp
			           		<div class="list-group">
				                <p href="#" class="list-group-item" position: relative style="font-size: 16px;font-weight: bold; text-align: center; background: #4C66A4; color: white">Thông tin cá nhân</p>
				                
				                <div  style="margin: 10px;height: 300px">
				                	<div style=" float: right; margin-top: 30px; margin-right: 70px">
				                		<img src="/fast2feed/public/files/account/{{ $avatar }}" alt="" width="200" height="200">
						                </div>
				                	
				                	<br>
				                <strong>Username:</strong> <span>{{ $username }}</span>
				                <br>
				                <br>
								<strong>Ngày sinh:</strong> <span>{{ $birthday }}</span>
				                <br>
								<br>
								<strong>Email:</strong> <span>{{ $email }}</span>
				                <br>
								<br>
								<strong>Số điện thoại:</strong> <span>{{ $phone }}</span>
				                <br>
								<br>
								<strong>Địa chỉ:</strong> <span>{{ $address }}</span>
				                <br>
								<br>
								</div>
			            	</div>
			        	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="/js/jquery.min.js" type="text/javascript"></script>
	<script src="/js/ajaxupload.js" type="text/javascript"></script>
@endsection
