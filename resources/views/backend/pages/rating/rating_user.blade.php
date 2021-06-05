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
                  <th>PaymentType</th>
                  <th>Amount</th>
                  <th>Rating Point</th>
                  <th>Date </th>
                </tr>
              </thead>
              <tbody>
                @foreach($rating as $row)
                <tr>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->payment_type }}</td>
                  <td>TK. {{ $row->subtotal }} tk</td>
                  <td>{{ ceil($row->rating_point) }}</td>
                  <td>{{ $row->date }}</td>                 
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->

@endsection