@extends('frontend.layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css') }}">

	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 ">
					<div class="cart_container">
						<div class="cart_title">Your Wishlist</div>
						<div class="cart_items">
							<ul class="cart_list">
							@foreach($product as $row)
							@php
						       $color=$row->product_color;
						       $product_color = explode(',', $color);

						       $size=$row->product_size;
						       $product_size = explode(',', $size);
							@endphp
								<li class="cart_item clearfix">
									<div class="cart_item_image"><img src="{{ asset( $row->image_one) }}" style="height: 100px;"></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">{{ $row->product_name }}</div>
										</div>

								<form action="{{ url('/cart/product/add/'.$row->id) }}" method="post">
									@csrf
										@if($row->product_color == NULL)
										@else
										<div class="row">
										<div class="col-lg-4">
										 	 <div class="form-group">
											    <label for="exampleFormControlSelect1">Color</label>
											    <select class="form-control input-lg" id="exampleFormControlSelect1" name="color">
											    	@foreach($product_color as $color)
											          <option value="{{ $color }}">{{ $color }}</option>
											      	@endforeach
											    </select>
											  </div>
										 </div>
										@endif

										@if($row->product_size == NULL)
										@else
										<div class="col-lg-4">
										 	 <div class="form-group">
											    <label for="exampleFormControlSelect1">Size</label>
											    <select class="form-control input-lg" id="exampleFormControlSelect1" name="size">
											    	@foreach($product_size as $size)
											          <option value="{{ $size }}">{{ $size }}</option>
											      	@endforeach
											    </select>
											  </div>
										 </div>
										@endif

										 <div class="col-lg-4">
										 	 <div class="form-group">
										    <label for="exampleFormControlSelect1">Quantity</label>
										 		<input class="form-control" type="number" pattern="[0-9]*" value="1" name="qty">
										  </div>
										 </div>

								 			@if($row->discount_price == NULL)
                                              <span > Price : TK. {{ $row->selling_price }}</span>
                                            @else
                                            @endif
                                            @if($row->discount_price != NULL)
                                              <span >Price: TK. {{ $row->discount_price }}</span>
                                            @else
                                            @endif

										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Action</div><br><br>
											<a href="{{ URL::to('remove/wishlist/'.$row->id) }}" class="btn btn-sm btn-danger">X</a>
											<button class="btn btn-sm btn-danger">Add To Cart</button>
										</div>
											
									</div>
								</form>
									</div>
								</li>
								@endforeach
							</ul>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
<script src="{{ asset('public/frontend/js/cart_custom.js') }}"></script>
@endsection