@extends('templates.admin.master')
@section('title')
	Manage Transaction History
@endsection
@section('content')
	<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">TRANSACTION HISTORY</h3>
                                <div class="table-data__tool">
                                        <div class="table-data__tool-right">
                                            
                                            <a href="{{ route('customerAdmin') }}" title="" class="au-btn au-btn-icon au-btn--green au-btn--small">
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
                                                <th style="text-align: center;">Order</th>
                                                <th>Customer</th>
                                                <th>Restaurant</th>
                                                <th>Date_order</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getTransactionHistoryAdmin as $key => $value)
                                            @php
                                                $order = $value->order_id;
                                                $khachhang = $value->restaurant_name;
                                                $nhahang = $value->customer_name;
                                                $date = $value->date_create;
                                                $total = $value->total;
                                                $status = $value->status;
                                            @endphp
                                            <tr>
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td style="text-align: center;">{{ $order }}</td>
                                                <td>
                                                    {{ $khachhang }}
                                                </td>
                                                <td>{{ $nhahang }}</td>
                                                <td>{{ $date }}</td>
                                                <td>
                                                    <span>{{ number_format($total) }}</span>
                                                </td>
                                                <td>
                                                    @if($status == 1)
                                                    <span style="color: green">Đã thanh toán</span>
                                                    @else
                                                    <span style="color: red">Đã hủy</span>
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
                        
@endsection