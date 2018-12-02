@extends('templates.f2f.master')
@section('title')
    Trang chủ shipper
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
				                <p href="#" class="list-group-item" position: relative style="font-size: 16px;font-weight: bold; text-align: center; background: #4C66A4; color: white">Cập nhật thông tin cá nhân</p>
				                <div style="width: 120px;height: 110px; float: right; margin-top: 30px; margin-right: 50px">
				                	<img src="/fast2feed/public/files/account/khach1.jpg" alt="" width="100" height="100">
				                	<input type="file" name="">
				                </div>
				                Họ và tên: 
				                <input type="text" name="ten" style="margin-left: 30px; margin-top: 10px; width: 300px"><br>
								Ngày sinh: 
								<input type="text" name="ten" style="margin-left: 28.5px; margin-top: 10px; width: 300px"><br>
								Email: 
								<input type="text" name="ten" style="margin-left: 56px; margin-top: 10px; width: 300px"><br>
								Số điện thoại: 
								<input type="text" name="ten" style="margin-left: 9.5px; margin-top: 10px; width: 300px"><br>
								Địa chỉ: 
								<input type="text" name="ten" style="margin-left: 48px; margin-top: 10px; width: 300px"><br>
								<input type="submit" name="submit" value="Cập nhật" 
								style="margin-top: 15px; float: right; margin-right: 30px; background: #4C66A4; color: white; width: 100px; height: 35px">
			            	</div>
			        	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
