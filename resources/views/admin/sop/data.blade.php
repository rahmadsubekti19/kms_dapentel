@extends('admin.layout.master')

@section('content')

<style type="text/css">
.button {
	display: block;
	width: 115px;
	height: 25px;
	background: #4E9CAF;
	padding: 10px;
	text-align: center;
	border-radius: 5px;
	color: white;
	font-weight: bold;
}
</style>
<div class="content">
	<div class="row index-sop">
		<div class="col-md-8">
			<div id="sop-all">
				@foreach($dataSop as $data => $itemSop)

				<div class="box box-primary box-solid" id="panel-detail-sop" >
					<div class="box-header with-border">
						<h3 class="box-title"><b>Detail sop</b></h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="remove">
								<i class="fa fa-times"></i>
							</button>
						</div>
					</div>
					<div class="box-body">
						<table class="table table-striped">
							<tr>
								<th>Judul</th>
								<td >{{$itemSop->judul}}</td>
							</tr>
							<tr>
								<th>Versi</th>
								<td>{{$itemSop->versi}}</td>

								<!-- <th>File</th>
									<td><a href="http://localhost:8000/uploads/{{$itemSop->file}}">{{$itemSop->file}}</a></td> -->
								</tr>
								<tr>
									<th>Tanggal Pembuatan</th>
									<td>{{$itemSop->tgl_dibuat}}</td>
								</tr>
							</table>
						</div>
					</div>

					@endforeach
				</div>

				@include('admin.sop.detail-data')

			</div>

			<div class="col-md-3">
				
				<div class="panel panel-default">

					<!-- Default panel contents -->
					<div class="panel-heading">
						Daftar SOP &nbsp
						<a href="{{ route('sop.create', ['kode_direktorat'=>$kode_direktorat]) }}">
							<div class="btn btn-info"><i class="fa fa-plus"></i></div>
						</a>
					</div>
					<!-- List group -->
					<ul class="list-group">
						@foreach($dataSop as $index => $itemSop)
						<li class="list-group-item"><a href="#" class="js-sop-item" data-id="{{$itemSop->id}}">{{$itemSop->judul}}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	@endsection