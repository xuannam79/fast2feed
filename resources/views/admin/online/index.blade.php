@extends('templates.admin.master')
@section('title')
	Manage Online Shipper
@endsection
@section('content')
	<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">WHO IS ONLINE?</h3>
                                <div class="table-data__tool">
                                        <div class="table-data__tool-right">
                                            <a href="{{ route('shipperAdmin') }}" title="" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                <i class="zmdi zmdi-undo"></i>Back
                                            </a>
                                        </div>
                                    </div>
                            </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>name</th>
                                                <th>avatar</th>
                                                <th>account_name</th>
                                                <th></th>
                                                <th>status</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($shippers as $key => $shipper)
                                            @php
                                                $name = $shipper->shipper_name;
                                                $avatar = $shipper->avatar;
                                                $active = $shipper->active;
                                                $username = $shipper->username;
                                            @endphp
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td class="desc">{{ $name }}</td>
                                                <td>
                                                    <div class="image">
                                                        <a href="/files/account/{{ $avatar }}">
                                                            <img src="/files/account/{{ $avatar }}" alt="Admin" width="50px" />
                                                        </a>
                                                    </div>
                                                </td>
                                                <td><span class="block-email">{{ $username }}</span></td>
                                                <td></td>
                                                <td>
                                                    @if($active == 1)
                                                    <label style="color: green">
                                                        Online
                                                        <div class="table-data-feature">
                                                            <p href="#" title="" class="item" style="background: green; height: 15px;width: 15px">
                                                            </p>
                                                        </div>
                                                    </label>
                                                    @else
                                                    <label>
                                                        Offline
                                                        <div class="table-data-feature">
                                                            <p href="#" title="" class="item" style="background: #808080; height: 15px;width: 15px">
                                                            </p>
                                                        </div>
                                                    </label>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="block-email"></span>
                                                </td>
                                                
                                                <td>
                                                    @if($active == 1)
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('trangDinhViMap') }}" title="" target="_blank">
                                                            Xem vị trí <i class="zmdi zmdi-pin"></i>
                                                        </a>
                                                    </div>
                                                    @else
                                                    <div class="table-data-feature">
                                                        
                                                    </div>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                        </div>
                    </div>
                </div>
            </div>
    
@endsection