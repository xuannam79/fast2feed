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

                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                
                                                <th>name</th>
                                                <th>images</th>
                                                <th>price</th>
                                                <th>amount</th>
                                                <th>catalog_name</th>
                                                <th>menu_name</th>
                                                <th>customer_name</th>
                                                <th>approved</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $key => $product)
                                            @php
                                                $id = $product->product_id;
                                                $name = $product->product_name;
                                                $images = $product->images;
                                                $price = $product->price;
                                                $amount = $product->amount;
                                                $catName = $product->catalog_name;
                                                $menuName = $product->menu_name;
                                                $customerName = $product->customer_name;
                                                $approved = $product->approved;
                                            @endphp
                                            @if($approved == 0)
                                            <tr class="tr-shadow">
                                                
                                                <td class="desc">{{ $name }}</td>
                                                
                                                <td>
                                                    <div class="image">
                                                        <a href="/fast2feed/public/files/product/{{ $images }}">
                                                            <img src="/fast2feed/public/files/product/{{ $images }}" alt="Admin" width="50px" />
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
                                                    <label class="switch switch-3d switch-success mr-3" id="active{{$id}}">
                                                        @if($approved == 1)
                                                        <input type="checkbox" class="switch-input" checked="true" onchange="return ajaxToggleActiveStatusProduct({{ $id }}, 1)">
                                                        <span class="switch-label"></span>
                                                        <span class="switch-handle"></span>

                                                        @else
                                                        <input type="checkbox" class="switch-input" onchange="return ajaxToggleActiveStatusProduct({{ $id }}, 0)">
                                                        <span class="switch-label"></span>
                                                        <span class="switch-handle"></span>
                                                        @endif
                                                        
                                                    </label>
                                                    <div class="table-data-feature" style="display: inline;">
                                                        
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
                                <br>
                                <div class="table-data__tool">
                                        <div class="table-data__tool-right">
                                           
                                            <a href="{{ route('addproductAdmin') }}" title="" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                <i class="zmdi zmdi-plus"></i>add Product
                                                
                                            </a>
                                        </div>
                                    </div>
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
                                                        <a href="/fast2feed/public/files/product/{{ $images }}">
                                                            <img src="/fast2feed/public/files/product/{{ $images }}" alt="Admin" width="50px" />
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
                        <script type="text/javascript">
                            function ajaxToggleActiveStatusProduct(id, presentStatus){

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                      }
                                });
                                $.ajax({
                                    url: "{{ route('updateStatusProduct') }}",
                                    type: 'POST',
                                    cache: false,
                                    data: {id:id, presentStatus:presentStatus},
                                    success: function(data){
                                        $('#active'+id).html(data);
                                        
                                    },
                                    error: function (){
                                        alert('có lỗi xảy ra');
                                    }
                                });
                           }
                        </script>
@endsection