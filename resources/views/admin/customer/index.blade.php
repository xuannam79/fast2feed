@extends('templates.admin.master')
@section('title')
	Customer
@endsection
@section('content')
	<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">data customer</h3>
                                <div class="table-data__tool">
                                        <div class="table-data__tool-right">
                                            
                                            <a href="{{ route('addcustomerAdmin') }}" title="" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                <i class="zmdi zmdi-plus"></i>add customer
                                            </a>
                                            <a href="{{ route('transactionHistoryAdmin') }}" title="" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                <i class="zmdi zmdi-view-list"></i>transaction history
                                            </a>
                                            <a href="{{ route('managePostAdmin') }}" title="" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                <i class="zmdi zmdi-view-list"></i>manage post
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
                                                <th>email</th>
                                                <th>status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($customers as $key => $account)
                                            @php
                                                $username = $account->restaurant_name;
                                                $email = $account->email;
                                                $avatar = $account->avatar;
                                                $status = $account->status;
                                                

                                            @endphp
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td class="desc">{{ $username }}</td>
                                                <td>
                                                    <div class="image">
                                                        <a href="/fast2feed/public/files/account/{{ $avatar }}">
                                                            <img src="/fast2feed/public/files/account/{{ $avatar }}" alt="Admin" width="50px" />
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>{{ $email }}</td>
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