@extends('templates.admin.master')
@section('title')
	Product
@endsection
@section('content')
	<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35"></h3>
                                <a href="{{ route('trangApproved') }}" title="" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                <i class="zmdi zmdi-mall"></i>approved
                                            </a>
                                <br>
                                <br>
                                </div>
                                <h3 class="title-5 m-b-35">data Product</h3>
                                
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
                                                <th>price</th>
                                                <th>amount</th>
                                                <th>catalog_name</th>
                                                <th>menu_name</th>
                                                <th>customer_name</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $key => $product)
                                            @php
                                                $name = $product->product_name;
                                                $images = $product->images;
                                                $price = $product->price;
                                                $amount = $product->amount;
                                                $catName = $product->catalog_name;
                                                $menuName = $product->menu_name;
                                                $customerName = $product->customer_name;
                                                $approved = $product->approved;
                                            @endphp
                                            @if($approved == 1)
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
                                                        <a href="/files/product/{{ $images }}">
                                                            <img src="/files/product/{{ $images }}" alt="Admin" width="50px" />
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>{{ $price }}</td>
                                                <td>{{ $amount }}</td>
                                                
                                                <td>
                                                    <span class="block-email">{{ $catName }}</span>
                                                </td>
                                                <td>
                                                    <span class="block-email">{{ $menuName }}</span>
                                                </td>
                                                <td>
                                                    <span class="block-email">{{ $customerName }}</span>
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
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                        
@endsection