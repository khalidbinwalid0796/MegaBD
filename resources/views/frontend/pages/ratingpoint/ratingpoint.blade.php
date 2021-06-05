@extends('frontend.layouts.app')

@section('content')

    <div class="contact_form">
        <div class="container">
            <div class="row">
               <div class="col-8 card">
                 <table class="table table-response nowrap" >
                   <thead>
                     <tr>
                        <th>Username</th>
                        <th>Rating Point</th>
                        <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>
                    @foreach($rating as $row)
                     <tr>
                       <!-- <td>{{ Auth::user()->name }}</td> -->
                       <td>{{ $row->name }}</td>
                       <td>{{ ceil($row->rtotal )}} </td>
                       <td>
                         <a href="#" class="btn btn-sm btn-info">Gift</a>
                       </td>
                     </tr>
                    @endforeach                    
                   </tbody>
                 </table>
               </div>
               <div class="col-4">
                 <div class="card" style="width: 18rem;">
                  <img src="{{ asset('public/avatar.jpg') }}" class="card-img-top" style="height: 90px; width: 90px; margin-left: 34%;" >
                  <div class="card-body">
                    <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="{{ route('password.change') }}"> Password Change </a></li>
                    <li class="list-group-item"><a href="{{ route('password.change') }}"> Edit Profile </a></li>
                    <li class="list-group-item"><a href="{{ route('rating.point') }}"> Rating Point </a></li>
                    <li class="list-group-item"><a href="{{ route('success.orderlist') }}"> Return Order </a></li>
                  </ul>
                  <div class="card-body">
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                  </div>
                </div>
               </div>
            </div>
        </div>
    </div>

@endsection