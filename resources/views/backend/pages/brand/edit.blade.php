@extends('backend.layouts.admin')

@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Brand Update</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40" style="width: 800px">
          <h3>Update Brand
            <a class="btn btn-success float-sm-right" href="{{route('brands')}}"><i class="fa fa-list"></i>Brand List</a>
          </h3>
          <br>
          <div class="table-wrapper">

            <form method="post" action="{{ url('update/brand/'.$brand->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                  <label for="exampleInputEmail1">Brand Name</label>
                  <input type="text" class="form-control @error('brand_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brand->brand_name }}" name="brand_name" required="">
                </div>
              @error('brand_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror  
                <div class="form-group">
                  <label for="exampleInputEmail1">Brand Logo</label>
                  <input type="file" class="form-control @error('brand_logo') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp"  name="brand_logo">
                </div>
              @error('brand_logo')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                <div class="form-group">
                  <label for="exampleInputEmail1">Old Logo</label>
                 <img src="{{ URL::to($brand->brand_logo) }}" style="height: 70px; width: 90px;">
                 <input type="hidden" name="old_logo" value="{{ $brand->brand_logo }}">
                </div>
                  <button type="submit" class="btn btn-info pd-x-20 float-sm-right">Update</button>
              </div>
            </form>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->



@endsection