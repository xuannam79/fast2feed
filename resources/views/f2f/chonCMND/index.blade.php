<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="/fast2feed/public/templates/admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="/fast2feed/public/templates/admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/fast2feed/public/templates/admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/fast2feed/public/templates/admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/fast2feed/public/templates/admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Vendor CSS-->
    <link href="/fast2feed/public/templates/admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/fast2feed/public/templates/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/fast2feed/public/templates/admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/fast2feed/public/templates/admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/fast2feed/public/templates/admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/fast2feed/public/templates/admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/fast2feed/public/templates/admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/fast2feed/public/templates/admin/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5" style="height: 100%;">
            <div class="container">
                <div class="login-wrap" style="max-width:800px">
                    <div class="login-content">
					<a style="color: red" href="{{ route('trangChonAnh') }}">
						<span class="glyphicon glyphicon-menu-left" style="font-size: 12px;"></span>
						Quay trở lại
					</a>
                        <div class="login-logo">
                            <a href="#">
                                <img src="/fast2feed/public/templates/admin/images/icon/f2f.png" alt="Fast2Feed">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <p style="font-size: 24px">Chứng Minh Nhân Dân (mặt trước)<span style="color: red"> *</span></p>
                                </div>
								<div class="form-group">
									<a style="display: flex;" href="#">
										<div class="au-input au-input--full" style="background: #eaeff2; text-align: center">
											<div class="no-image">
												<img src="/public/fast2feed/public/templates/f2f/images/placeholder-landscape.png" width="200" height="236"
												style="margin-top: 2em; margin-bottom: 2em;"> 
												<p style="ine-height: 1.5em;font-size: .9em;">Click vào đây để đăng ảnh</p>
											</div>
											<div class="has-image hidden">
												<img src="" class="preview" alt="" width="200" height="236"
												style="margin-top: 2em; margin-left: 18em; margin-bottom: 2em;">
												<p style="ine-height: 1.5em;text-align: center;font-size: .9em;">Click để chọn ảnh khác</p>
											</div>
										</div>
									</a>
								</div>
								<div class="form-group">
                                    <p style="font-size: 24px">Chứng Minh Nhân Dân (mặt sau)<span style="color: red"> *</span></p>
								</div>
								<div class="form-group">
									<a style="display: flex;" href="#">
										<div class="au-input au-input--full" style="background: #eaeff2; text-align: center">
											<div class="no-image">
												<img src="/public/fast2feed/public/templates/f2f/images/placeholder-landscape.png" width="200" height="236"
												style="margin-top: 2em; margin-bottom: 2em;"> 
												<p style="ine-height: 1.5em;font-size: .9em;">Click vào đây để đăng ảnh</p>
											</div>
											<div class="has-image hidden">
												<img src="" class="preview" alt="" width="200" height="236"
												style="margin-top: 2em; margin-left: 18em; margin-bottom: 2em;">
												<p style="ine-height: 1.5em;text-align: center;font-size: .9em;">Click để chọn ảnh khác</p>
											</div>
										</div>
									</a>
								</div>
								<p><span class="glyphicon glyphicon-ok" style="font-size: 13px;color:green"></span> CMND còn hiệu lực, chưa hết hạn.</p>
								<p><span class="glyphicon glyphicon-ok" style="font-size: 13px;color:green"></span> Chụp ảnh bằng điện thoại, không dùng bản quét.</p>
								<p><span class="glyphicon glyphicon-ok" style="font-size: 13px;color:green"></span> Hình ảnh rõ nét, không bị mờ.</p>
								<div class="form-group">
                                    <p style="margin-top: 1em; font-size:13px">Số Chứng Minh Nhân Dân<span style="color: red"> *</span></p>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="" style="background: #eaeff2;">
                                </div>
								<div class="form-group">
                                    <p style="margin-top: 1em; font-size:13px;">Ngày cấp<span style="color: red"> *</span></p>
                                    <input class="au-input au-input--full" type="date" value="2018-01-01" placeholder="" style="background: #eaeff2;height: 25px">
                                </div>
								<div class="form-group">
                                    <p style="margin-top: 1em; font-size:13px">Nơi cấp<span style="color: red"> *</span></p>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="" style="background: #eaeff2;margin-bottom: 1em;">
                                </div>
                                <a href="{{ route('trangChonAnh') }}" style="color: white; text-align: center;" class="au-btn au-btn--block au-btn--green m-b-20" type="submit">TIẾP TỤC</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="/fast2feed/public/templates/admin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/fast2feed/public/templates/admin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/fast2feed/public/templates/admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/fast2feed/public/templates/admin/vendor/slick/slick.min.js">
    </script>
    <script src="/fast2feed/public/templates/admin/vendor/wow/wow.min.js"></script>
    <script src="/fast2feed/public/templates/admin/vendor/animsition/animsition.min.js"></script>
    <script src="/fast2feed/public/templates/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/fast2feed/public/templates/admin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/fast2feed/public/templates/admin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/fast2feed/public/templates/admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/fast2feed/public/templates/admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/fast2feed/public/templates/admin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/fast2feed/public/templates/admin/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="/fast2feed/public/templates/admin/js/main.js"></script>

</body>

</html>
<!-- end document-->