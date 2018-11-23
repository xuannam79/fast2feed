@extends('templates.f2f.master')
@section('title')
	Thông tin tài khoản
@endsection
@section('content')
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="/fast2feed/public/templates/f2f/js/jquery-3.1.1.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="/fast2feed/public/templates/f2f/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/fast2feed/public/templates/f2f/bootstrap/css/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="/fast2feed/public/templates/f2f/css/style.css">
	<link rel="stylesheet" type="text/css" href="/fast2feed/public/templates/f2f/css/style2.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<title>Payment</title>
	<style type="text/css">
	.f2f-profile {
	    background-color: #fff;
	    border-radius: 4px;
	    float: left;
	    box-shadow: 0 0 3px 0 rgba(50,50,50,.3);
	    width: 320px;
	    margin-top: 35px;
	    padding: 5px 10px 0;
	    min-height: 420px;
	}
	body{
	    margin: 0;
	    font-family: Noto Sans,Arial,sans-serif;
	    font-size: 10px;
	    font-weight: 500;
	    line-height: 1.5;
	    color: #464646;
	    text-align: left;
	    background-color: #f2f2f2;
	}
	.f2f-detail{
		float: right;
	    width: 800px;
	    min-height: 420px;
	    position: relative;
	    background-color: #fff;
	    border-radius: 4px;
	    box-shadow: 0 0 3px 0 rgba(50,50,50,.3);
	    margin-top: 35px;
	}
	.f2f-detail .header-user-profile {
	    font-size: 18px;
	    color: #000;
	    font-weight: 700;
	    padding: 16px 15px;
	    border-bottom: 1px solid #ebebeb;
	    position: relative;
	    background: #f5f5f5;
	}
	
	.user-profile-update {
	    padding: 30px;
	    position: relative;
	}
	.user-profile-update .title-user {
	    font-weight: 700;
	    font-size: 15px;
	    color: ##001f3f;
	    padding-bottom: 20px;
	    position: relative;
	}
	.item-payment {
	    cursor: pointer;
	    position: relative;
	    margin-bottom: 6px;
	    margin-left: 10%;
	}
	.row {
		font-size: 15px;
	    display: flex;
	    flex-wrap: wrap;
	    margin-right: 50px;
	    margin-left: 50px;
	}
	.txt-bold {
    	font-weight: 650!important;
	}
	.col{
		flex-grow: 1;
    	max-width: 100%;
    	margin-left: 10px;
	}
	.col-3 {
	    -ms-flex: 0 0 25%;
	    flex: 0 0 25%;
	    max-width: 25%;
	}
	.align-items-center {
	    -ms-flex-align: center!important;
	    align-items: center!important;
	}
	.avatar-circle {
    	display: block;
    	width: 40px;
    	height: 40px;
    	border-radius: 50%;
    	overflow: hidden;
    	background: #ebebeb;
	}
	.input-group{
		position: relative;
		display: flex;
		align-items: stretch;
    	width: 100%;
	}
	.col-4 {
	    -ms-flex: 0 0 33%;
	    flex: 0 0 33%;
	    max-width: 33%;
	}
	.btn{
		user-select: none;
    	border: 1px solid #39CCCC;
		font-weight: 400;
	    text-align: center;
	    white-space: nowrap;
	    vertical-align: middle;
	    padding: .23rem .6rem;
	    font-size: 15px;
	    line-height: 1.5;
	    border-radius: 3px;
	    transition: color .15s 
	}
	
	</style>
</head>
<body>
	<div class="container">

		<div class="f2f-profile">
			<div class="now-navigation-profile">
				<div class="header-profile">
					<div class="row align-items-center">
						<div class="col-auto">
							<img class="avatar-circle" src="/fast2feed/public/files/account/khach1.jpg" alt="Hoàng Cao Thiêm">
						</div>
						<div class="col txt-bold font15">Hoàng Cao Thiêm</div>
					</div>
				</div>
				<hr>
				<div class="navigation-profile">
					<a class="item-navigation " title="Thông tin tài khoản" href="/account/profile">
						<div class="row">
							<div class="col-auto">
								<i class="fa fa-user"></i>
							</div>
							<div class="col">Thông tin tài khoản</div>
						</div>
					</a>
				</div>
				<hr>
				<div class="item-navigation">
				
						<div class="row">
							<div class="col-auto"><i class="fa fa-credit-card"></i></div>
							<div class="col">Phương thức thanh toán</div>
							<div class="col-auto"></div>
						</div>
					
					<hr>	
					<div class="nav-payment">
						<div class="item-payment ">
							<div class="row">
								<div class="col-auto">
									<span class="glyphicon glyphicon-credit-card"></span>
								</div>
								<div class="col">Card</div>								
							</div>
						</div>
						<div class="item-payment active">
							<div class="row">
								<div class="col-auto"><i class="fa fa-envelope"></i></div>
								<div class="col">Tiền mặt</div>
							</div>
						</div>
						<div class="item-payment ">
							<div class="row">
								<div class="col-auto"><i class="fa fa-bank"></i></div>
								<div class="col">Internet Banking</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="f2f-detail">
			<div class="header-user-profile">Personal Information</div>
			<div class="content-user-profile">
				<div class="user-profile-update">
				<div style="position:relative; left:220px; top:20px;">
					<div class="title-user">Tải ảnh đại diện</div>
					<div class="row">
						<div class="col-3">
							<div class="user-avatar-image">
								<img src="/fast2feed/public/files/account/khach1.jpg" alt="" id="avatar-circle" style="width: 150px; height: 150px;" 	>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="custom-file-image">
								<input type="file" id="validatedCustomFile" class="input-custom" required="" hidden="" accept="image/*">
							</div>
						</div>
					</div>
					<button class="btn btn-blue-4" type="button" style="position:relative; left:80px;">Cập nhật</button>
				</div>
				</div>
				<hr>
				<div class="user-profile-update">
					<form>
						<div class="title-user" style="position: relative; left:40%;">Thay đổi thông tin</div>
						<div class="row form-group align-items-center">
							<div class="col-3 txt-bold">First name</div>
							<div class="col-4">
								<div class="input-group">
									<input name="first_name" placeholder="Tên" type="text" class="form-control" value="Hoàng Cao Thiêm">
								</div>
							</div>
						</div>
						<div class="row form-group align-items-center">
							<div class="col-3 txt-bold">Last Name</div>
							<div class="col-4">
								<div class="input-group">
									<input name="last_name" placeholder="Họ" type="text" class="form-control" value="">
								</div>
							</div>
						</div>
						<div class="row form-group align-items-center">
							<div class="col-3 txt-bold">Giới tính</div>
							<div class="col-4">
								<div class="input-group">
									<select name="gender" class="custom-select">
										<option value="0">Không chọn</option>
										<option value="1">Nam</option>
										<option value="2">Nữ</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row form-group align-items-center">
							<div class="col-3 txt-bold">Email</div>
							<div class="col-8">
								<div class="input-group">
									<button type="button" class="btn btn-default">Cập nhật Email</button>
								</div>
							</div>
						</div>
						<div class="row form-group align-items-center">
							<div class="col-3 txt-bold">Password</div>
							<div class="col-8">
								<div class="input-group">
									<button type="button" class="btn btn-default">Đổi mật khẩu</button>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-3">
								<button type="submit" class="btn btn-default">Lưu thay đổi</button>
							</div>
						</div>
					</form>
					<hr>
				</div>
				
				<button hidden="" type="button" class="btn btn-default" style="position: relative; left:50%;">Cập nhật</button>
			</div>
		</div>
	</div>
</body>
</html>
@endsection

