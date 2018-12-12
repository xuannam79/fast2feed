@extends('templates.f2f.master')
@section('title')
	Thêm menu
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding" style="margin-top: 15px;">
        @include('templates.f2f.leftInfoAcc')
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 clearpaddingr">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">

                <div class="panel panel-info">
                    <ul class="nav navbar-nav" style="margin-bottom: 20px;border-bottom: 3px solid #bce8f1; text-align: center;">
                                <li style="width: 215px"><a href="{{ route('trangPostRestaurant') }}">Bài đăng</a></li>
                                <li style="width: 215px"><a href="{{ route('trangPost') }}">Thêm nhà hàng</a></li>
                                <li style="width: 215px"><a href="{{ route('trangThemMenu') }}">Thêm menu</a></li>
                                <li style="width: 215px"><a href="{{ route('trangpostProduct') }}">Thêm sản phẩm</a></li>
                            </ul>
                    @if ($errors->any())
					    <div class="alert alert-danger alert-block">
							<button type="button" class="close" data-dismiss="alert">×</button>	
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
					            @endforeach
							</ul>
						</div>
					@endif
                    @if (Session::has('msg'))
                        <script type="text/javascript">alert("{{ Session::get('msg') }}");</script>
                    @endif
                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('trangThemMenu') }}" method="post" >
                        	{{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-offset-1 col-sm-2 control-label">Tên Menu</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputEmail3" name="menu" placeholder="nhập tên menu">
                                </div>
                            </div>

                            <div class="form-group" style="padding-left: 15	0px;">
                                <div class="col-sm-offset-3 col-sm-7">
                                    <button type="submit" class="btn btn-success">Thêm</button>
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