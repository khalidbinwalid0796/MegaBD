@extends('backend.layouts.admin')

@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Gift Corner</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40" style="width: 700px">
          <div class="table-wrapper">
            <form method="post" action="{{ url('rating/gift/send/'.$rate->id) }}">
              @csrf
                    <div class="modal-body pd-20">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Price Point</label>
                       <select class="form-control" name="rtotal">
                         <option value="20">20</option>
                         <option value="50">50</option>
                         <option value="100">100</option>
                         <option value="200">200</option>
                         <option value="300">300</option>
                         <option value="400">400</option>
                         <option value="500">500</option>
                         <option value="600">600</option>
                         <option value="700">700</option>
                         <option value="1000">1000</option>
                       </select>
                      </div>
                    </div><!-- modal-body -->
                    <div class="modal-body pd-20">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Gift Name</label>
                         <select class="form-control" name="gift">
                         <option value="Mouse">Mouse</option>
                         <option value="Otg">Otg</option>
                         <option value="Pen">Pen</option>
                         <option value="Light">Light</option>
                         <option value="Keyboard">Keyboard</option>
                         <option value="HeadPhone">HeadPhone</option>
                         <option value="Glass">Glass</option>
                         <option value="Stricker">Stricker</option>
                         <option value="Bag">Bag</option>
                         <option value="DVD">DVD</option>
                       </select>
                      </div>
                    </div><!-- modal-body -->

                <button type="submit" class="btn btn-info pd-x-20 float-sm-right">Send</button>
                </form>
              </div>

          </div><!-- table-wrapper -->
        </div><!-- card -->

      </div><!-- sl-pagebody -->



@endsection