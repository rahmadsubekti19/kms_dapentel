@extends('admin.layout.master')

@section('content')

<style type="text/css">
table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
}
th, td {
	padding: 15px;
}
th {
	text-align: center;
}
</style>

<div class="container">
	<br>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading" >
					<h3 style="text-align: center">Data Notulensi Rapat Dapentel</h3>
				</div>
				<div class="panel-body">
					<form class="form" method="GET">
						{{ csrf_field() }}

						<div class="col-md-6">
							<div class="form-group">
								<label>Direktorat</label>
								<input class="form-control" disabled="disabled" type="text" name="direktorat" value="{{ $dataNotulensi->direktorat->nama}}">
							</div>
							
							<div class="form-group">
								<label>Tanggal Rapat</label>
								<input class="form-control" disabled="disabled" type="text" name="tgl_dibuat" value="{{date('d-m-Y', strtotime($dataNotulensi->tgl_dibuat))}}">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Tempat</label>
								<input class="form-control" disabled="disabled" type="text" name="tempat" value="{{ $dataNotulensi->tempat}}">
							</div>
							
							<div class="form-group">
								<label>Agenda</label>
								<input class="form-control" disabled="disabled" type="text" name="agenda" value="{{$dataNotulensi->agenda}}">
							</div>
						</div>
						
						<div class="col-md-12">
							<h4>Pokok Bahasan</h4>

							<table width="100%">
								<thead>
									<tr>
										<th>Topik Bahasan</th>
										<th>Catatan Diskusi</th>
										<th>Keputusan dan Tindakan</th>
									</tr>
								</thead>
								@foreach($dataKhusus as $item)
								<tbody>
									<tr>
										<td>
											<?php
											$data = explode('$$$', $item->topik_bahasan); 
											?>

											@foreach($data as $dataBaru)
											{{ $dataBaru }} <hr>
											@endforeach
										</td>
										<td>
											<?php
											$data = explode('$$$', $item->catatan_diskusi); 
											?>

											@foreach($data as $dataBaru)
											{{ $dataBaru }}<hr>
											@endforeach
										</td>
										<td>
											<?php
											$data = explode('$$$', $item->kep_tindakan); 
											?>

											@foreach($data as $dataBaru)
											{{ $dataBaru }} <hr>
											@endforeach
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>

						<div class="col-md-12">
							<h4>Daftar Hadir</h4>
							
							@foreach($daftarHadir as $data)
							<ul>
								<li>{{ $data->nama}}</li>
							</ul>
							@endforeach						
						</div>

						<div class="col-md-12">
							<div class="col-md-6">
								<a href="{{ URL::previous() }}" class="btn btn-danger"><i class="fa fa-backward"></i> Kembali</a>
								<a href="/dompdf/<?php echo $dataNotulensi->id ?>" class="btn btn-primary"><i class="fa fa-download"></i> Unduh</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">
	$(".select2").select2();
</script>

@endpush