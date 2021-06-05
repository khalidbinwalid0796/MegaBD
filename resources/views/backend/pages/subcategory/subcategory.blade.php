@extends('backend.layouts.admin')

@section('admin_content')
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>SubCategory Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h3 class="">SubCategory List
            <a href="#" class="btn btn-sm btn-success" style="float: right;" data-toggle="modal" data-target="#modaldemo3"><i class="fa fa-plus-circle"></i>Add SubCategory</a>
          </h3>
          <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Category Name</th>
                  <th class="wd-15p">SubCategory Name</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($subcategory as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->category_name }}</td>
                  <td>{{ $row->subcategory_name }}</td>
                  <td>
                    <a title="Edit" class="btn btn-sm btn-primary" href="{{ URL::to('edit/subcategory/'.$row->id) }}"><i class="fa fa-edit"></i></a>
                    <a title="Delete" class="btn btn-sm btn-danger" id="delete" href="{{ URL::to('delete/subcategory/'.$row->id) }}"><i class="fa fa-trash"></i></a>
                  </td>
                 
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->


<!--category added modal-->
        <div id="modaldemo3" class="modal fade" >
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm" style="width: 600px">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-inverse tx-bold">SubCategory Add</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

            <form method="post" action="{{ route('store.subcategory') }}">
              @csrf
              <div class="modal-body pd-20">

                <div class="form-group">
                  <label for="category_id">Category Name</label>
                  <select name="category_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach($category as $row)
                    <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                    @endforeach
                  </select>
              @error('subcategory_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">SubCategory Name</label>
                  <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter SubCategory" name="subcategory_name" required="">
              @error('subcategory_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div> 

              </div><!-- modal-body -->

              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
    </div>
@endsection
