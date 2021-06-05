@extends('backend.layouts.admin')

@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h3 class="">Rating User List
          </h3>
          <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>

                  <th>Username</th>
                  <th>Rating Pont</th>
                  <th>Gift</th>
                </tr>
              </thead>
              <tbody>
                @foreach($user_sums as $row)
                <tr>
                  <td>{{ $row->name }}</td>
                  <td>{{ ceil($row->rtotal) }}</td>
                  <td>
                    <a href="{{ URL::to('rating/gift/view/'.$row->id) }}" class="btn btn-sm btn-info">Send</a>
                  </td>                 
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->

@endsection