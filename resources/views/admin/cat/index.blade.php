@extends('templates.admin.master')
@section('title')
	Danh mục
@endsection
@section('content')
	<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">data catalog</h3>
                                <div class="table-data__tool">
                                        <div class="table-data__tool-right">
                                            <a href="{{ route('addcatAdmin') }}" title="" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                <i class="zmdi zmdi-plus"></i>add cat
                                            </a>
                                        </div>
                                </div>
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
                                            @foreach($cats as $key => $cat)
                                            @php
                                                $id = $cat->catalog_id;
                                                $name = $cat->catalog_name;
                                                $status = $cat->status;
                                                $urlEdit = route('editcatAdmin', $id);
                                               
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
                                                    <div class="active{{ $id }}">
                                                        @if($status == 1)
                                                            <img src="/fast2feed/public/templates/admin/images/icon/active.gif" alt="" onClick="return ajaxToggleActiveStatus({{ $id }}, 1)" />
                                                        @else
                                                            <img src="/fast2feed/public/templates/admin/images/icon/deactive.gif" alt="" onClick="return ajaxToggleActiveStatus({{ $id }}, 0)" />
                                                        @endif
                                                        
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{ $urlEdit }}" title="" class="item">
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
    <script type="text/javascript">
        function ajaxToggleActiveStatus(id, presentStatus){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });
            $.ajax({
                url: "{{ route('updateStatusCat') }}",
                type: 'POST',
                cache: false,
                data: {id:id, presentStatus:presentStatus},
                success: function(data){
                    $('.active'+id).html(data);
                    
                },
                error: function (){
                    alert('có lỗi xảy ra');
                }
            });
       }
    </script>
             
@endsection

           