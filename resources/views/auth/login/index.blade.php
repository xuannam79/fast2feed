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
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="/fast2feed/public/templates/admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="/fast2feed/public/templates/admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/fast2feed/public/templates/admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/fast2feed/public/templates/admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/fast2feed/public/templates/admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

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
                            <a href="{{ route('trangChu') }}">
                                <img src="/fast2feed/public/templates/admin/images/icon/f2f.png" alt="Fast2Feed">
                            </a>
                        </div>
                        @php
                            if(session()->has('admin')){
                                if(Route::has('trangDangNhap')){
                                    $previous = url()->previous();
                                    redirect()->to($previous)->send()->with('msg', 'Bạn cần đăng xuất để có thể có thể tới trang Đăng nhập');
                                }
                            }
                        @endphp
                        @if (Session::has('msg'))
                         <script type="text/javascript">alert("{{ Session::get('msg') }}");</script>
                        @endif
                        @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <script type="text/javascript">alert("{{ $error }}");</script>
                                    @endforeach
                        @endif
                        <div class="login-form">
                            <form action="{{ route('trangDangNhap') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="{{ route('trangQuenPass') }}">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                                <div class="social-login-content" style="padding: 0px;">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                    </div>
                                </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="{{ route('trangDangKi') }}">Sign Up Here</a>
                                </p>
                            </div>
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