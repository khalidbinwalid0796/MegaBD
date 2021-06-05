@extends('backend.layouts.admin')

@section('admin_content')
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Update Category</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40" style="width: 700px">
          <h3>Update Category
            <a class="btn btn-success float-sm-right" href="{{route('post.categories')}}"><i class="fa fa-list"></i>Category List</a>
          </h3>
          <br>
          <div class="table-wrapper">
            <form method="post" action="{{ url('update/postcategory/'.$category->id) }}">
              @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name English</label>
                  <input type="text" class="form-control @error('category_name_en') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $category->category_name_en }}" name="category_name_en">

              @error('category_name_en')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name Bangla</label>
                  <input type="text" class="form-control @error('category_name_bn') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $category->category_name_bn }}" name="category_name_bn">

              @error('category_name_bn')
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
