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
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="/fast2feed/public/templates/admin/images/icon/f2f.png" alt="Fast2Feed">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <p style="text-align:left">Bạn cần 15p để đền vào mẫu này. Vui lòng điền các thông tin ở dưới một cách chính xác nhất.</p>
                                </div>
                                <div class="form-group">
									<a style="display: flex;" href="{{ route('trangChonAnh2') }}">
										<div class="au-input au-input--full" style="background: #eaeff2">Chụp ảnh chân dung
											<span style="color: red"> *</span>
											<span class="glyphicon glyphicon-menu-right" style="justify-content: space-between;left: 280px;"></span>
										</div>
									</a>
								</div>
                                <div class="form-group">
									<a style="display: flex;" href="{{ route('trangChonCMND') }}">
										<div class="au-input au-input--full" style="background: #eaeff2">Chứng minh nhân dân
											<span style="color: red">*</span>
											<span class="glyphicon glyphicon-menu-right" style="justify-content: space-between;left: 267px;"></span>
										</div>
									</a>
								</div>
                                <div class="form-group">
									<a style="display: flex;" href="{{ route('trangChonBLX') }}">
										<div class="au-input au-input--full" style="background: #eaeff2">Giấy phép lái xe
											<span style="color: red">*</span>
											<span class="glyphicon glyphicon-menu-right" style="justify-content: space-between;left: 315px;"></span>
										</div>
									</a>
								</div>
                                <a href="{{ route('trangDoiPhanHoi') }}" class="au-btn au-btn--block au-btn--green m-b-20" style="color: white; text-align: center;">GỬI</a>
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