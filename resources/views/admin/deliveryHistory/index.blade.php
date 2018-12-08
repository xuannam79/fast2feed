@extends('templates.admin.master')
@section('title')
	Manage Delivery History
@endsection
@section('content')
	<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">DELIVERY HISTORY</h3>
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
                                                <th>order_id</th>
                                                <th>total</th>
                                                <th>payment</th>
                                                <th>status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $key => $order)
                                            @php
                                                $name = $order->shipper_name;
                                                $avatar = $order->avatar;
                                                $order_id = $order->order_id;
                                                $status_2 = $order->status_2;
                                                $total = $order->total;
                                                $payment = $order->payment;
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
                                                <td style="text-align: center;padding-right: 40px"><span>{{ $order_id }}</span></td>
                                                <td><span>{{ $total }}</td>
                                                <td>
                                                    @if($payment == 1)
                                                    <span style="color: green">Trực Tiếp</span>
                                                    @else
                                                    <span style="color: blue">Online</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($status_2 == 1)
                                                    <span style="color: green">Đã Giao</span>
                                                    @elseif($status_2 == 0)
                                                    <span style="color: red">Đã Hủy</span>
                                                    @else
                                                    <span style="color: blue">Đang giao</span>
                                                    @endif
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