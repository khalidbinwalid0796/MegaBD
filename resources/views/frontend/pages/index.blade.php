@extends('frontend.layouts.app')

@section('content')

@include('frontend.layouts.menubar')

@php 
  $featured=DB::table('products')->where('status',1)->orderBy('id','desc')->limit(24)->get();

  $trend=DB::table('products')->where('status',1)->where('trend',1)->orderBy('id','desc')->limit(24)->get();

  $hot_deal=DB::table('products')->join('brands','products.brand_id','brands.id')->select('brands.brand_name','products.*')->where('products.status',1)->where('hot_deal',1)->orderBy('id','desc')->limit(4)->get();
@endphp
    <!-- Characteristics -->



    <!-- Deals of the week -->

    <div class="deals_featured">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
                    
                    <!-- Deals -->

<div class="deals">
    <div class="deals_title">Deals of the Week</div>
    <div class="deals_slider_container">     
        <!-- Deals Slider -->
    <div class="owl-carousel owl-theme deals_slider">
        @foreach($hot_deal as $ht)
        <!-- Deals Item -->
        <div class="owl-item deals_item">
            <div class="deals_image">
                <img src="{{ asset($ht->image_one) }}" style="width: 140px;">
            </div>
            <div class="deals_content">
                <div class="deals_info_line d-flex flex-row justify-content-start">
                    <div class="deals_item_category"><a href="#">{{ $ht->brand_name }}</a></div>
                    @if($ht->discount_price == NULL)
                    @else
                    <div class="deals_item_price_a ml-auto">TK. {{ $ht->selling_price }}</div>
                    @endif
                </div>
                <div class="deals_info_line d-flex flex-row justify-content-start">
                    <div class="deals_item_name">{{ $ht->product_name }}</div>
                    @if($ht->discount_price == NULL)
                      <div class="deals_item_price ml-auto">TK. {{ $ht->selling_price }}</div>
                    @else
                    @endif
                    @if($ht->discount_price != NULL)
                      <div class="deals_item_price ml-auto">TK. {{ $ht->discount_price }}</div>
                    @else
                    @endif
                </div>

                <div class="available">
                    <div class="available_line d-flex flex-row justify-content-start">
                        <div class="available_title">Available: <span>{{ $ht->product_quantity }}</span></div>
                    @php
                        $sold=DB::table('order_details')->where('product_id',$ht->id)->sum('quantity');
                    
                    @endphp
                        <div class="sold_title ml-auto">Already sold: 

                            <span>{{ $sold}}</span>
                        </div>

                    </div>
                    <div class="available_bar"><span style="width:17%"></span></div>
                </div>

                <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                    <div class="deals_timer_title_container">
                        <div class="deals_timer_title">Hurry Up</div>
                        <div class="deals_timer_subtitle">Offer ends in:</div>
                    </div>
                    <div class="deals_timer_content ml-auto">
                        <div class="deals_timer_box clearfix" data-target-time="">
                            <div class="deals_timer_unit">
                                <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                <span>hours</span>
                            </div>
                            <div class="deals_timer_unit">
                                <div id="deals_timer1_min" class="deals_timer_min"></div>
                                <span>mins</span>
                            </div>
                            <div class="deals_timer_unit">
                                <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                <span>secs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach 
    </div>

    </div>

    <div class="deals_slider_nav_container">
        <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
        <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
    </div>
