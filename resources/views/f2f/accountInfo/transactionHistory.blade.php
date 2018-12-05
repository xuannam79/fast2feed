@extends('templates.f2f.master')
@section('title')
    Lịch sử đặt hàng
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
			           		<div class="list-group">
				                <p href="#" class="list-group-item" position: relative style="font-size: 16px;font-weight: bold; text-align: center; background: #4C66A4; color: white">Lịch sử đặt hàng</p>
				                
                                <div>
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Mã hóa đơn</th>
                                                <th>Nhà hàng</th>
                                                <th>Ngày đặt</th>
                                                <th>Tổng tiền</th>
                                                <th>Thanh toán</th>
                                                <th>Trạng thái</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getTransactionHistory as $key => $info)
											@php
												$restaurant = $info->customer_name;
                                                $order = $info->order_id;
                                                $date = $info->date_create;
                                                $total = $info->total;
                                                $payment = $info->payment;
												$status = $info->payment;
											@endphp
                                            <tr>
                                                <td>
                                                    {{ $loop->index+1 }}
                                                </td>
                                                <td style="width: 100px"><span>{{ $order }}</span></td>
                                                <td style="width: 200px">
                                                    <span><span>{{ $restaurant }}</span>
                                                </td>
                                                <td><span>{{ $date }}</span></td>
                                                <td>{{ $total }}</td>
                                                <td>
                                                    @if($status == 1)
                                                    <span>Đã thanh toán</span>
                                                    @elseif($status == 2)
                                                    <span>Chưa thanh toán</span>
                                                    @else
                                                    <span>Đã hủy</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($status == 1)
                                                    <span>Đã giao</span>
                                                    @elseif($status == 2)
                                                    <span>Đang giao</span>
                                                    @else
                                                    <span></span>
                                                    @endif
                                                </td>
                                                 <td>
                                                    @if($status == 1)
                                                    <span></span>
                                                    @elseif($status == 2)
                                                    <a href="#">Xem vị trí</a>
                                                    @else
                                                    <span></span>
                                                    @endif
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
