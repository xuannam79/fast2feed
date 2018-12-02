@extends('templates.f2f.master')
@section('title')
    Kiểu thanh toán
@endsection
@section('content')
   <style>
		.list-group-item a:hover{
			color: green;
		}

	</style>
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
			           		<div class="list-group">
				                <p href="#" class="list-group-item" position: relative style="font-size: 16px;font-weight: bold; text-align: center; background: #4C66A4; color: white">CHỌN PHƯƠNG THỨC THANH TOÁN</p>
				                
								<div class="list-group">
									<a href="#" class="list-group-item">Thanh toán trực tiếp<i class="glyphicon glyphicon-edit" style="float: right;"></i></a>
				                	<a href="#" class="list-group-item">Thẻ ATM nội địa</a>
						        	<a href="#" class="list-group-item">Pay Pal</a>
								</div>
										
									
			            	</div>
			        	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
