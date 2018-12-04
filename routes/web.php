<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::pattern('id','[0-9]*');
Route::pattern('cid','[0-9]*');
Route::pattern('cusId','[0-9]*');
Route::pattern('slug','(.*)');

Route::namespace('f2f')->group(function(){
	Route::get('/',[
		'uses' => 'IndexController@index',
		'as' => 'trangChu'
	]);
	
	Route::get('/gio-hang',[
		'uses' => 'CartController@index',
		'as' => 'trangGioHang'
	]);
	
	Route::get('/lien-he',[
		'uses' => 'ContactController@index',
		'as' => 'trangLienHe'
	]);
	Route::get('/danh-muc/{slug}-{cid}',[
		'uses' => 'CatController@index',
		'as' => 'trangDanhMuc'
	]);
	Route::get('/nha-hang/{slug}-{cusId}',[
		'uses' => 'RestauController@index',
		'as' => 'trangCustomer'
	]);

	Route::post('/nha-hang/ajaxCart/{slug}-{cusId}',[
		'uses' => 'RestauController@postProduct',
		'as' => 'trangAjaxCart'
	]);
	Route::get('/postProduct',[
		'uses' => 'PostProductController@index',
		'as' => 'trangpostProduct'
	]);
	Route::get('/index-shipper',[
		'uses' => 'ShipperController@index',
		'as' => 'trangShipper'
	]);
	Route::get('/info-shipper',[
		'uses' => 'ShipperController@accountInfo',
		'as' => 'trangInfoShipper'
	]);
	Route::get('/profile/edit',[
		'uses' => 'ShipperController@getProfile',
		'as' => 'trangThongTinShipper'
	]);
	Route::get('/danhsachHD',[
		'uses' => 'DanhSachHDController@index',
		'as' => 'trangDanhSachHD'
	]);
	Route::get('/xac-nhan-code',[
		'uses' => 'ConfirmCodeController@index',
		'as' => 'trangConfirmCode'
	]);
	Route::get('/chon-anh',[
		'uses' => 'ChonAnhController@index',
		'as' => 'trangChonAnh'
	]);
	Route::get('/chon-anh-2',[
		'uses' => 'ChonAnh2Controller@index',
		'as' => 'trangChonAnh2'
	]);
	Route::get('/chon-CMND',[
		'uses' => 'ChonCMNDController@index',
		'as' => 'trangChonCMND'
	]);
	Route::get('/chon-BLX',[
		'uses' => 'ChonBLXController@index',
		'as' => 'trangChonBLX'
	]);
	Route::get('/doi-phan-hoi',[
		'uses' => 'DoiPhanHoiController@index',
		'as' => 'trangDoiPhanHoi'
	]);
	Route::get('/thong-bao',[
		'uses' => 'ThongBaoController@index',
		'as' => 'trangThongBao'
	]);
	Route::get('/test-map',[
		'uses' => 'TestMapController@index',
		'as' => 'trangTestMap'
	]);
	Route::get('/cap-nhat-tai-khoan',[
		'uses' => 'QuanLyTKController@index',
		'as' => 'trangCapNhatTK'
	]);
	Route::post('/cap-nhat-tai-khoan',[
		'uses' => 'QuanLyTKController@postInfo',
		'as' => 'trangCapNhatTK'
	]);
	Route::get('/doi-mat-khau',[
		'uses' => 'ChangePassController@index',
		'as' => 'trangDoiMK'
	]);
	Route::post('/doi-mat-khau',[
		'uses' => 'ChangePassController@postChangePass',
		'as' => 'trangDoiMK'
	]);
	Route::get('/thong-tin-tai-khoan',[
		'uses' => 'AccountInfoController@index',
		'as' => 'trangTTtaikhoan'
	]);
	Route::get('/quan-ly-tai-khoan',[
		'uses' => 'QuanLyTKShipperController@index',
		'as' => 'trangQLTKShipper'
	]);
	Route::get('/tai-khoan-ca-nhan',[
		'uses' => 'TaiSanShipperController@index',
		'as' => 'trangTaiSanShipper'
	]);
	Route::get('/account',[
		'uses' => 'accountController@index',
		'as' => 'trangThongTinTaiKhoan'
	]);
	Route::get('/dinh-vi-map',[
		'uses' => 'DinhViMapController@index',
		'as' => 'trangDinhViMap'
	]);
	Route::get('/manage-post',[
		'uses' => 'ManagePostController@index',
		'as' => 'trangManagePost'
	]);

	Route::get('/doi-mat-khau-shipper',[
		'uses' => 'ChangePassShipperController@index',
		'as' => 'trangDoiMKShipper'
	]);
	Route::get('/delivery-history',[
		'uses' => 'DeliveryHistoryShipperController@index',
		'as' => 'trangDeliveryHistoryShipper'
	]);
	Route::get('/lich-su-dat-hang',[
		'uses' => 'TransactionHistoryController@index',
		'as' => 'trangTransactionHistory'
	]);
	Route::get('/post-product',[
		'uses' => 'PostController@index',
		'as' => 'trangPost'
	]);
	Route::get('/payment',[
		'uses' => 'PaymentController@index',
		'as' => 'trangPayment'
	]);

});

