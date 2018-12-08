
  <!-- Leftbar -->
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 clearpaddingl" style="margin-bottom: 20px">
		<div class="panel panel-info">
		  <div class="panel-body" style="padding:0px">
		  	
		  	<div class="list-group" style="padding-top: 57px">
		  		@foreach($cats as $key => $cat)
              @php
                  $id = $cat->catalog_id;
                  $name = title_case($cat->catalog_name);
                  $slug = str_slug($cat->catalog_name);
              @endphp
              @if($cat->status == 1)
			           <a href="{{ route('trangDanhMuc', ['slug' => $slug, 'cid' => $id]) }}" class="list-group-item">{{ $name }}</a>
              @endif
			  @endforeach
			</div>
		  </div>
		</div>
	</div>
	{{-- search button --}}
<div class="overlay">
  <a class="mk-search-trigger mk-fullscreen-trigger" href="#" style="display: table-cell; padding: 0 30px 0 20px; vertical-align: middle;" id="search-button-listener">
    <div id="search-button"><i class="fa fa-search"></i></div>
  </a>
  <div class="mk-fullscreen-search-overlay" id="mk-search-overlay">
    <a href="#" class="mk-fullscreen-close" id="mk-fullscreen-close-button"><i class="fa fa-times"></i></a>
    <div id="mk-fullscreen-search-wrapper">
      <form method="post" id="mk-fullscreen-searchform" action="{{ route('trangTimKiem') }}">
      	{{ csrf_field() }}
        <input type="text" name="searchinput" value="" placeholder="Đặt Đồ ăn, giao hàng từ 20'... ở Đà Nẵng từ 06:30 - 21:00" id="mk-fullscreen-search-input">
        <i class="fa fa-search fullscreen-search-icon"><input value="" type="submit"></i>
      </form>
    </div>
  </div>
  </div>
{{-- search full screen --}}
<script>
jQuery(document).ready(function($) {
  var wHeight = window.innerHeight;
  //search bar middle alignment
  $('#mk-fullscreen-searchform').css('top', wHeight / 2);
  //reform search bar
  jQuery(window).resize(function() {
    wHeight = window.innerHeight;
    $('#mk-fullscreen-searchform').css('top', wHeight / 2);
  });
  // Search
  $('#search-button').click(function() {
    console.log("Open Search, Search Centered");
    $("div.mk-fullscreen-search-overlay").addClass("mk-fullscreen-search-overlay-show");
  });
  $("a.mk-fullscreen-close").click(function() {
    console.log("Closed Search");
    $("div.mk-fullscreen-search-overlay").removeClass("mk-fullscreen-search-overlay-show");
  });
});

</script>