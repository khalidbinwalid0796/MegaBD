@extends('backend.layouts.admin')

@section('admin_content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">

    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Product Table</h5>
        </div><!-- sl-page-title -->
      	 <div class="card pd-20 pd-sm-40">
          <h3>Add Product
            <a class="btn btn-success float-sm-right" href="{{route('all.product')}}"><i class="fa fa-list"></i>Product List</a>
          </h3>
          <br>

  @if ($errors->any())
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </ul>
    </div>
  @endif
          <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
          	@csrf
          
          <div class="form-layout">
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label @error('product_name') is-invalid @enderror">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name"  >
                </div>
              @error('product_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label @error('product_code') is-invalid @enderror">Product Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code"  >
                </div>
              @error('product_code')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label @error('product_quantity') is-invalid @enderror">Quantity <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity"  >
              @error('product_quantity')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror                  
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select name="category_id" id="category_id" class="form-control select2-show-search" data-placeholder="Choose Category">
                    <option label="Choose Category"></option>
                    @foreach($category as $row)
                    <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                  <select name="subcategory_id" id="subcategory_id" class="form-control select2-show-search">
                    <option value="">Select SubCategory</option>
                    
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" data-placeholder="Choose Brand" name="brand_id">
                    <option label="Choose Brand"></option>
                    @foreach($brand as $br)
                    <option value="{{ $br->id }}">{{ $br->brand_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label><br>
                  <input class="form-control" type="text" name="product_size" id="size" data-role="tagsinput">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label><br>
                  <input class="form-control lg-4" type="text" name="product_color" data-role="tagsinput" id="color" >
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling Price <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="selling_price"  placeholder="Selling Price">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label">Product Details<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote" name="product_details">
                   	
                   </textarea>
                </div>	
              </div>

              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label">Video Link<span class="tx-danger">*</span></label>
                   <input class="form-control" placeholder="video link" name="video_link">
                </div>	
              </div>  

              <div class="col-lg-4">
                <lebel>Image One (Main Thumbnail)<span class="tx-danger">*</span></lebel>
                <label class="custom-file">
                <input type="file" id="file" class="custom-file-input @error('image_one') is-invalid @enderror" name="image_one" onchange="readURL(this);"  accept="image">
                <span class="custom-file-control"></span>
                <img id="one" style="margin-top: 50px;">
              </label>
              @error('image_one')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror 
              </div>

              <div class="col-lg-4">
                <lebel>Image Two <span class="tx-danger"></span></lebel></br>
                <label class="custom-file">
                <input type="file" id="file" class="custom-file-input @error('image_two') is-invalid @enderror" name="image_two" onchange="readURL1(this);" accept="image">
                <span class="custom-file-control"></span>
                <img id="two" style="margin-top: 50px;">
                </label>
              </div>

              <div class="col-lg-4">
                <lebel>Image Three <span class="tx-danger"></span></lebel></br>
                <label class="custom-file">
                <input type="file" id="file" class="custom-file-input @error('image_three') is-invalid @enderror"  name="image_three" onchange="readURL2(this);" accept="/image">
                <span class="custom-file-control"></span>
                <img id="three" style="margin-top: 50px;">
                </label>
              </div>

            </div><!-- row -->
            <br><hr>
            <div class="row">

              	<div class="col-lg-4">
                		<label class="ckbox">
            					  <input type="checkbox" name="main_slider" value="1">
            					  <span>Main Slider</span>
          					</label>
              	</div>

              	<div class="col-lg-4">
                		<label class="ckbox">
            					  <input type="checkbox" name="hot_deal" value="1">
            					  <span>Hot Deal</span>
    					     </label>
              	</div>

              	<div class="col-lg-4">
                		<label class="ckbox">
            					  <input type="checkbox" name="best_rated" value="1">
            					  <span>Best Rated</span>
    					     </label>
              	</div>

              	<div class="col-lg-4">
                		<label class="ckbox">
            					  <input type="checkbox" name="trend" value="1">
            					  <span>Trend Product</span>
    					       </label>
              	</div>

              	<div class="col-lg-4">
                		<label class="ckbox">
            					  <input type="checkbox" name="mid_slider" value="1">
            					  <span>Mid Slider</span>
    					     </label>
              	</div>

              	<div class="col-lg-4">
                		<label class="ckbox">
            					  <input type="checkbox" name="hot_new" value="1">
            					  <span>Hot New</span>
          					</label>
              	</div>

                <div class="col-lg-4">
                    <label class="ckbox">
                        <input type="checkbox" name="buyone_getone" value="1">
                        <span>Buy One Get One</span>
                    </label>
                </div>
            </div>

            <br><br><hr>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Submit </button>
            </div><!-- form-layout-footer -->

        </div><!-- form-layout -->
          </form>
        </div><!-- card -->
       
      </div><!-- sl-pagebody --> 
    </div><!-- sl-mainpanel -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>

<!-- <script type="text/javascript">
    $(document).ready(function() {
         $('select[name="category_id"]').on('change', function(){
             var category_id = $(this).val();
             if(category_id) {
                 $.ajax({
                     url: "{{  url('/get/subcategory/') }}/"+category_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        var d =$('select[name="subcategory_id"]').empty();
                           $.each(data, function(key, value){

                               $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');
                           });
                     },
                 });
             } else {
                 alert('danger');
             }
         });
     });
</script> -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','#category_id',function(){
      var category_id = $(this).val();
      $.ajax({
        url:"{{url('/get/subcategory/')}}/"+category_id,
        type:"GET",
        data:{category_id:category_id},
        success:function(data){
          var html = '<option value="">Select SubCategory</option>';
          $.each(data,function(key,v){
            html +='<option value="'+v.subcategory_id+'">'+v.subcategory_name+'</option>';
          });
          $('#subcategory_id').html(html);
        }
      });
    });
  });
</script>
<script type="text/javascript">
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#one')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

<script type="text/javascript">
  function readURL1(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#two')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);

          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

<script type="text/javascript">
  function readURL2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#three')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);


          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

@endsection
