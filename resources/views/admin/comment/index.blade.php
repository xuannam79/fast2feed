@extends('templates.admin.master')
@section('title')
	Comment
@endsection
@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="row m-t-30">
                    <div class="col-md-12" style="width: 1020px;">
                        <!-- DATA TABLE-->
                        <h3 class="title-5 m-b-35">data comment</h3>
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                    	<th>
                                            <label class="au-checkbox" style="margin-bottom: 25px">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </th>
                                        <th>customer_name</th>
                                        <th>product_name</th>
                                        <th>date_create</th>
                                        <th>content</th>
                                        <th>status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($comments as $key => $comment)
                                    @php
                                        $customer_name = $comment->customer_name;
                                        $product_name = $comment->product_name;
                                        $date_create = $comment->date_create;
                                        $content = $comment->content;
                                        $status = $comment->status;
                                    @endphp
                                    <tr>
                                        <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td>
                                        <td class="process">{{ $customer_name }}</td>
                                        <td class="process">{{ $product_name }}</td>
                                        <td>{{ $date_create }}</td>
                                        <td>{{ $content }}</td>
                                        <td>
                                        	<label class="switch switch-3d switch-success mr-3">
	                                            <input type="checkbox" class="switch-input" checked="true">
	                                            <span class="switch-label"></span>
	                                            <span class="switch-handle"></span>
	                                        </label>
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                
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
                        <!-- END DATA TABLE-->
                    </div>
                </div>
            </div>
            
@endsection