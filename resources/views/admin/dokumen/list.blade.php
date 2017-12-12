@extends('admin.layout.master')

@section('content')

<!-- {{$sop_id}} -->

<div class="content">
	<div class="row index-sop">
		<div class="col-md-8">
			<div class="panel panel-primary" id="panel-detail-dokumen" style="display: none;">
				<div class="panel-heading">
					<h3 class="panel-title"><b>Detail Dokumen</b></h3>
					
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th>ID</th>
							<td id="js-dokumen-id"></td>
						</tr>
						<tr>
							<th>Judul</th>
							<td id="js-dokumen-judul"></td>
						</tr>
						<tr>
							<th>Deskripsi</th>
							<td id="js-dokumen-deskripsi"></td>
						</tr>
						<tr>
							<th>File</th>
							<td><a href="#" id="js-dokumen-file"></a>
							</td>
						</tr>
						<tr>
							<th>Tanggal Pembuatan</th>
							<td id="js-dokumen-created_at"></td>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">Dokumen</div>


				<!-- List group -->
				<ul class="list-group">
					@foreach($dataDokumen as $index => $itemDokumen)
					<li class="list-group-item"><a href="#" class="js-dokumen-item" data-id="{{$itemDokumen->id}}">{{$itemDokumen->judul}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection