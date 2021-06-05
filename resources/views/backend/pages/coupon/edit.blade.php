@extends('backend.layouts.admin')

@section('admin_content')
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Coupon Update</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40" style="width: 700px">
          <h3>Coupon Update
            <a class="btn btn-success float-sm-right" href="{{route('admin.coupon')}}"><i class="fa fa-list"></i>Coupon List</a>          
          </h3>
          <br>
          <div class="table-wrapper">
            <form method="post" action="{{ url('update/coupon/'.$coupon->id) }}">
              @csrf
              <div class="modal-body pd-20">
                <div class="form-group">	
                  <label for="exampleInputEmail1">Coupon Code</label>
                  <input type="text" class="form-control @error('coupon') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $coupon->coupon }}" name="coupon">
              @error('coupon')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>

                <div class="form-group">	
                  <label for="exampleInputEmail1">Coupon Discount</label>
                  <input type="text" class="form-control @error('discount') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $coupon->discount }}" name="discount">
              @error('discount')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>

              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
              </div>
            </form>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->



@endsection