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
    <link href="/templates/admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="/templates/admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/templates/admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/templates/admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/templates/admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/templates/admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/templates/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/templates/admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/templates/admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/templates/admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/templates/admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/templates/admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/templates/admin/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="/templates/admin/images/icon/f2f.png" alt="Fast2Feed">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <p style="text-align:center">Vui lòng xác thực số email bằng cách nhập Mã Xác Thực (OTP) đã được gửi đến email của bạn</p>
                                </div>
                                <div class="form-group">
                                    <p style="text-align:center"></p>
                                </div>
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="number" name="otp" pattern="[0-9]*" maxlength="4" value="" required="" 
									style="text-align: center; letter-spacing: .5em;">
                                </div>
                                <div class="login-checkbox">
                                </div>
                                <a href="{{ route('trangDoiPhanHoi') }}" class="au-btn au-btn--block au-btn--green m-b-20" style="text-align: center;">Gửi</a>
                            </form>
                            <div class="register-link">
                                <p>
                                    Bấm vào <a href="#">đây</a> để hệ thống gửi lại mã xác thực qua email (nếu bạn vẫn chưa nhận được sau 5 phút).
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="/templates/admin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/templates/admin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/templates/admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/templates/admin/vendor/slick/slick.min.js">
    </script>
    <script src="/templates/admin/vendor/wow/wow.min.js"></script>
    <script src="/templates/admin/vendor/animsition/animsition.min.js"></script>
    <script src="/templates/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/templates/admin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/templates/admin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/templates/admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/templates/admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/templates/admin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/templates/admin/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="/templates/admin/js/main.js"></script>

</body>

</html>
<!-- end document-->