</div>


                <!-- Featured -->
                <div class="featured">
                    <div class="tabbed_container">
                        <div class="tabs">
                            <ul class="clearfix">
                                <li class="active">Featured</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>

                        <!-- Product Panel -->
                        <div class="product_panel panel active">
                            <div class="featured_slider slider">

                            @foreach($featured as $row)
                                <!-- Slider Item -->
                                <div class="featured_slider_item">
                                    <div class="border_active"></div>
                                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center" >
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}"><img src="{{asset($row->image_one)}}" style="height: 120px; width: 130px;" alt=""></a></div>
                                        <div class="product_content">
                                        @if($row->discount_price == NULL)
                                            <br><div class="text-danger"><b>TK. {{ $row->selling_price }} </b></div>
                                        @else
                                         <div class="product_price discount" style="margin-top: 0px;">TK. {{ $row->discount_price }}<span>TK. {{ $row->selling_price }}</span></div>
                                        @endif

                                            <div class="product_name"><div><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">
                                                {{ $row->product_name }}
                                            </a></div></div>
                                            
                                            <!-- Add to cart -->

                                            <div class="product_extras">
                                                <button id="{{ $row->id }}" class="product_cart_button addcart" data-toggle="modal" data-target="#cartmodal"  onclick="productview(this.id)">Add to Cart</button>
                                            </div>
                                        </div>

                                       <!--  <div class="product_fav"><i class="fas fa-heart"></i></div> -->

                                        <!-- Add to wishlist -->

                                         <button  
                                           class="addwishlist" data-id="{{ $row->id }}" style="border-style: none;"> 
                                           <div class="product_fav">
                                              <i class="fas fa-heart"></i>  
                                           </div>
                                        </button>

                                        <ul class="product_marks">
                                            @if($row->discount_price == NULL)
                                             <li class="product_mark product_discount" style="background: green">NEW</li>
                                            @else

                                            @php
                                            $amount=$row->selling_price - $row->discount_price;
                                            $discount=($amount/$row->selling_price )* 100;
                                            @endphp 
                                             <li class="product_mark product_discount">
                                           
                                           {{ intval($discount) }}%
                                            </li>
                                             @endif
                                        </ul>
                                    </div>
                                </div>
                            @endforeach

                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Popular Categories -->


    <!-- Banner -->
@php 
    $mid=DB::table('products')->join('categories','products.category_id','categories.id')
        ->join('brands','products.brand_id','brands.id')->select('products.*','brands.brand_name','categories.category_name')->where('products.mid_slider',1)->orderBy('id','DESC')->limit(4)->get();
@endphp
    <div class="banner_2">
        <div class="banner_2_background" style="background-image:url({{ asset('public/frontend/images/banner_2_background.jpg') }})"></div>
        <div class="banner_2_container">
            <div class="banner_2_dots"></div>
            <!-- Banner 2 Slider -->
        <div class="owl-carousel owl-theme banner_2_slider">
            @foreach($mid as $row) 
                <!-- Banner 2 Slider Item -->
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category">{{ $row->category_name }}</div>
                                        <div class="banner_2_title">{{ $row->product_name }}</div>
                                        <div class="banner_2_text">{{ $row->brand_name }} <br>Product Id: {{ $row->product_code }}.</div>
                                        <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="button banner_2_button"><a href="#">Explore</a></div>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img src="{{ asset($row->image_one) }}" style="height: 300px; width: 320px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>          
                    </div>
                </div>
             @endforeach   
            

            </div>
        </div>
    </div>

    <!-- Hot New Arrivals (New Trend) -->

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">New Trend</div>
                            <ul class="clearfix">
                                <li class="active"></li>
                              
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12" style="z-index:1;">

                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="arrivals_slider slider">
                                @foreach($trend as $row)
                                        <!-- Slider Item -->
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}"><img src="{{ asset($row->image_one) }}" style="height: 120px; width: 130px;"></a></div>
                                            <div class="product_content">
                                            @if($row->discount_price == NULL)
                                                <br><div class="text-danger"><b>TK. {{ $row->selling_price }} </b></div>
                                            @else
                                             <div class="product_price discount" style="margin-top: 0px;">TK. {{ $row->discount_price }}<span>TK. {{ $row->selling_price }}</span></div>
                                            @endif
                                                <div class="product_name"><div><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">
                                                    {{ $row->product_name }}
                                                </a></div></div>

                                            <!--                                            
                                                <div class="product_extras">
                                                    <button class="product_cart_button addtocart" data-id="{{ $row->id }}" >Add to Cart</button>
                                                </div> 
                                            -->

                                                <div class="product_extras">
                                                    <button id="{{ $row->id }}" class="product_cart_button addcart" data-toggle="modal" data-target="#cartmodal"  onclick="productview(this.id)">Add to Cart</button>
                                                </div>
                                            </div>

                                             <button  
                                               class="addwishlist" data-id="{{ $row->id }}" style="border-style: none;"> 
                                               <div class="product_fav">
                                                  <i class="fas fa-heart"></i>  
                                               </div>
                                            </button>
                                            
                                            <ul class="product_marks">
                                                 @if($row->discount_price == NULL)
                                                 <li class="product_mark product_discount" style="background: green;">Trend</li>

                                                 @else
                                                @php
                                                $amount=$row->selling_price - $row->discount_price;
                                                $discount=$amount/$row->selling_price * 100;
                                                @endphp 
                                                 <li class="product_mark product_discount">
                                               
                                               {{ intval($discount) }}%
                                                </li>
                                                 @endif
                                                
                                               
                                            </ul>
                                        </div>
                                    </div>
                                        @endforeach
                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>
                            </div> 
                        </div>
                                
                    </div>
                </div>
            </div>
        </div>      
    </div>

