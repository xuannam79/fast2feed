<!-- Leftbar -->
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 clearpaddingl" style="margin-bottom: 20px">
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
                                    $name = title_case($cat->catalog_name);
                                    $slug = str_slug($cat->catalog_name);
                                @endphp
						  <a href="{{ route('trangDanhMuc', ['slug' => $slug, 'cid' => $id]) }}" class="list-group-item">{{ $name }}</a>
						  @endforeach
						</div>
					  </div>
					</div>
				</div>
				<!-- end-leftbar -->