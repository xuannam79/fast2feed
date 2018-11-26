@extends('templates.f2f.master')
@section('title')
    Cập nhật tài khoản
@endsection
@section('content')
   
    <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding" style="margin-top: 15px;">
        		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 clearpaddingl">
    				<div class="panel panel-info">
			        	<div class="panel-body" style="padding:0px">
			           		<div class="list-group">
				                <p href="#" class="list-group-item" position: relative style="font-size: 16px; font-weight: bold; text-align: center; background: #4C66A4; color: white">Thông tin tài khoản</p>
				                <a href="#" class="list-group-item">Cập nhật thông tin</a>
				                <a href="#" class="list-group-item">Đổi mật khẩu</a>
						        <a href="#" class="list-group-item">Kiểu thanh toán</a>
						        <a href="#" class="list-group-item">Đăng sản phẩm</a>
						        <a href="#" class="list-group-item">Lịch sử đặt hàng</a>
						        <a href="#" class="list-group-item">Lịch sử đăng hàng</a>
						        <a href="#" class="list-group-item">Đăng xuất</a>
			            	</div>
			        	</div>
			    	</div>
				</div>
    		
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 clearpaddingr">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
					<div class="panel panel-info">
						<div class="panel-body" style="padding:0px">
			           		<div class="list-group">
				                <p href="#" class="list-group-item" position: relative style="font-size: 16px;font-weight: bold; text-align: center; background: #4C66A4; color: white">Cập nhật thông tin cá nhân</p>
				                
				                @foreach($getAccountInfo as $key => $info)
								@php
									$username = $info->username;
									$email = $info->email;
									$avatar = $info->avatar;
									$phone = $info->phone;
									$address = $info->address;
									$birthday = explode('-', $info->birthday);
									$year = $birthday[0];
									$month = $birthday[1];
									$day = $birthday[2];
									$now = getdate();
								@endphp
				                <div style="margin: 10px">
				                	@if ($errors->any())
			                            @foreach ($errors->all() as $error)
			                                <script type="text/javascript">alert("{{ $error }}");</script>
			                            @endforeach
			                        @endif
				                	<form action="{{ route('trangCapNhatTK') }}" enctype="multipart/form-data" method="post">
                                	{{ csrf_field() }}
										<div style="float: right; margin-top: 30px; margin-right: 70px">
						                	<img src="/fast2feed/public/files/account/{{$avatar}}" alt="" width="200" height="200">
						                	<input type="file" name="avatar">
						                </div>
				                		<strong>Username:</strong>
						                <input type="text" name="username" style="margin-left: 30px; margin-bottom: 10px; width: 300px" value="{{ $username }}" readonly>
						                <br>
										<strong>Ngày sinh:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="number" name="year" min="1880" max="{{ $now["year"] }}" value="{{ $year }}">
										<input type="number" name="month" min="1" max="12" value="{{ $month }}">
										<input type="number" name="day" min="1" max="31" value="{{ $day }}">
										<br>
										<strong>Email:</strong>
										<input type="text" name="email" style="margin-left: 56px; margin-top: 10px; width: 300px" value="{{ $email }}">
										<br>
										<strong>Số điện thoại:</strong>
										<input type="text" name="phone" style="margin-left: 9.5px; margin-top: 10px; width: 300px" value="{{ $phone }}">
										<br>
										<strong>Địa chỉ:</strong>
										<input type="text" name="address" style="margin-left: 48px; margin-top: 10px; width: 300px" value="{{ $address }}">
										<input type="submit" name="submit" value="Cập nhật" 
									style="margin-top: 15px; float: right; margin-right: 30px; background: #4C66A4; color: white; width: 100px; height: 35px">	
				                	</form>
					                
									
								</div>
								@endforeach
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