@php 

$cats=DB::table('categories')->first();
$category_id=$cats->id;
$products=DB::table('products')->where('category_id',$category_id)->where('status',1)->limit(16)->orderBy('id','DESC')->get();

@endphp
    <!-- Category wise product show -->
    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">{{ $cats->category_name }}</div>
                            <ul class="clearfix">
                                <li class="active"></li>
                              
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12" style="z-index:1;">

                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="arrivals_slider slider">
                                @foreach($products as $row)
                                        <!-- Slider Item -->
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}"><img src="{{ asset($row->image_one) }}" style="height: 120px; width: 130px;"></a></div>
                                            <div class="product_content">
                                            @if($row->discount_price == NULL)
                                                <br><div class="text-danger"><b>TK. {{ $row->selling_price }} </b></div>
                                            @else
                                             <div class="product_price discount" style="margin-top: 0px;">TK. {{ $row->discount_price }}<span>TK. {{ $row->selling_price }}</span></div>
                                            @endif
                                                <div class="product_name"><div><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">
                                                    {{ $row->product_name }}
                                                </a></div></div>
                                                
                                                <div class="product_extras">
                                                    <button id="{{ $row->id }}" class="product_cart_button addcart" data-toggle="modal" data-target="#cartmodal"  onclick="productview(this.id)">Add to Cart</button>
                                                </div>

                                            </div>

                                             <button  
                                               class="addwishlist" data-id="{{ $row->id }}" style="border-style: none;"> 
                                               <div class="product_fav">
                                                  <i class="fas fa-heart"></i>  
                                               </div>
                                            </button>

                                            <ul class="product_marks">
                                                 @if($row->discount_price == NULL)
                                                 <li class="product_mark product_discount" style="background: blue;">New</li>

                                                 @else
                                                @php
                                                $amount=$row->selling_price - $row->discount_price;
                                                $discount=$amount/$row->selling_price * 100;
                                                @endphp 
                                                 <li class="product_mark product_discount">
                                               
                                               {{ intval($discount) }}%
                                                </li>
                                                 @endif
                                                
                                               
                                            </ul>
                                        </div>
                                    </div>
                                        @endforeach
                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>                  

                            </div>

                        </div>
                                
                    </div>
                </div>
            </div>
        </div>      
    </div>



    <!-- Buy One Get One -->

    <!-- Trends(Buy One Get One) -->

    <div class="trends">
        <div class="trends_background" style="background-image:url({{ asset('public/frontend/images/trends_background.jpg') }})"></div>
        <div class="trends_overlay"></div>
        <div class="container">
            <div class="row">

                <!-- Buy One Get One Content -->
                <div class="col-lg-3">
                    <div class="trends_container">
                        <h2 class="trends_title">Buy One Get One</h2>
                        <div class="trends_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p></div>
                        <div class="trends_slider_nav">
                            <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                    </div>
                </div>
            @php
             $buyget=DB::table('products')->where('status',1)->where('buyone_getone',1)->orderBy('id','desc')->limit(12)->get();
            @endphp
                <!-- Trends Slider -->
                <div class="col-lg-9">
                    <div class="trends_slider_container">

                        <!-- Trends Slider -->

                        <div class="owl-carousel owl-theme trends_slider">
                        @foreach($buyget as $row)
                            <!-- Trends Slider Item -->
                            <div class="owl-item">
                                <div class="trends_item is_new">
                                    <div class="trends_image d-flex flex-column align-items-center justify-content-center"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}"><img src="{{ asset($row->image_one) }}" style="height: 220px;"></a></div>
                                    <div class="trends_content">
                                       
                                        <div class="trends_info clearfix">
                                            <div class="trends_name"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">
                                                    {{ $row->product_name }}
                                                </a></div><br>

                                            <!-- <div class="trends_price">$379</div> -->
                                            @if($row->discount_price == NULL)
                                                <br><span class="text-danger"><b>TK. {{ $row->selling_price }} </b></span>
                                            @else
                                             <br><span class="text-danger"><b>TK. {{ $row->discount_price }}</b></span> <span>TK. {{ $row->selling_price }}</span>
                                            @endif
                                            <a href="" class="btn btn-danger btn-sm pull-right">add to cart</a>
                                        </div>

                                    </div>
                                    <ul class="trends_marks">
                                        
                                         @if($row->discount_price == NULL)
                                                 <li class="trends_mark trends_new">New</li>
                                                 @else
                                                @php
                                                $amount=$row->selling_price - $row->discount_price;
                                                $discount=$amount/$row->selling_price * 100;
                                                @endphp 
                                                 <li class="trends_mark trends_new">
                                               
                                               {{ intval($discount) }}%
                                                </li>
                                        @endif

                                        
                                    </ul>     
                                       
                                    <button  
                                       class="addwishlist" data-id="{{ $row->id }}" style="border-style: none;"> 
                                       <div class="trends_fav">
                                          <i class="fas fa-heart"></i>  
                                       </div>
                                    </button>
                                </div>
                            </div>
                           @endforeach 
                         

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Reviews -->

    <div class="reviews">
        <div class="container">
            <div class="row">
                <div class="col">
                    
                    <div class="reviews_title_container">
                        <h3 class="reviews_title">Latest Reviews</h3>
                        <div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div>
                    </div>

                    <div class="reviews_slider_container">
                        
                        <!-- Reviews Slider -->
                        <div class="owl-carousel owl-theme reviews_slider">
                            
                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ asset('public/frontend/images/review_1.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Roberto Sanchez</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ asset('public/frontend/images/review_1.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Brandon Flowers</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ asset('public/frontend/images/review_1.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Emilia Clarke</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ asset('public/frontend/images/review_1.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Roberto Sanchez</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ asset('public/frontend/images/review_1.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Brandon Flowers</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ asset('public/frontend/images/review_1.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Emilia Clarke</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="reviews_dots"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Brands -->

    <div class="brands">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brands_slider_container">
                        
                        <!-- Brands Slider -->

                        <div class="owl-carousel owl-theme brands_slider">
                            
                            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_1.jpg') }}" alt=""></div></div>
                            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_2.jpg') }}" alt=""></div></div>
                            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_3.jpg') }}" alt=""></div></div>
                            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_4.jpg') }}" alt=""></div></div>
                            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_5.jpg') }}" alt=""></div></div>
                            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_6.jpg') }}" alt=""></div></div>
                            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_7.jpg') }}" alt=""></div></div>
                            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_8.jpg') }}" alt=""></div></div>

                        </div>
                        
                        <!-- Brands Slider Navigation -->
                        <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->


    
    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                        <div class="newsletter_title_container">
                            <div class="newsletter_icon"><img src="{{ asset('public/frontend/images/send.png') }}" alt=""></div>
                            <div class="newsletter_title">Sign up for Newsletter</div>
                            <div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
                        </div>
                        <div class="newsletter_content clearfix">
                            <form action="{{ route('store.newslatter') }}" class="newsletter_form" method="post">
                                @csrf
                                <input type="email" class="newsletter_input" required="required" placeholder="Enter your email address" name="email">
                                <button class="newsletter_button" type="submit">Subscribe</button>
                            </form>
                            <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--product cart add modal-->

<!-- Modal -->
<div class="modal fade " id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Product Short Description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
          <div class="col-md-4">
              <div class="card" style="width: 16rem;">
              <img src="" class="card-img-top" id="pimage" style="height: 240px;">
              <div class="card-body">
               
              </div>
            </div>
          </div>
          <div class="col-md-4 ml-auto">
            <ul class="list-group">
                <li class="list-group-item"> <h5 class="card-title" id="pname"></h5></span></li>
                <li class="list-group-item">Product code: <span id="pcode"> </span></li>
                <li class="list-group-item">Category:  <span id="pcat"> </span></li>
                <li class="list-group-item">SubCategory:  <span id="psubcat"> </span></li>
                <li class="list-group-item">Brand: <span id="pbrand"> </span></li>
                <li class="list-group-item">Stock: <span id="pqty" class="badge " style="background: green; color:white;"></span></li>
            </ul>
          </div>
          <div class="col-md-4 ">
              <form action="{{ route('insert.into.cart') }}" method="post">
                @csrf
                <input type="hidden" name="product_id" id="product_id">
                <div class="form-group" id="colordiv">
                  <label for="">Color</label>
                  <select name="color" class="form-control" id="color">
                  </select>
                </div>
                 <div class="form-group" id="sizediv" >
                  <label for="exampleInputEmail1">Size</label>
                  <select name="size" class="form-control" id="size">
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Quantity</label>
                  <input type="number" class="form-control" value="1" name="qty">
                </div>
                <button type="submit" class="btn btn-primary">Add To Cart</button>
              </form>
           </div>
         </div>
      </div>  
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!--modal end-->
<!-- modal a data show using ajax -->
<script type="text/javascript">
    function productview(id){
          $.ajax({
                 url: "{{  url('/cart/product/view/') }}/"+id,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {
                    //field ar id dhore data show
                   $('#pname').text(data.product.product_name);
                   $('#pimage').attr('src',data.product.image_one);
                   $('#pcat').text(data.product.category_name);
                   $('#psubcat').text(data.product.subcategory_name);
                   $('#pbrand').text(data.product.brand_name);
                   $('#pcode').text(data.product.product_code);
                   $('#pqty').text(data.product.product_quantity);
                   //catch the id
                   $('#product_id').val(data.product.id);

                    var d =$('select[name="size"]').empty();
                     $.each(data.size, function(key, value){
                         $('select[name="size"]').append('<option value="'+ value +'">' + value + '</option>');
                          if (data.size == "") {
                                 $('#sizediv').hide();   
                          }else{
                                $('#sizediv').show();
                          } 
                     });

                    var d =$('select[name="color"]').empty();
                     $.each(data.color, function(key, value){
                         $('select[name="color"]').append('<option value="'+ value +'">' + value + '</option>');
                           if (data.color == "") {
                                 $('#colordiv').hide();
                          } else{
                               $('#colordiv').show();
                          }
                     });
             }
      })
    }
</script>

<!-- ajax wishlist -->
<script type="text/javascript">
      $(document).ready(function() {
            $('.addwishlist').on('click', function(){  
              var id = $(this).data('id');
              if(id) {
                 $.ajax({
                     url: "{{  url('/add/wishlist/') }}/"+id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        //sweetalert message code
                       const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000
                        })

                       if($.isEmptyObject(data.error)){
                            Toast.fire({
                              type: 'success',
                              title: data.success
                            })
                       }else{
                             Toast.fire({
                                type: 'error',
                                title: data.error
                            })
                       }
                    //sweetalert message code end
                     },
                    
                 });
             } else {
                 alert('danger');
             }
              e.preventDefault();
         });
     });

</script>

@endsection 