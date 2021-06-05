@extends('backend.layouts.admin')

@section('admin_content')
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Update SubCategory</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40" style="width: 700px">
          <h3>Update SubCategory
            <a class="btn btn-success float-sm-right" href="{{route('subcategories')}}"><i class="fa fa-list"></i>SubCategory List</a>
          </h3>
          <br>
          <div class="table-wrapper">
            <form method="post" action="{{ url('update/subcategory/'.$subcat->id) }}">
              @csrf
              <div class="modal-body pd-20">

                <div class="form-group">
                  <label for="exampleInputEmail1">SubCategory Name</label>
                  <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $subcat->subcategory_name }}" name="subcategory_name">

              @error('subcategory_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>

                <div class="form-group">
                  <label for="category_id">Category Name</label>
                  <select class="form-control" name="category_id">
                    <option value="">Select Category</option>
                    @foreach($category as $row)
                    <option value="{{ $row->id }}"
                        <?php if ($row->id == $subcat->category_id) {
                             echo "selected";
                            } 
                        ?> 
                      >{{ $row->category_name }}</option>
                    @endforeach

                  </select>

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
