@extends('backend.layouts.admin')

@section('admin_content')

@php 
  $category=DB::table('post_category')->get();
@endphp

    <div class="sl-mainpanel">
      <div class="sl-pagebody">
                <div class="sl-page-title">
          <h5>Post Table</h5>
        </div><!-- sl-page-title -->
      	   <div class="card pd-20 pd-sm-40">
          <h3>Update Post
            <a class="btn btn-success float-sm-right" href="{{route('all.blogpost')}}"><i class="fa fa-list"></i>Post List</a>
          </h3>
          <h6 class="card-body-title"> Post Update </h6>
          <p class="mg-b-20 mg-sm-b-30">Update Post </p>
          <form action="{{ url('update/post/'.$post->id) }}" method="post" enctype="multipart/form-data">
          	@csrf
          
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Post Title (ENGLISH ): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_en"  value="{{ $post->post_title_en }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Post Title (BANGLA ): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_bn"  value="{{ $post->post_title_bn }}">
                </div>
              </div><!-- col-4 -->
             
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                    <option label="Choose Category"></option>
                    @foreach($category as $row)
                    <option value="{{ $row->id }}" <?php if ($row->id == $post->category_id) {
                       echo "selected";
                    } ?> >{{ $row->category_name_en }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label">Product Details (English)<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote" name="details_en">
                   	 {{ $post->details_en }}
                   </textarea>
                </div>	
              </div>

              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label">Product Details (Bangla)<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote1" name="details_bn">
                   	{{ $post->details_bn }}
                   </textarea>
                </div>	
              </div>

          <div class="col-lg-4">
            <div class="form-group">
              <label for="profile_image">Post Image (Main Thumbnail)</label>
                  <input type="file" class="form-control" name="post_image" id="post_image" >
                  <input type="hidden" name="old_one" value="{{ $post->post_image }}">
            </div>
            <div class="form-group">
             <div class="row">
                <div class="col-md-4">
                  <img id="showImage" src="{{(!empty($post->post_image))?URL::to($post->post_image) :url('public/products/no_image.png') }}" style="width: 100px;height: 110px;">
                  
                </div>
              </div>
            </div> 
          </div>
             
            </div><!-- row -->
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Update </button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->
       
      </div><!-- sl-pagebody --> 
    </div><!-- sl-mainpanel -->


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>


<script type="text/javascript">
  $(document).ready(function(){
    $('#post_image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>

@endsection
