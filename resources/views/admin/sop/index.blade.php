@extends('admin.layout.master')

@section('content')


<div class="content">
	<div class="row index-sop">
    <div class="col-md-12">
      @foreach ($allDirectorates as $directorate)

      <div class="col-md-3">

        <div class="panel panel-danger">
          <div class="panel-heading">{{$directorate->nama}}</div>
          <div class="panel-body">
            <a href="{{ route('sop.data', ['kode_direktorat'=>$directorate->kode])}}">
              <input type="image" src="{{asset('image/document-icon.png')}}" class="profile-user-img img-responsive img-circle"/>
            </a>
          </div>
        </div>

      </div>
      <!-- /.box-body -->
      @endforeach
    </div>
  </div>
</div>


@endsection