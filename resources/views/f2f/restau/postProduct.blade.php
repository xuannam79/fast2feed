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
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-offset-1 col-sm-2 control-label">Tên sản phẩm</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputEmail3" name="name" placeholder="nhập tên sản phẩm">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-offset-1 col-sm-2 control-label">Giá</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="inputEmail3" name="price" placeholder="nhập giá">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-offset-1 col-sm-2 control-label">Số lượng</label>
                                <div class="col-sm-8">
                                    <input type="number" name="amount" min="1" max="100" value="1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-offset-1 col-sm-2 control-label">Hình ảnh</label>
                                <div class="col-sm-8">
                                    <input type="file" name="images">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-offset-1 col-sm-2 control-label">Thời gian chuẩn bị</label>
                                <div class="col-sm-8">
                                    <input type="number" name="time" min="5" max="60" value="5">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-offset-1 col-sm-2 control-label">Danh mục</label>
                                <div class="col-sm-8">
                                    <select name="cat">
                                    	@foreach($cats as $key => $cat)
                                        <option value="{{ $cat->catalog_id }}">{{ $cat->catalog_name }}</option>
                                        @endforeach
                                    </select>
                                    <label style="margin-left: 20px">Menu</label>
                                    <select name="menu">
                                    	@foreach($menus as $key => $menu)
                                        <option value="{{ $menu->menu_id }}">{{ $menu->menu_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group" style="padding-left: 15	0px;">
                                <div class="col-sm-offset-3 col-sm-7">
                                    <button type="submit" class="btn btn-success">Đăng</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection