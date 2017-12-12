@extends('admin.layout.master')

@section('content')

<!-- {{$sop_id}} -->

<div class="content">
	<div class="row index-sop">
		<div class="col-md-8">
			<div id="dokumen-all">
				@foreach($dataSop as $itemSop)

				<div class="box box-primary box-solid" id="panel-detail-dokumen" >
					<div class="box-header with-border">
						<h3 class="box-title"><b>Detail Dokumen</b></h3>
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
								<th>Deskripsi</th>
								<td>{{strip_tags($itemSop->deskripsi)}}</td>
							</tr>
							<tr>

								<th>File</th>
								<td><a href="http://localhost:8000/uploads/{{$itemSop->file}}">{{$itemSop->file}}</a></td>
							</tr>
							<tr>
								<th>Tanggal Pembuatan</th>
								<td>{{$itemSop->created_at}}</td>
							</tr>
						</table>
					</div>
				</div>

				@endforeach
			</div>

		@include('admin.sop.dokumen.detail-dokumen')
		
		</div>

		<div class="col-md-3">
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">Dokumen</div>
				<!-- List group -->
				<ul class="list-group">
					@foreach($dataDokumen as $index => $itemSop)
					<li class="list-group-item"><a href="#" class="js-dokumen-item" data-id="{{$itemSop->id}}">{{$itemSop->judul}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection