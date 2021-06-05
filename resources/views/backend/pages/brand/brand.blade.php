@extends('backend.layouts.admin')

@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Brand Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h3 class="">Brand List
            <a href="{{route('brands')}}" class="btn btn-sm btn-success" style="float: right;" data-toggle="modal" data-target="#modaldemo3"><i class="fa fa-plus-circle"></i>Add Brand</a>
          </h3>
          <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Brand Name</th>
                  <th class="wd-15p">Brand Logo</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($brand as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->brand_name }}</td>
                  <td><img src="{{ URL::to($row->brand_logo) }}" height="60px;" width="80px;"></td>
                  <td>
                    <a title="Edit" class="btn btn-sm btn-primary" href="{{ URL::to('edit/brand/'.$row->id) }}"><i class="fa fa-edit"></i></a>
                    <a title="Delete" class="btn btn-sm btn-danger" id="delete" href="{{ URL::to('delete/brand/'.$row->id) }}"><i class="fa fa-trash"></i></a>
                  </td>
                 
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->


<!--modal-->
        <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm" style="width: 600px">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0  tx-inverse tx-bold">Brand Add</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form method="post" action="{{ route('store.brand') }}" enctype="multipart/form-data">
              @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                  <label for="exampleInputEmail1">Brand Name</label>
                  <input type="text" class="form-control @error('brand_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand" name="brand_name">
                </div>
              @error('brand_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                <div class="form-group">
                  <label for="exampleInputEmail1">Brand Logo</label>
                  <input type="file" class="form-control @error('brand_logo') is-invalid @enderror"  aria-describedby="emailHelp" placeholder="Category" name="brand_logo">
                </div>
              @error('brand_logo')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
@endsection