Route::namespace('Auth')->group(function(){
	Route::get('/dang-nhap',[
		'uses' => 'LoginController@getLogin',
		'as' => 'trangDangNhap'
	]);
	Route::post('/dang-nhap',[
		'uses' => 'LoginController@postLogin',
		'as' => 'trangDangNhap'
	]);
	
	Route::get('/dang-xuat',[
		'uses' => 'LoginController@logout',
		'as' => 'trangDangXuat'
	]);
	Route::get('/quen-pass',[
		'uses' => 'ForgotPasswordController@index',
		'as' => 'trangQuenPass'
	]);
	Route::get('/dang-ki',[
		'uses' => 'RegisterController@getRegister',
		'as' => 'trangDangKi'
	]);
	Route::post('/dang-ki',[
		'uses' => 'RegisterController@postRegister',
		'as' => 'trangDangKi'
	]);
	Route::get('/dang-ki-shipper',[
		'uses' => 'RegisterShipperController@index',
		'as' => 'trangDangKiShipper'
	]);
});

Route::namespace('Admin')->middleware('MyMiddle', 'CustomerMiddle')->prefix('admin')->group(function(){
	Route::get('/',[
		'uses' => 'IndexController@index',
		'as' => 'trangChuAdmin'
	]);
	Route::get('/user',[
		'uses' => 'UserController@index',
		'as' => 'userAdmin'
	]);
	Route::get('/user/add',[
		'uses' => 'UserController@getAdd',
		'as' => 'adduserAdmin'
	]);
	Route::get('/cat',[
		'uses' => 'CatController@index',
		'as' => 'catAdmin'
	]);

	Route::post('/cat/update-Status',[
		'uses' => 'CatController@updateStatus',
		'as' => 'updateStatusCat'
	]);

	Route::get('/cat/add',[
		'uses' => 'CatController@getAdd',
		'as' => 'addcatAdmin'
	]);
	Route::post('/cat/add',[
		'uses' => 'CatController@postAdd',
		'as' => 'addcatAdmin'
	]);
	Route::get('/cat/edit-{cid}',[
		'uses' => 'CatController@getEdit',
		'as' => 'editcatAdmin'
	]);
	Route::post('/cat/edit-{cid}',[
		'uses' => 'CatController@postEdit',
		'as' => 'editcatAdmin'
	]);
	Route::get('/menu',[
		'uses' => 'MenuController@index',
		'as' => 'menuAdmin'
	]);
	Route::post('/menu/update-Status',[
		'uses' => 'MenuController@updateStatus',
		'as' => 'updateStatusMenu'
	]);
	Route::get('/menu/add',[
		'uses' => 'MenuController@getAdd',
		'as' => 'addmenuAdmin'
	]);
	Route::get('/customer',[
		'uses' => 'CustomerController@index',
		'as' => 'customerAdmin'
	]);
	Route::get('/customer/add',[
		'uses' => 'CustomerController@getAdd',
		'as' => 'addcustomerAdmin'
	]);
	Route::get('/product',[
		'uses' => 'ProductController@index',
		'as' => 'productAdmin'
	]);
	Route::post('/product/update-Status',[
		'uses' => 'ProductController@updateStatus',
		'as' => 'updateStatusProduct'
	]);
	Route::get('/product/add',[
		'uses' => 'ProductController@getAdd',
		'as' => 'addproductAdmin'
	]);
	Route::get('/contact',[
		'uses' => 'ContactController@index',
		'as' => 'contactAdmin'
	]);
	Route::get('/comment',[
		'uses' => 'CommentController@index',
		'as' => 'commentAdmin'
	]);
	Route::get('/shipper',[
		'uses' => 'ShipperController@index',
		'as' => 'shipperAdmin'
	]);
	Route::get('/online-shipper',[
		'uses' => 'OnlineController@index',
		'as' => 'onlineShipperAdmin'
	]);
	Route::get('/delivery-history-shipper',[
		'uses' => 'DeliveryHistoryController@index',
		'as' => 'deliveryHistoryAdmin'
	]);
	Route::get('/transaction-history-customer',[
		'uses' => 'TransactionHistoryAdminController@index',
		'as' => 'transactionHistoryAdmin'
	]);
	Route::get('/manage_post',[
		'uses' => 'ManagePostAdminController@index',
		'as' => 'managePostAdmin'
	]);

});

// Route::get('/test',[
// 	'uses' => 'Auth\LoginController@getAdmin',
// 	'as' => 'test'
// ]);