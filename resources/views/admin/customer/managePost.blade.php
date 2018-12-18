@extends('templates.admin.master')
@section('title')
	Manage Post
@endsection
@section('content')
	<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">MANAGE POST</h3>
                                <div class="table-data__tool">
                                        <div class="table-data__tool-right">
                                            
                                            <a href="{{ route('customerAdmin') }}" title="" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                <i class="zmdi zmdi-undo"></i>BACK
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
                                                <th>images</th>
                                                <th>address</th>
                                                <th>phone</th>
                                                <th>poster</th>
                                                <th>status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getPost as $key => $customer)
                                            @php
                                                $name = $customer->customer_name;
                                                $images = $customer->images;
                                                $address = $customer->address;
                                                $phone = $customer->phone;
                                                $cus_name = $customer->restaurant_name;
                                                $status = $customer->status_customer;
                                                

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
                                                        <a href="/files/customer/{{ $images }}">
                                                            <img src="/files/customer/{{ $images }}" alt="Admin" width="50px" />
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>{{ $address }}</td>
                                                <td>{{ $phone }}</td>
                                                <td>{{ $cus_name }}</td>
                                                <td>
                                                    @if($status == 1)
                                                    <span style="color: green">Đã duyệt</span>
                                                    @endif
                                                </td>
                                                
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="#" title="chọn để sửa bài đăng" class="item">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <a href="#" title="chọn để xóa bài đăng" class="item">
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
                            <br>
                            <br>
                            <h3 class="title-5 m-b-35">APPROVED POST</h3>
                            <div class="row">
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
                                                <th>images</th>
                                                <th>address</th>
                                                <th>phone</th>
                                                <th>poster</th>
                                                <th>status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getNoPost as $key => $customer)
                                            @php
                                                $name = $customer->customer_name;
                                                $images = $customer->images;
                                                $address = $customer->address;
                                                $phone = $customer->phone;
                                                $cus_name = $customer->restaurant_name;
                                                $status = $customer->status_customer;
                                            @endphp
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td class="desc" style="width: 200px">{{ $name }}</td>
                                                <td>
                                                    <div class="image">
                                                        <a href="/files/customer/{{ $images }}">
                                                            <img src="/files/customer/{{ $images }}" alt="Admin" width="50px" />
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>{{ $address }}</td>
                                                <td>{{ $phone }}</td>
                                                <td>{{ $cus_name }}</td>
                                                <td>
                                                    @if($status == 2)
                                                    <span style="color: red">Chưa duyệt</span>
                                                    @endif
                                                </td>
                                                
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="#" title="chọn để duyệt bài đăng" style="margin-right: 20px; margin-top: 5px">
                                                            Duyệt
                                                        </a>
                                                        <a href="#" title="chọn để xóa bài đăng" class="item">
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