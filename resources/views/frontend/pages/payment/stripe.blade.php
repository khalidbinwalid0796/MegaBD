@extends('frontend.layouts.app')

@section('content')
<script src="https://js.stripe.com/v3/"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css')}}">
<style type="text/css">
	/**
	 * The CSS shown here will not be introduced in the Quickstart guide, but shows
	 * how you can use CSS to style your Element's container.
	 */
	.StripeElement {
	  box-sizing: border-box;

	  height: 40px;

	  padding: 10px 12px;

	  border: 1px solid transparent;
	  border-radius: 4px;
	  background-color: white;

	  box-shadow: 0 1px 3px 0 #e6ebf1;
	  -webkit-transition: box-shadow 150ms ease;
	  transition: box-shadow 150ms ease;
	}

	.StripeElement--focus {
	  box-shadow: 0 1px 3px 0 #cfd7df;
	}

	.StripeElement--invalid {
	  border-color: #fa755a;
	}

	.StripeElement--webkit-autofill {
	  background-color: #fefde5 !important;
	}
</style>
@php  
	$setting=DB::table('settings')->first();
	$charge=$setting->shipping_charge;
	$cart=Cart::content();
@endphp
    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 "  style="border-right: 1px solid grey; padding: 20px;">
                    <div class="cart_container">
                    	<div class="contact_form_title text-center">Cart Products</div>
						<div class="cart_items">
							<ul class="cart_list">
							@foreach($cart as $row)
								<li class="cart_item clearfix">
								
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">{{ $row->name }}</div>
										</div>
										@if($row->options->color == NULL)
										@else
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text">
													{{ $row->options->color }}
											</div>
										</div>
										@endif
										@if($row->options->size == NULL)
										@else
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Size</div>
											<div class="cart_item_text">
													{{ $row->options->size }}
											</div>
										</div>
										@endif
										
										

										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div>
											{{ $row->qty }}
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">TK. {{ $row->price }}</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">TK. {{ $row->price * $row->qty }}</div>
										</div>
										
									</div>
								</li>
								@endforeach
							</ul>
						</div>
						   <br><br><hr>
					
						<ul class="list-group col-lg-8" >
							  @if(Session::has('coupon'))
							       <li class="list-group-item">Subtotal :  <span style="float: right;"> TK. {{ Session::get('coupon')['balance'] }}</span> </li>
							        <li class="list-group-item">Coupon : ({{   Session::get('coupon')['name'] }})  <span style="float: right;">TK. {{ Session::get('coupon')['discount'] }} </span> </li>
							  	@else
							  	  <li class="list-group-item">Subtotal :  <span style="float: right;"> TK. {{ Cart::Subtotal() }}</span> </li>
							  	@endif
							  


							  <li class="list-group-item">Shipping Charge: <span style="float: right;"> TK. {{ $charge }}</span></li>
							  <li class="list-group-item">Vat :  <span style="float: right;"> 0</span></li>
							  @if(Session::has('coupon'))
							  <li class="list-group-item">Total:  <span style="float: right;">TK. {{ Session::get('coupon')['balance'] + $charge }}</span> </li>
							  @else
							       <li class="list-group-item">Total:  <span style="float: right;">TK. {{ Cart::Subtotal() + $charge }} </span> </li>
							  @endif
						</ul>
					</div>
                </div>

                 <div class="col-lg-5 " style=" padding: 20px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Pay Now</div>

						<form action="{{ route('stripe.charge') }}" method="post" id="payment-form">
							@csrf
						  <!-- stripe payment ar form -->
						  <div class="form-row">
						    <label for="card-element"  >
						      Credit or debit card
						    </label>
						    <div id="card-element" style="width: 600px;">
						      <!-- A Stripe Element will be inserted here. -->
						    </div>

						    <!-- Used to display form errors. -->
						    <div id="card-errors" role="alert"></div><br>
						  </div>
						<!-- stripe payment ar form end-->
                       <!-- extra data -->
                          <input type="hidden" name="shipping" value="{{ $charge }}">
                           <input type="hidden" name="vat" value="0">
                           <input type="hidden" name="total" value="{{ Cart::Subtotal() + $charge }}">
                        <!--   shipping details pass  -->
                         <input type="hidden" name="ship_name" value="{{ $data['name'] }}">
                         <input type="hidden" name="ship_email" value="{{ $data['email'] }}">
                         <input type="hidden" name="ship_phone" value="{{ $data['phone'] }}">
                         <input type="hidden" name="ship_address" value="{{ $data['address'] }}">
                         <input type="hidden" name="ship_city" value="{{ $data['city'] }}">
                         <input type="hidden" name="payment_type" value="{{ $data['payment'] }}">

						  <button class="btn btn-sm btn-success">Submit Payment</button>
						</form>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>

<script type="text/javascript">
	// Create a Stripe client.
	//publish key add
	var stripe = Stripe('pk_test_51HOzLpGCOpZOZeJfaZEgpbL44Yg0qGa7dfFWgwRgN3BlZKjUfGDcuQf27q60voKH7WRDDea4Q2wX5cPFxOrLSsYr00OsehAaZW');

	// Create an instance of Elements.
	var elements = stripe.elements();

	// Custom styling can be passed to options when creating an Element.
	// (Note that this demo uses a wider set of styles than the guide below.)
	var style = {
	  base: {
	    color: '#32325d',
	    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
	    fontSmoothing: 'antialiased',
	    fontSize: '16px',
	    '::placeholder': {
	      color: '#aab7c4'
	    }
	  },
	  invalid: {
	    color: '#fa755a',
	    iconColor: '#fa755a'
	  }
	};

	// Create an instance of the card Element.
	var card = elements.create('card', {style: style});

	// Add an instance of the card Element into the `card-element` <div>.
	card.mount('#card-element');

	// Handle real-time validation errors from the card Element.
	card.on('change', function(event) {
	  var displayError = document.getElementById('card-errors');
	  if (event.error) {
	    displayError.textContent = event.error.message;
	  } else {
	    displayError.textContent = '';
	  }
	});

	// Handle form submission.
	var form = document.getElementById('payment-form');
	form.addEventListener('submit', function(event) {
	  event.preventDefault();

	  stripe.createToken(card).then(function(result) {
	    if (result.error) {
	      // Inform the user if there was an error.
	      var errorElement = document.getElementById('card-errors');
	      errorElement.textContent = result.error.message;
	    } else {
	      // Send the token to your server.
	      stripeTokenHandler(result.token);
	    }
	  });
	});

	// Submit the form with the token ID.
	function stripeTokenHandler(token) {
	  // Insert the token ID into the form so it gets submitted to the server
	  var form = document.getElementById('payment-form');
	  var hiddenInput = document.createElement('input');
	  hiddenInput.setAttribute('type', 'hidden');
	  hiddenInput.setAttribute('name', 'stripeToken');
	  hiddenInput.setAttribute('value', token.id);
	  form.appendChild(hiddenInput);

	  // Submit the form
	  form.submit();
	}
</script>
@endsection
