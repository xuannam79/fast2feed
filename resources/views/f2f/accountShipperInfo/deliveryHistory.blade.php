@extends('templates.f2f.master')
@section('title')
    Lịch sử giao hàng
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
				                <p href="#" class="list-group-item" position: relative style="font-size: 16px;font-weight: bold; text-align: center; background: #4C66A4; color: white">LỊCH SỬ GIAO HÀNG</p>
				                
                                <div>
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Mã hóa đơn</th>
                                                <th>Nhà hàng</th>
                                                <th>Khách hàng</th>
                                                <th>Ngày giao</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td style="width: 100px">1</td>
                                                <td>
                                                    <span>Cơm gà</span>
                                                </td>
                                                <td><span>Võ Văn An</span></td>
                                                <td>21/11/2018</td>
                                                <td>
                                                    Đã giao
                                                </td>

                                                
                                            </tr>
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
