@extends('templates.admin.master')
@section('title')
	Contact
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
                        <h3 class="title-5 m-b-35">data contact</h3>
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
                                        <th>name</th>
                                        <th>email</th>
                                        <th>address</th>
                                        <th>phone</th>
                                        <th>content</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contacts as $key => $contact)
                                    @php
                                        $name = $contact->contact_name;
                                        $email = $contact->email;
                                        $address = $contact->address;
                                        $phone = $contact->phone;
                                        $content = $contact->content;
                                    @endphp
                                    <tr>
                                        <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td>
                                        <td class="process">{{ $name }}</td>
                                        <td>{{ $email }}</td>
                                        <td>{{ $address }}</td>
                                        <td>{{ $phone }}</td>
                                        <td>{{ $content }}</td>
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