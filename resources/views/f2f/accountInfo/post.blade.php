@extends('templates.f2f.master')
@section('title')
    Đăng sản phẩm
@endsection
@section('content')
   <style>


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
				                <p href="#" class="list-group-item" position: relative style="font-size: 16px;font-weight: bold; text-align: center; background: #4C66A4; color: white">ĐĂNG SẢN PHẨM</p>
				                <div style="margin: 10px">
			                                
				                	<form action="#" enctype="multipart/form-data" method="post">
				                	<div style="width: 800px;height: 350px">
				                		<div style="float: left;">
					                		<label>Tên quán:</label><br>
							                <input type="text" name="username" style="margin-bottom: 10px; width: 300px" value="" readonly>
							                <br>
											<label>Địa chỉ:</label><br>
											<input type="text" name="address" max="" value="" style="margin-bottom: 10px; width: 300px">
											<br>
											<label>Loại sản phẩm:</label><br>
											<select style="width: 300px;height: 30px;margin-bottom: 10px">
      											<option value="">Cơm</option>
										      	<option value="">Bún</option>
										      	<option value="">Trà Sữa</option>
										      	<option value="">Khác</option>
										    </select>
											<br>
											<label>Tên menu:</label><br>
											<input type="text" name="email" style="margin-bottom: 10px; width: 300px" value="">
											<input type="submit" name="submit" value="Thêm menu" style="float: right;margin-right: 20px;color: white; width: 100px; height: 25px;background: #4C66A4;">
											<br>
											<input type="submit" name="submit" value="Cập nhật" style="float: right;margin-right: 20px;color: white; width: 100px; height: 25px;background: #4C66A4;">
											<label style="margin-top: 30px">Danh sách menu:</label><br>
											<select style="width: 300px;height: 30px;margin-bottom: 10px">
      											<option value="">Cơm gà quay</option>
										      	<option value="">Cơm gà quay 2</option>
										      	<option value="">Cơm gà quay 3</option>
										    </select>
											<br>
										</div>
											<div style="float: right;">
												<label>Giờ mở cửa:</label><br>
												<input type="text" name="email" style="margin-bottom: 10px; width: 300px" value="">
												<br>
												<label>Giở đóng cửa:</label><br>
												<input type="text" name="email" style="margin-bottom: 10px; width: 300px" value="">
												<br>
												<label>Thời gian làm khi đặt hàng:</label><br>
												<input type="text" name="email" style="margin-bottom: 10px; width: 300px" value="">
												<br>
											</div>
									</div>
								<div style="background: #f2f2f2;">
									<div style="width: 840px;height: 70px;">
										<div style="float: left">
											<label>Tên sản phẩm:</label><br>
											<input type="text" name="email" style="width: 300px" value="">
										</div>
										<div style="float: left">
											<label style="margin-left: 40px;">Hình ảnh:</label>
											<input type="file" name="email" style="margin-left: 40px; width: 200px" value="">
										</div>
										<div style="float: right;">
											<label>Số lượng:</label><br>
											<input type="text" name="email" style="margin-right: 20px; width: 80px" value="">
										</div>
										<div style="float: right;">
											<label>Giá:</label><br>
											<input type="text" name="email" style="margin-right: 20px; width: 100px" value="">
										</div>
									</div>
									<input type="submit" name="submit" value="Cập nhật" style="float: right;margin-right: 20px;color: white; width: 100px; height: 25px;background: #4C66A4;">
									<input type="submit" name="submit" value="Thêm" style="float: right;margin-right: 20px;color: white; width: 100px; height: 25px;background: #4C66A4;">
									<div style="width: 840px; margin-top: 50px;">
										<table class="table table-data2">
											<thead>
												<tr>
													<th>STT</th>
                                                	<th>Tên sản phẩm</th>
                                                	<th>Hình ảnh</th>
                                                	<th>Giá</th>
                                                	<th>Số lượng</th>
                                                	<th></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>data</td>
													<td>data</td>
													<td>data</td>
													<td>data</td>
													<td>data</td>
													<td>
														<a href="#" title="Chọn để sửa">
                                                            <i class="glyphicon glyphicon-edit" style="margin-left: 5px"></i>
                                                    	</a>
                                                    	<a href="#" title="Chọn để xóa">
                                                            <i class="glyphicon glyphicon-remove" style="margin-left: 5px"></i>
                                                    	</a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
										<input type="submit" name="submit" value="Xác Nhận" 
										style="margin-top: 15px; float: right; margin-right: 30px; background: #4C66A4; color: white; width: 100px; height: 35px;">	
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
