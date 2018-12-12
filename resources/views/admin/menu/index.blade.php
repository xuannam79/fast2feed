@extends('templates.admin.master')
@section('title')
	Menu
@endsection
@section('content')
	<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">data Menu</h3>
                            	
                            </div>
                                <div class="table-responsive table-responsive-data2">
                                    @if (Session::has('msg'))
                                        <p style="color: red">{{ Session::get('msg') }}</p>
                                    @endif
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>id</th>
                                                <th>name</th>
                                                <th>status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($menus as $key => $menu)
                                            @php
                                                $id = $menu->menu_id;
                                                $name = $menu->menu_name;
                                                $status = $menu->status;
                                                $urlEdit = route('editMenuAdmin', $id);
                                                $urlDel = route('delMenuAdmin', $id);
                                            @endphp
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>{{ $id }}</td>
                                                <td class="desc">{{ $name }}</td>
                                                <td>
                                                    <label class="switch switch-3d switch-success mr-3" id="active{{$id}}">
                                                        @if($status == 1)
                                                        <input type="checkbox" class="switch-input" checked="true" onchange="return ajaxToggleActiveStatusMenu({{ $id }}, 1)">
                                                        <span class="switch-label"></span>
                                                        <span class="switch-handle"></span>

                                                        @else
                                                        <input type="checkbox" class="switch-input" onchange="return ajaxToggleActiveStatusMenu({{ $id }}, 0)">
                                                        <span class="switch-label"></span>
                                                        <span class="switch-handle"></span>
                                                        @endif
                                                        
                                                    </label>
                                                </td>
                                                
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{ $urlEdit }}" title="" class="item">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <a href="{{ $urlDel }}" title="" class="item">
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
                        <script type="text/javascript">
                            function ajaxToggleActiveStatusMenu(id, presentStatus){

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                      }
                                });
                                $.ajax({
                                    url: "{{ route('updateStatusMenu') }}",
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