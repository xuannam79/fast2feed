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
				                <a href="{{ route('trangCapNhatTK') }}" class="list-group-item">Cập nhật thông tin</a>
				                <a href="{{ route('trangDoiMK') }}" class="list-group-item">Đổi mật khẩu</a>
						        <a href="#" class="list-group-item">Kiểu thanh toán</a>
						        <a href="#" class="list-group-item">Đăng sản phẩm</a>
						        <a href="#" class="list-group-item">Lịch sử đặt hàng</a>
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
				                <p href="#" class="list-group-item" position: relative style="font-size: 16px;font-weight: bold; text-align: center; background: #4C66A4; color: white">Quản Lý Bài Đăng</p>
				                
                                <div>
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên quán</th>
                                                <th>Địa chỉ</th>
                                                <th>Loại sản phẩm</th>
                                                <th>Người đăng</th>
                                                <th>Trạng thái</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getManagePostInfo as $key => $info)
											@php
												$restaurant = $info->customer_name;
												$address = $info->address;
												$catalog = $info->catalog_name;
												//$customer_name = $info->$username;
												$status = $info->status_customer;
											@endphp
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td style="width: 150px"><span>{{ $restaurant }}</span></td>
                                                <td style="width: 200px">
                                                    <span>{{ $address }}</span>
                                                </td>
                                                <td><span>{{ $catalog }}</span></td>
                                                <td>1</td>
                                                <td>
                                                    @if($status == 1)
                                                    <span>Đã phê duyệt</span>
                                                    @else
                                                    <span>Chờ phê duyệt</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="#" title="Chọn để xem chi tiết">
                                                            <i class="glyphicon glyphicon-eye-open"></i>
                                                    </a>
                                                    <a href="#" title="Chọn để sửa">
                                                            <i class="glyphicon glyphicon-edit" style="margin-left: 5px"></i>
                                                    </a>
                                                    <a href="#" title="Chọn để xóa">
                                                            <i class="glyphicon glyphicon-remove" style="margin-left: 5px"></i>
                                                    </a>
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
			</div>
		</div>
	</div>

@endsection
