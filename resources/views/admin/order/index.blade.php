@extends('templates.admin.master')
@section('title')
	Order
@endsection
@section('content')
	<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">data order</h3>
                                <div class="table-data__tool">
                                        <div class="table-data__tool-right">
                                            
                                            
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
                                                <th>STT</th>
                                                <th>order</th>
                                                <th>date_create</th>
                                                <th>shipper_id</th>
                                                <th>shipper_name</th>
                                                <th>status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getAllDanhSachHD as $key => $value)
                                            @php
                                                $order_id = $value->order_id;
                                                $date = $value->date_create;
                                                $shipper_id = $value->shipper_id;
                                                $shipper_name = $value->shipper_name;
                                                $status = $value->status;
                                                $status_2 = $value->status_2;
                                            @endphp
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td class="desc" >{{ $loop->index+1 }}</td>
                                                <td style="padding-left: 50px">
                                                    {{ $order_id }}
                                                </td>
                                                <td>{{ $date }}</td>
                                                <td style="padding-left: 70px">
                                                    @if($shipper_id==0)
                                                    <span></span>
                                                    @else
                                                    {{ $shipper_id }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($shipper_id==0)
                                                    <span></span>
                                                    @else
                                                    {{ $shipper_name }}
                                                    @endif</td>
                                                <td>
                                                    @if($shipper_id==0)
                                                    <span style="color: green">Còn 10 phút</span>
                                                    @elseif($shipper_id !=0 && $status == 1 && $status_2 == 1)
                                                    <span style="color: orange">Đã giao</span>
                                                    @elseif($shipper_id !=0 && $status == 1 && $status_2 == 2)
                                                    <span style="color: blue">Đang giao</span>
                                                    @else
                                                    <span style="color: red">Đã hủy</span>
                                                    @endif</td>
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