@extends('templates.admin.master')
@section('title')
	Shipper
@endsection
@section('content')
	<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">data shipper</h3>
                                <div class="table-data__tool">
                                        <div class="table-data__tool-right">
                                            
                                            <a href="#" title="" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                <i class="zmdi zmdi-plus"></i>add shipper
                                            </a>
                                            <a href="{{ route('onlineShipperAdmin') }}" title="" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                Watch Online
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
                                                <th>address</th>
                                                <th>phone</th>
                                                <th>status</th>
                                                <th>account_name</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($shippers as $key => $shipper)
                                            @php
                                                $name = $shipper->shipper_name;
                                                $avatar = $shipper->avatar;
                                                $address = $shipper->address;
                                                $phone = $shipper->phone;
                                                $status = $shipper->status;
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
                                                        <a href="/fast2feed/public/files/account/{{ $avatar }}">
                                                            <img src="/fast2feed/public/files/account/{{ $avatar }}" alt="Admin" width="50px" />
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>{{ $address }}</td>
                                                <td>{{ $phone }}</td>
                                                <td>
                                                    <label class="switch switch-3d switch-success mr-3">
                                                        <input type="checkbox" class="switch-input" 
                                                        @if($status == 1)
                                                        checked="true"
                                                        @endif
                                                        >
                                                        <span class="switch-label"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <span class="block-email">{{ $username }}</span>
                                                </td>
                                                
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="#" title="" class="item">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <a href="#" title="" class="item">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </a>
                                                        
                                                    </div>
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