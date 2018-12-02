@extends('templates.f2f.master')
@section('title')
    Đổi mật khẩu
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
				                <p href="#" class="list-group-item" position: relative style="font-size: 16px;font-weight: bold; text-align: center; background: #4C66A4; color: white">ĐỔI MẬT KHẨU</p>
				                
				                
				                <div style="margin: 10px">
				                	
				                	<form action="#" method="post">
                                	{{ csrf_field() }}
										<strong>Mật khẩu hiện tại:</strong>
										<input type="password" name="pass" style="margin-left: 56px; margin-top: 10px; width: 300px" value="">
										<br>
										<strong style="margin-right: 73px">Mật khẩu mới</strong>
										<input type="password" name="newpass" style="margin-left: 9.5px; margin-top: 10px; width: 300px" value="">
										<br>
										<strong>Nhập lại mật khẩu:</strong>
										<input type="password" name="repass" style="margin-left: 48px; margin-top: 10px; width: 300px" value="">
										<br>
										<input type="submit" name="submit" value="Cập nhật" 
									style="margin-top: 15px; float: right; margin-right: 365px; background: #4C66A4; color: white; width: 100px; height: 35px">	
				                	</form>
					                
									
								</div>
			            	</div>
			        	</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
