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
	Route::post('/lien-he',[
		'uses' => 'ContactController@postContact',
		'as' => 'trangLienHe'
	]);
	Route::get('/danh-muc/{slug}-{cid}',[
		'uses' => 'CatController@index',
		'as' => 'trangDanhMuc'
	]);
	Route::get('/tat-ca-danh-muc/',[
		'uses' => 'CatController@getAllCat',
		'as' => 'trangAllDanhMuc'
	]);
	Route::get('/nha-hang/{slug}-{cusId}',[
		'uses' => 'RestauController@index',
		'as' => 'trangCustomer'
	]);

	Route::post('/nha-hang/ajaxCart/{slug}-{cusId}',[
		'uses' => 'RestauController@postProduct',
		'as' => 'trangAjaxCart'
	]);
	Route::post('/nha-hang/ajaxOrder/{slug}-{cusId}',[
		'uses' => 'RestauController@order',
		'as' => 'trangAjaxOrder'
	]);
	Route::post('/nha-hang/minus/{slug}-{cusId}',[
		'uses' => 'RestauController@minusProduct',
		'as' => 'trangMinusProduct'
	]);
	Route::post('/nha-hang/plus/{slug}-{cusId}',[
		'uses' => 'RestauController@plusProduct',
		'as' => 'trangPlusProduct'
	]);
	Route::get('/nha-hang/add-menu',[
		'uses' => 'RestauController@addMenu',
		'as' => 'trangThemMenu'
	]);
	Route::post('/nha-hang/add-menu',[
		'uses' => 'RestauController@postAddMenu',
		'as' => 'trangThemMenu'
	]);
	Route::get('/postProduct',[
		'uses' => 'PostProductController@index',
		'as' => 'trangpostProduct'
	]);
	Route::post('/postProduct',[
		'uses' => 'PostProductController@postProduct',
		'as' => 'trangpostProduct'
	]);
	Route::get('/hoa-don-da-nhan',[
		'uses' => 'ShipperController@index',
		'as' => 'trangShipper'
	]);
	Route::post('/hoa-don-da-nhan',[
		'uses' => 'ShipperController@cancelOrder',
		'as' => 'trangShipper'
	]);
	Route::post('/delivered',[
		'uses' => 'ShipperController@delivered',
		'as' => 'functionDelivered'
	]);
	Route::get('/info-shipper',[
		'uses' => 'ShipperController@accountInfo',
		'as' => 'trangInfoShipper'
	]);
	Route::get('/detail-shipper/{slug}-{order}',[
		'uses' => 'DetailShipperController@index',
		'as' => 'trangDetailShipper'
	]);
	Route::get('/profile/edit',[
		'uses' => 'ShipperController@getProfile',
		'as' => 'trangThongTinShipper'
	]);
	Route::get('/danhsachHD',[
		'uses' => 'DanhSachHDController@index',
		'as' => 'trangDanhSachHD'
	]);
	Route::post('/danhsachHD',[
		'uses' => 'DanhSachHDController@acceptOrder',
		'as' => 'trangDanhSachHD'
	]);
	Route::get('/detail-HD/{slug}-{order}',[
		'uses' => 'DetailDanhSachHDController@index',
		'as' => 'trangDetailDanhSachHD'
	]);
	Route::get('/dang-ki/xac-nhan-code',[
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
	Route::get('/test-map/{slug}-{order}',[
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
	Route::get('/history-post-restaurant',[
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
	Route::get('/post-restaurant',[
		'uses' => 'PostRestaurantController@index',
		'as' => 'trangPostRestaurant'
	]);
	Route::get('/payment',[
		'uses' => 'PaymentController@index',
		'as' => 'trangPayment'
	]);
	Route::get('/search',[
		'uses' => 'SearchController@index',
		'as' => 'trangTimKiem'
	]);
	Route::post('/search',[
		'uses' => 'SearchController@postSearch',
		'as' => 'trangTimKiem'
	]);
	Route::get('/location-order/{slug}-{order}',[
		'uses' => 'LocationOrderController@index',
		'as' => 'trangLocationOrder'
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
		'uses' => 'RegisterShipperController@getRegister',
		'as' => 'trangDangKiShipper'
	]);
	Route::post('/dang-ki',[
		'uses' => 'RegisterShipperController@postRegister',
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
	Route::get('/cat/delete-{cid}',[
		'uses' => 'CatController@del',
		'as' => 'delCatAdmin'
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
	Route::get('/menu/edit-{id}',[
		'uses' => 'MenuController@getEdit',
		'as' => 'editMenuAdmin'
	]);
	Route::post('/menu/edit-{id}',[
		'uses' => 'MenuController@postEdit',
		'as' => 'editMenuAdmin'
	]);
	Route::get('/menu/delete-{id}',[
		'uses' => 'MenuController@del',
		'as' => 'delMenuAdmin'
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
	Route::get('/product/approved',[
		'uses' => 'ProductController@approved',
		'as' => 'trangApproved'
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
	Route::get('/order',[
		'uses' => 'OrderController@index',
		'as' => 'orderAdmin'
	]);

});

// Route::get('/test',[
// 	'uses' => 'Auth\LoginController@getAdmin',
// 	'as' => 'test'
// ]);