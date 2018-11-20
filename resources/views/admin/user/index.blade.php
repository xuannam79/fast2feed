@extends('templates.admin.master')
@section('title')
	Account
@endsection
@section('content')
	<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- USER DATA-->
                                <div class="user-data m-b-30" style="width: 960px">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>Account data
                                    </h3>
                                    <div class="table-data__tool" style="padding-left: 40px">
                                        <div class="table-data__tool-right">
                                            
                                            <a href="{{ route('adduserAdmin') }}" title="" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                <i class="zmdi zmdi-plus"></i>add Account
                                            </a>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>Username</td>
                                                    <td>role</td>
                                                    <td>avatar</td>
                                                    <td>status</td>
                                                    <td>type</td>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($accounts as $key => $account)
                                                @php
                                                    $username = $account->username;
                                                    $email = $account->email;
                                                    $avatar = $account->avatar;
                                                    $status = $account->status;
                                                    $role = $account->role;
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{ $username }}</h6>
                                                            <span>
                                                                <a href="#">{{ $email }}</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    
                                                    <td>
                                                        @if($role == 1)
                                                            <span class="role admin">Admin</span>
                                                        
                                                        @elseif($role == 2)
                                                            <span class="role user">Customer</span>
                                                        @else
                                                            <span class="role member">Shipper</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="image">
                                                            <a href="/fast2feed/public/files/account/{{ $avatar }}">
                                                                <img src="/fast2feed/public/files/account/{{ $avatar }}" alt="Admin" width="50px" />
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label class="switch switch-3d switch-success mr-3">
                                                            <input type="checkbox" class="switch-input" 
                                                            @if($status == 1)
                                                            checked="true"
                                                            @endif>
                                                            <span class="switch-label"></span>
                                                            <span class="switch-handle"></span>
                                                        </label>
                                                    </td>       
                                                    
                                                    <td>
                                                        <span class="more">
                                                            <a href="#" title="">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </a>
                                                        </span>
                                                        <span class="more">
                                                            <a href="#" title="">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </a>
                                                        </span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                                <!-- END USER DATA-->
                            </div>
                        </div>
                        
@endsection