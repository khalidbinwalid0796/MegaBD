@extends('backend.layouts.admin')

@section('admin_content')
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Update Category</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40" style="width: 700px">
          <h3>Update Category
            <a class="btn btn-success float-sm-right" href="{{route('categories')}}"><i class="fa fa-list"></i>Category List</a>
          </h3>
          <br>
          <div class="table-wrapper">
            <form method="post" action="{{ url('update/category/'.$category->id) }}">
              @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name</label>
                  <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $category->category_name }}" name="category_name">

              @error('category_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>

                <button type="submit" class="btn btn-info pd-x-20 float-sm-right">Update</button>
              </div>
            </form>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->
    </div>
@endsection
