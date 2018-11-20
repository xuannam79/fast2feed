<!-- Leftbar -->
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 clearpaddingl">
					<div class="panel panel-info">
					  <div class="panel-body" style="padding:0px">
					  	<div style="padding-left: 20px">
					  		<form >
					  			<input type="text" name="search" placeholder="Search...">
					  			<button type="submit"><i class="fa fa-search"></i></button>
					  		</form>
					  	</div>
					  	<div class="list-group">
					  		@foreach($cats as $key => $cat)

                                            @php
                                                $id = $cat->catalog_id;
                                                $name = $cat->catalog_name;
                                            @endphp
						  <a href="{{ route('trangDanhMuc') }}" class="list-group-item">{{ $name }}</a>
						  @endforeach
						</div>
					  </div>
					</div>
				</div>
				<!-- end-leftbar -->