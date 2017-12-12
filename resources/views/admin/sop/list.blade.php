@extends('admin.layout.master')

@section('content')
<div class="content">
  <div class="row index-sop">
    @foreach ($dataSop as $index => $itemSop)
    <div class="col-md-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="panel-title">
            <a href="{{ route('dokumen.list', ['sop_id'=>$itemSop->id])}}">{{$itemSop->judul}}</a>
          </div>
          
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="panel-body">
          ID : {{$itemSop->id}} <br>
          Oleh : {{$itemSop->user->nama}} <br>
          Pada : {{$itemSop->created_at}}
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection