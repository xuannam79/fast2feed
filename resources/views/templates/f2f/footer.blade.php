<!-- Footer -->
		<div class="row" id="bank" style="margin-top: 10px">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 no-padding">
				    <div class="footer-info">            
				      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				        <strong style="font-size: 15px">Công ty</strong>
				          	<div style="color: gray;font-size: 13px">
				          		<li style="margin-top: 15px"> <a href="#" title="Giới thiệu">Giới thiệu</a></li> 
					          	<li> <a href="#" title="Quy trình đặt món">Quy trình đặt món</a></li> 
					          	<li> <a href="#" title="Hướng dẫn thanh toán">Hướng dẫn thanh toán</a></li> 
					          	<li> <a href="{{ route('trangLienHe') }}" title="Liên hệ">Liên hệ</a></li> 
					          	<li> <a href="#" title="Hợp tác nhân viên giao nhận">Hợp tác nhân viên giao nhận</a></li> 
				          	</div>
				      </div>
				      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				        <strong style="font-size: 15px;">F2F App</strong>
				        <a href="" title="" style="color: black;font-size: 16px;">
				        	<div class="app-download">
					        	<span style="padding-left: 16px;position: absolute;top: 8px;">				        	
					        		<i class="fa fa-apple" style="font-size:24px; margin-right: 10px"></i><span>iOS</span>
					        	</span>

				       		 </div>
				        </a>
				        <a href="" title="" style="color: black;font-size: 16px">
				        	<div class="app-download">
					        	<span style="padding-left: 10px;position: absolute;">				        	
					        		<i class="fa fa-android" style="font-size:24px; margin-right: 10px; padding-top: 5px; padding-left: 5px"></i><span>Android</span>
					        	</span>

				        	</div>
				        </a>
				        
				      </div>
				      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				        <img src="/fast2feed/public/templates/f2f/images/f2f2.png" alt=""style="width: 120px;margin: 0px 47px;"> 
				        <p style="font-size: 12px;color: gray; padding-left: 12px">© 2018 Fast2Feed - by XuanNam</p>
				        <div style="padding-left: 50px">
				        	<a href="http://fb.com/phamxuannam97"><img src="/fast2feed/public/templates/f2f/images/icon/facebook.png" alt="" style="width: 20%"></a>
							<a href="#"><img src="/fast2feed/public/templates/f2f/images/icon/twitter.png" alt="" style="width: 20%"></a>
							<a href="#"><img src="/fast2feed/public/templates/f2f/images/icon/google.png" alt="" style="width: 20%"></a>
						</div>
				      </div>

				    </div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="text-align: right;">
				    <strong style="font-size: 15px">Địa chỉ</strong>
				    <div style="font-size: 12px;color: #464646;margin-top: 15px">
				    	<p>Team TANQ Capstone 1</p>
				    	<p>Chuyên ngành Công nghệ phần mềm</p>
				    	<p>Khoa Đào Tạo Quốc Tế</p>
				    	<p>Trường Đại Học Duy Tân</p>
				    	<p>254 Nguyễn Văn Linh, P.Thạc Gián, Q.Thanh Khê, TP.Đà Nẵng</p>
				    	<img src="/fast2feed/public/templates/f2f/images/footer_DKBCT.jpg" alt="" width="180px">
				    </div>
				    
				</div>
			</div>
		</div>
	</div>
    <script src="/fast2feed/public/templates/f2f/bootstrap/js/bootstrap.min.js"></script>

    {{-- button scroll to top --}}
	 <div class='lentop'>
		<div>
			<img src='https://1.bp.blogspot.com/-k6sikOdzFXQ/VwqCKDosmEI/AAAAAAAAKxE/nLxLhkTIO6o3iE5ZWmtxo2bf4QHdzPQNQ/s1600/top.png'/>
		</div>
	</div>
	
	{{-- jquery scroll to rop --}}
	<script>
		$(function(){
			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) $(".lentop").fadeIn();
				else $(".lentop").fadeOut();
				});
				$(".lentop").click(function () {
				$("body,html").animate({scrollTop: 0}, "slow");
			});
		});
	</script>
</body>
</html>