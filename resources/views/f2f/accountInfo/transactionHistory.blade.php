@extends('templates.f2f.master')
@section('title')
    Lịch sử đặt hàng
@endsection
@section('content')

    <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding" style="margin-top: 15px;">
        		@include('templates.f2f.leftInfoAcc')
    		
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
												$status = $info->status;
                                                $status_2 = $info->status_2;
                                                $slug = str_slug($restaurant);
                                                $url = route('trangLocationOrder',['slug' => $slug, 'order' => $order]) 
											@endphp
                                            <tr>
                                                <td>
                                                    {{ $loop->index+1 }}
                                                </td>
                                                <td style="width: 100px; text-align: center; padding-right: 30px"><span>{{ $order }}</span></td>
                                                <td style="width: 200px">
                                                    <span><span>{{ $restaurant }}</span>
                                                </td>
                                                <td><span>{{ $date }}</span></td>
                                                <td>{{ $total }}</td>
                                                <td>
                                                    @if($status == 1)
                                                    <span>Đã thanh toán</span>
                                                    @else
                                                    <span>Chưa thanh toán</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($status_2 == 1)
                                                    <span>Đã giao</span>
                                                    @elseif($status_2 == 2)
                                                    <span>Đang giao</span>
                                                    @else
                                                    <span>Đã hủy</span>
                                                    @endif
                                                </td>
                                                 <td>
                                                    @if($status_2 == 2)
                                                    <a href="{{ $url }}" target="_blank">Xem vị trí</a>
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
