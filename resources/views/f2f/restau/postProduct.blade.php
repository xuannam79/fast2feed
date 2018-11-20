@extends('templates.f2f.master')
@section('title')
	Post Product
@endsection
@section('content')
<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding" style="margin-top: 15px;">
				@include('templates.f2f.leftbar')
				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 clearpaddingr">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
						
						<div class="panel panel-info">
						  <div class="panel-heading">
						    <h3 class="panel-title">Thông tin liên hệ</h3>
						  </div>
						  <div class="panel-body">
						  	<form class="form-horizontal">
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-offset-1 col-sm-2 control-label">Tên</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="inputEmail3" name="nameProduct" placeholder="nhập tên sản phẩm">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-offset-1 col-sm-2 control-label">Giá</label>
						    <div class="col-sm-8">
						      <input type="email" class="form-control" id="inputEmail3" name="price" placeholder="nhập giá">
						    </div>
						  </div>
						  
						  <div class="form-group">
						    <div class="col-sm-offset-3 col-sm-7">
						      <button type="submit" class="btn btn-success">Đăng</button>
						    </div>
						  </div>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection