@if($tmp == 0)
@php
	$countPrice = number_format($priceProduct * $amountProduct);
@endphp
	<div class="giohang" style="height: 45px;">
		<a href="#" title=""><i class="fa fa-plus-square" aria-hidden="true" style="color: green"></i></a>
			<strong ><span class="onCartProduct1_{{$idProduct}}">{{ $amountProduct }}</span></strong>
		<a href="#" title=""><i class="fa fa-minus-square" aria-hidden="true" style="color: black"></i></a>
		<strong>{{ $nameProduct }}</strong>
		<input type="text" name="" style="border: none" placeholder="Thêm ghi chú..."><span style="float: right;">{{ $countPrice }}đ</span>
	</div>
@elseif($tmp == 1)
			<span id="onCartProduct1_{{$idProduct}}" class="onCartProduct1_{{$idProduct}}" data-newCountPrice="{{ $newCountPrice }}">{{ $newAmount }}</span>
@endif