@extends('templates.f2f.master')
@section('title')
    Trang chủ shipper
@endsection
@section('content')
    <div class="row" style="margin-top: 20px">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>

            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="/templates/f2f/images/slide/slide6.jpg" alt="" style="width: 1169px;height: 300px">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <img src="/templates/f2f/images/slide/slide7.jpg" alt="" style="width: 1169px;height: 300px">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <img src="/templates/f2f/images/slide/slide8.jpg" alt="" style="width: 1169px;height: 300px">
                    <div class="carousel-caption">
                    </div>
                </div>


            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="order_panel order_panel_info">
            <div class="order">
                <h1 class="order_title mb-4 text-center" style="font-size: 20px">Danh sách hóa đơn</h1>
                <div class="order_table">
                    <div class="order_list">
                        <div class="order_list_heading order_table_row">
                            <div class="order_table_cell order_list_row_col1">STT
                            </div>
                            <div class="order_table_cell order_list_row_col2">Nơi nhận hàng
                            </div>
                            <div class="order_table_cell order_list_row_col3">Nơi giao hàng
                            </div>
                            <div class="order_table_cell order_list_row_col4">Tiền nhận hàng
                            </div>
                            <div class="order_table_cell order_list_row_col5">Tiền giao hàng
                            </div>
                            <div class="order_table_cell order_list_row_col6">Trạng thái
                            </div>
                            <div class="order_table_cell order_list_row_col7">
                            </div>
                            <div class="order_table_cell order_list_row_col8">
                            </div>
                        </div>
                        <div class="order_table_row">
                            <div class="order_table_cell order_list_row_col1">01
                            </div>
                            <div class="order_table_cell order_list_row_col2">134 Hoàng Diệu, P.2, Q. Hải Châu, TP.Đà
                                Nẵng
                            </div>
                            <div class="order_table_cell order_list_row_col3">148 Tiểu La, P.3, Q. Hải Châu, TP.Đà Nẵng
                            </div>
                            <div class="order_table_cell order_list_row_col4">95.000đ
                            </div>
                            <div class="order_table_cell order_list_row_col5">116,000đ
                            </div>
                            <div class="order_table_cell order_list_row_col6">Còn 5 phút
                            </div>
                            <div class="order_table_cell order_list_row_col7">
                                <button title="Nhấn vào để xem chi tiết"
                                        class="font_weight_bold order_table_status gray pointer" id="myBtn">Xem
                                </button>

                                <div id="myModel" class="model">

                                    <!-- model content -->
                                    <div id="myModel" class="model fade1 model-order show1" id="model-order"
                                         tabindex="-1"
                                         role="dialog" data-backdrop="static" data-keyboard="false"
                                         style="padding-right: 16px; display: block;">
                                        <div class="model-dialog model-dialog-centered" role="document">
                                            <div class="model-content model-order-detail"><span class="close"
                                                                                                data-dismiss="model">x</span>
                                                <div class="model-header">Chi tiết hóa đơn</div>
                                                <div class="model-body">
                                                    <div class="order-left">
                                                        <div class="map-order">
                                                            <div class="embed-responsive map-order">
                                                                <div class="embed-responsive-item"
                                                                     style="overflow: hidden;">
                                                                    <div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                                                                        <div class="gm-style"
                                                                             style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;">
                                                                            <div tabindex="0"
                                                                                 style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: none;">
                                                                                <div style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);">
                                                                                    <div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">
                                                                                        <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                                                                            <div style="position: absolute; z-index: 989; transform: matrix(1, 0, 0, 1, -203, -64);">
                                                                                                <div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;">
                                                                                                    <div style="width: 256px; height: 256px;"></div>
                                                                                                </div>
                                                                                                <div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;">
                                                                                                    <div style="width: 256px; height: 256px;"></div>
                                                                                                </div>
                                                                                                <div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px;">
                                                                                                    <div style="width: 256px; height: 256px;"></div>
                                                                                                </div>
                                                                                                <div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px;">
                                                                                                    <div style="width: 256px; height: 256px;"></div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div>
                                                                                    <div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div>
                                                                                    <div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;">
                                                                                        <div style="position: absolute; left: 0px; top: 0px; z-index: -1;">
                                                                                            <div style="position: absolute; z-index: 989; transform: matrix(1, 0, 0, 1, -203, -64);">
                                                                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 0px;"></div>
                                                                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 0px;"></div>
                                                                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: -256px;"></div>
                                                                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: -256px;"></div>
                                                                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: -256px;"></div>
                                                                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 0px;"></div>
                                                                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 256px;"></div>
                                                                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 256px;"></div>
                                                                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 256px;"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div style="width: 40px; height: 40px; overflow: hidden; position: absolute; left: 2px; top: -1px; z-index: 39;">
                                                                                            <img alt=""
                                                                                                 src="/assets/img/Merchant-Pin.png?e5d924c0717037d8e633ec1bf3931b5e"
                                                                                                 draggable="false"
                                                                                                 style="position: absolute; left: 0px; top: 0px; width: 40px; height: 40px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; opacity: 1;">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                                                                        <div style="position: absolute; z-index: 989; transform: matrix(1, 0, 0, 1, -203, -64);">
                                                                                            <div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                                                <img draggable="false"
                                                                                                     alt=""
                                                                                                     role="presentation"
                                                                                                     src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i1631!3i962!4i256!2m3!1e0!2sm!3i440145940!3m9!2svi!3sVN!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!5f2!23i1301875&amp;key=AIzaSyCQSVVPI1qhSF78idZHZv0Ur1HBJGGlQXg&amp;token=16780"
                                                                                                     style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                                            </div>
                                                                                            <div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                                                <img draggable="false"
                                                                                                     alt=""
                                                                                                     role="presentation"
                                                                                                     src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i1630!3i962!4i256!2m3!1e0!2sm!3i440145940!3m9!2svi!3sVN!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!5f2!23i1301875&amp;key=AIzaSyCQSVVPI1qhSF78idZHZv0Ur1HBJGGlQXg&amp;token=114333"
                                                                                                     style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                                            </div>
                                                                                            <div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                                                <img draggable="false"
                                                                                                     alt=""
                                                                                                     role="presentation"
                                                                                                     src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i1630!3i961!4i256!2m3!1e0!2sm!3i440145940!3m9!2svi!3sVN!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!5f2!23i1301875&amp;key=AIzaSyCQSVVPI1qhSF78idZHZv0Ur1HBJGGlQXg&amp;token=32034"
                                                                                                     style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                                            </div>
                                                                                            <div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                                                <img draggable="false"
                                                                                                     alt=""
                                                                                                     role="presentation"
                                                                                                     src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i1631!3i961!4i256!2m3!1e0!2sm!3i440145940!3m9!2svi!3sVN!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!5f2!23i1301875&amp;key=AIzaSyCQSVVPI1qhSF78idZHZv0Ur1HBJGGlQXg&amp;token=65552"
                                                                                                     style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="gm-style-pbc"
                                                                                     style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0; transition-duration: 0.2s;">
                                                                                    <p class="gm-style-pbt"></p></div>
                                                                                <div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;">
                                                                                    <div style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);">
                                                                                        <div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div>
                                                                                        <div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div>
                                                                                        <div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;">
                                                                                            <div title=""
                                                                                                 style="width: 40px; height: 40px; overflow: hidden; position: absolute; opacity: 0; cursor: pointer; touch-action: none; left: 2px; top: -1px; z-index: 39;">
                                                                                                <img alt=""
                                                                                                     src="https://www.now.vn/assets/img/Merchant-Pin.png?e5d924c0717037d8e633ec1bf3931b5e"
                                                                                                     draggable="false"
                                                                                                     style="position: absolute; left: 0px; top: 0px; width: 40px; height: 40px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; opacity: 1;">
                                                                                            </div>
                                                                                            <div style="position: absolute; left: 69.8887px; top: -30.2948px;">
                                                                                                <div class="customMaker">
                                                                                                    <img src="https://media.foody.vn/usr/g1285/12840972/avt/s200x200/beauty-upload-api-foody-avatar-3a4adb48-a96b-4363-a82c-13ecf087d131-181020092739.jpg"
                                                                                                         alt=""></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d10689.338089223394!2d108.21128547419335!3d16.053957655821396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x314219cb373c12a5%3A0xad1642cbb9375692!2zMTM0IEhvw6BuZyBEaeG7h3UsIEjhuqNpIENow6J1IDIsIFEuIEjhuqNpIENow6J1LCDEkMOgIE7hurVuZyA1NTAwMDAsIFZp4buHdCBOYW0!3m2!1d16.063719!2d108.218178!4m5!1s0x314219bfb3df5bcf%3A0xe9d14ccccd9397bc!2zMTQ4IFRp4buDdSBMYSwgSOG6o2kgQ2jDonUsIERhIE5hbmc!3m2!1d16.0442653!2d108.21128549999999!5e0!3m2!1svi!2s!4v1540392577539" width="800" height="600" frameborder="0" style="border:0" allowfullscreen>
																			</iframe>
                                                                            <div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;">
                                                                                <a target="_blank" rel="noopener"
                                                                                   href="https://maps.google.com/maps?ll=10.79011,106.662573&amp;z=11&amp;t=m&amp;hl=vi&amp;gl=VN&amp;mapclient=apiv3"
                                                                                   title="Nhấp để xem khu vực này trên Google Maps"
                                                                                   style="position: static; overflow: visible; float: none; display: inline;">
                                                                                    <div style="width: 66px; height: 26px; cursor: pointer;">
                                                                                        <img alt=""
                                                                                             src="https://maps.gstatic.com/mapfiles/api-3/images/google4_hdpi.png"
                                                                                             draggable="false"
                                                                                             style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;">
                                                                                    </div>
                                                                                </a></div>
                                                                            <div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 300px; height: 180px; position: absolute; left: 43px; top: 73px;">
                                                                                <div style="padding: 0px 0px 10px; font-size: 16px;">
                                                                                    Dữ liệu Bản đồ
                                                                                </div>
                                                                                <div style="font-size: 13px;">Dữ liệu
                                                                                    bản đồ ©2018 Google
                                                                                </div>
                                                                                <button draggable="false" title="Close"
                                                                                        aria-label="Close" type="button"
                                                                                        class="gm-ui-hover-effect"
                                                                                        style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: absolute; cursor: pointer; user-select: none; top: 0px; right: 0px; width: 37px; height: 37px;">
                                                                                    <img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224px%22%20height%3D%2224px%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23000000%22%3E%0A%20%20%20%20%3Cpath%20d%3D%22M19%206.41L17.59%205%2012%2010.59%206.41%205%205%206.41%2010.59%2012%205%2017.59%206.41%2019%2012%2013.41%2017.59%2019%2019%2017.59%2013.41%2012z%22%2F%3E%0A%20%20%20%20%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                                                                                         style="pointer-events: none; display: block; width: 13px; height: 13px; margin: 12px;">
                                                                                </button>
                                                                            </div>
                                                                            <div class="gmnoprint"
                                                                                 style="z-index: 1000001; position: absolute; right: 214px; bottom: 0px; width: 142px;">
                                                                                <div draggable="false"
                                                                                     class="gm-style-cc"
                                                                                     style="user-select: none; height: 14px; line-height: 14px;">
                                                                                    <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                                                        <div style="width: 1px;"></div>
                                                                                        <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                                                                    </div>
                                                                                    <div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                                                        <a style="text-decoration: none; cursor: pointer; display: none;">Dữ
                                                                                            liệu Bản đồ</a><span>Dữ liệu bản đồ ©2018 Google</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="gmnoscreen"
                                                                                 style="position: absolute; right: 0px; bottom: 0px;">
                                                                                <div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">
                                                                                    Dữ liệu bản đồ ©2018 Google
                                                                                </div>
                                                                            </div>
                                                                            <div class="gmnoprint gm-style-cc"
                                                                                 draggable="false"
                                                                                 style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 114px; bottom: 0px;">
                                                                                <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                                                    <div style="width: 1px;"></div>
                                                                                    <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                                                                </div>
                                                                                <div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                                                    <a href="https://www.google.com/intl/vi_VN/help/terms_maps.html"
                                                                                       target="_blank" rel="noopener"
                                                                                       style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Điều
                                                                                        khoản sử dụng</a></div>
                                                                            </div>
                                                                            <button draggable="false"
                                                                                    title="Chuyển đổi chế độ xem toàn màn hình"
                                                                                    aria-label="Chuyển đổi chế độ xem toàn màn hình"
                                                                                    type="button"
                                                                                    class="gm-control-active gm-fullscreen-control"
                                                                                    style="background: none rgb(255, 255, 255); border: 0px; margin: 10px; padding: 0px; position: absolute; cursor: pointer; user-select: none; border-radius: 2px; height: 40px; width: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; overflow: hidden; display: none; top: 0px; right: 0px;">
                                                                                <img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%20018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                                                                                     style="height: 18px; width: 18px; margin: 11px;"><img
                                                                                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                                                                                        style="height: 18px; width: 18px; margin: 11px;"><img
                                                                                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                                                                                        style="height: 18px; width: 18px; margin: 11px;">
                                                                            </button>
                                                                            <div draggable="false" class="gm-style-cc"
                                                                                 style="user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;">
                                                                                <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                                                    <div style="width: 1px;"></div>
                                                                                    <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                                                                </div>
                                                                                <div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                                                    <a target="_blank" rel="noopener"
                                                                                       title="Báo cáo lỗi trong bản đồ đường hoặc hình ảnh đến Google"
                                                                                       href="https://www.google.com/maps/@10.7901102,106.6625732,11z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3"
                                                                                       style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Báo
                                                                                        cáo một lỗi bản đồ</a></div>
                                                                            </div>
                                                                            <div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom"
                                                                                 draggable="false" controlwidth="0"
                                                                                 controlheight="0"
                                                                                 style="margin: 10px; user-select: none; position: absolute; display: none; bottom: 14px; right: 0px;">
                                                                                <div class="gmnoprint" controlwidth="40"
                                                                                     controlheight="40"
                                                                                     style="display: none; position: absolute;">
                                                                                    <div style="width: 40px; height: 40px;">
                                                                                        <button draggable="false"
                                                                                                title="Rotate map 90 degrees"
                                                                                                aria-label="Rotate map 90 degrees"
                                                                                                type="button"
                                                                                                class="gm-control-active"
                                                                                                style="background: none rgb(255, 255, 255); display: none; border: 0px; margin: 0px 0px 32px; padding: 0px; position: relative; cursor: pointer; user-select: none; width: 40px; height: 40px; top: 0px; left: 0px; overflow: hidden; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px;">
                                                                                            <img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                                                                                                 style="height: 28px; width: 28px; margin: 6px;"><img
                                                                                                    src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                                                                                                    style="height: 28px; width: 28px; margin: 6px;"><img
                                                                                                    src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                                                                                                    style="height: 28px; width: 28px; margin: 6px;">
                                                                                        </button>
                                                                                        <button draggable="false"
                                                                                                title="Tilt map"
                                                                                                aria-label="Tilt map"
                                                                                                type="button"
                                                                                                class="gm-tilt gm-control-active"
                                                                                                style="background: none rgb(255, 255, 255); display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; width: 40px; height: 40px; top: 0px; left: 0px; overflow: hidden; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px;">
                                                                                            <img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                                                                                                 style="width: 18px; height: 16px; margin: 12px 11px;"><img
                                                                                                    src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                                                                                                    style="width: 18px; height: 16px; margin: 12px 11px;"><img
                                                                                                    src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                                                                                                    style="width: 18px; height: 16px; margin: 12px 11px;">
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <div></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="direction-content">
                                                            <div class="direction-info">
                                                                <div class="direction-from">
                                                                    <div class="direction-name">Điểm lấy hàng - Tên quán
                                                                    </div>
                                                                    <div class="direction-name">134 Hoàng Diệu, P.2, Q.
                                                                        Hải Châu, TP.Đà Nẵng
                                                                    </div>
                                                                </div>
                                                                <div class="direction-to">
                                                                    <div class="">
                                                                        <div class="direction-name"
                                                                             id="shipping-address">
                                                                            <span>Điểm giao hàng - Tên khách</span><span> - Sđt khách </span>
                                                                        </div>
                                                                        <div class="direction-address"><span> 148 Tiểu La, P.3, Q. Hải Châu, TP.Đà Nẵng</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="direction-time"><span class="fa"><i
                                                                                class="far fa-clock"></i></span><span
                                                                            class="txt-bold"> Thời gian giao:  15:35 - 24/10 - </span><span
                                                                            class="txt-red">3.0km</span></div>
                                                                <div class="change-info">Chỉ đường đi<i
                                                                            class="glyphicon glyphicon-menu-right"
                                                                            style="position: absolute;right: 10px;top: 10px;"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="order-right"><p class="title-popup-order">Thông tin sản
                                                            phẩm</p>
                                                        <div class="order-list">
                                                            <div class="order-item"><span
                                                                        class="order-item-number">1</span>
                                                                <div class="order-item-info">
                                                                    <div class="order-item-name"><span class="txt-bold">Bún thịt nướng chả giò&nbsp;</span>
                                                                    </div>
                                                                    <div class="order-item-note"></div>
                                                                </div>
                                                                <div class="order-item-price">55,000 <span class="unit">đ</span>
                                                                </div>
                                                            </div>
                                                            <div class="order-item"><span
                                                                        class="order-item-number">1</span>
                                                                <div class="order-item-info">
                                                                    <div class="order-item-name"><span class="txt-bold">Cơm gà&nbsp;</span>
                                                                    </div>
                                                                    <div class="order-item-note"></div>
                                                                </div>
                                                                <div class="order-item-price">40,000 <span class="unit">đ</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="info-order">
                                                            <div class="row1">
                                                                <div class="cel">Tổng tiền lấy <span
                                                                            class="txt-bold">2</span>
                                                                    sản phẩm
                                                                </div>
                                                                <div class="cel-auto txt-bold">95,000 <span
                                                                            class="unit">đ</span></div>
                                                            </div>
                                                            <div class="row1">
                                                                <div class="cel">Phí vận chuyển: <span
                                                                            class="txt-red">3.0km</span><span
                                                                            class="show1-fee-min">&nbsp;</span>
                                                                </div>
                                                                <div class="cel-auto">21,000 <span class="unit">đ</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="note-order "></div>
                                                        <div class="pedding-10 txt-bold font16">
                                                            <div class="row1">
                                                                <div class="cel"><span>Tổng tiền giao hàng</span></div>
                                                                <div class="cel-auto"><span>116,000 </span><span
                                                                            class="unit">đ</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="payment-methods">
                                                            <div class="row1">
                                                                <div class="cel"><span
                                                                            class="txt-bold font16 txt-black">Kiểu thanh toán</span>
                                                                </div>
                                                                <div class="cel-auto"><span
                                                                            class="txt-blue">Trực tiếp</span><i
                                                                            class="icon-arrow-thin right"
                                                                            aria-hidden="true"></i></div>
                                                            </div>
                                                        </div>

                                                        <div class="not-vat"><span class="icon icon-vatnot"></span><span
                                                                    class="txt-gray">Hóa đơn VAT không dược cung cấp</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="model-footer">
                                                    <div class="submit-order">NHẬN</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="order_table_cell order_list_row_col8">
                                <button title="Nhấn vào để nhận đơn hàng"
                                        class="font_weight_bold order_table_status gray pointer">nhận
                                </button>
                            </div>
                        </div>
                        <div class="order_table_row">
                            <div class="order_table_cell order_list_row_col1">02
                            </div>
                            <div class="order_table_cell order_list_row_col2">210 Núi Thành, P.1, Q. Hải Châu, TP.Đà
                                Nẵng
                            </div>
                            <div class="order_table_cell order_list_row_col3">121 Lê Đình Lý, P.4, Q. Hải Châu, TP.Đà
                                Nẵng
                            </div>
                            <div class="order_table_cell order_list_row_col4">105.000đ
                            </div>
                            <div class="order_table_cell order_list_row_col5">140.000đ
                            </div>
                            <div class="order_table_cell order_list_row_col6">Đã hủy
                            </div>
                            <div class="order_table_cell order_list_row_col7">

                            </div>
                            <div class="order_table_cell order_list_row_col8">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div id="map" style="width:1100px;height:370px;margin: 20px 0px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.12085798816!2d108.20519251494086!3d16.059216988887126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219b15a13c381%3A0x2a8f705f1bfbf085!2zMjU0IE5ndXnhu4VuIFbEg24gTGluaCwgVGjhuqFjIEdpw6FuLCBUaGFuaCBLaMOqLCDEkMOgIE7hurVuZyA1NTAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1540132844754"
                    width="1169" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
    <script>
        // Get the model
        var model = document.getElementById('myModel');

        // Get the button that opens the model
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the model
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the model
        btn.onclick = function () {
            model.style.display = "block";
        }

        // When the user clicks on <span> (x), close the model
        span.onclick = function () {
            model.style.display = "none";
        }

        // When the user clicks anywhere outside of the model, close it
        window.onclick = function (event) {
            if (event.target == model) {
                model.style.display = "none";
            }
        }
    </script>
	
@endsection
