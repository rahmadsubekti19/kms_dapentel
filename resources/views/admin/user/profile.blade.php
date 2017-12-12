@extends('admin.layout.master')

@section('content')

<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4 profile-center">
    <div class="box box-primary">
      <div class="box-body box-profile">

         <img class="profile-user-img img-responsive img-circle" src="{{ asset('image/person.png')}}" alt="User profile picture">

        <h3 class="profile-username text-center">{{$user->nama}}</h3>

        <p class="text-muted text-center">{{$user->jabatan->nama}}</p>

        <ul class="list-group list-group-unbordered">
         <li class="list-group-item">
          <b>NIK</b> <a class="pull-right">{{$user->nik}}</a>
        </li>
        <li class="list-group-item">
          <b>Direktorat</b> <a class="pull-right">{{$user->direktorat->nama}}</a>
        </li>
        <li class="list-group-item">
          <b>Email</b> <a class="pull-right">{{$user->email}}</a>
        </li>
      </ul>
    </div>
    <!-- /.box-body -->
  </div>
</div>
<div class="col-md-4"></div>
</div>


@endsection