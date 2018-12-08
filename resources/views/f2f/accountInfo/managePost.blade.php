@extends('templates.f2f.master')
@section('title')
    Lịch sử bài đăng
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
				                <p href="#" class="list-group-item" position: relative style="font-size: 16px;font-weight: bold; text-align: center; background: #4C66A4; color: white">Lịch sử đăng hàng</p>
				                
                                <div>
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên quán</th>
                                                <th>Địa chỉ</th>
                                                <th>Loại sản phẩm</th>
                                                <th>Ngày đăng</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getManagePostInfo as $key => $info)
											@php
												$restaurant = $info->customer_name;
												$address = $info->address;
												$catalog = $info->catalog_name;
                                                $date = $info->date;
												$status = $info->status_customer;
											@endphp
                                            <tr>
                                                <td>
                                                    {{ $loop->index+1 }}
                                                </td>
                                                <td style="width: 150px"><span>{{ $restaurant }}</span></td>
                                                <td style="width: 200px">
                                                    <span>{{ $address }}</span>
                                                </td>
                                                <td><span>{{ $catalog }}</span></td>
                                                <td>{{ $date }}</td>
                                                <td>
                                                    @if($status == 1)
                                                    <span>Đã phê duyệt</span>
                                                    @else
                                                    <span>Chờ phê duyệt</span>
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
