@extends('templates.f2f.master')
@section('title')
    Cập nhật tài khoản
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
				                <p href="#" class="list-group-item" position: relative style="font-size: 16px;font-weight: bold; text-align: center; background: #4C66A4; color: white">Cập nhật mật khẩu</p>
				                
								@php
									$username = $getAccountInfo[0]->username;
									$email = $getAccountInfo[0]->email;
									$avatar = $getAccountInfo[0]->avatar;
									$phone = $getAccountInfo[0]->phone;
									$address = $getAccountInfo[0]->address;
									$birthday = explode('-', $getAccountInfo[0]->birthday);
									$year = $birthday[0];
									$month = $birthday[1];
									$day = $birthday[2];
									$now = getdate();
								@endphp
				                <div style="margin: 10px">
				                	@if ($errors->any())
			                            @foreach ($errors->all() as $error)
			                                <script type="text/javascript">alert("{{ $error }}");</script>
			                            @endforeach
			                        @endif
				                	<form action="{{ route('trangDoiMK') }}" method="post">
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
	<script src="/js/jquery.min.js" type="text/javascript"></script>
	<script src="/js/ajaxupload.js" type="text/javascript"></script>
@endsection
