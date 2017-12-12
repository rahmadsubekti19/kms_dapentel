<!DOCTYPE html>
<html>

<!-- Bootstrap 3.3.6 -->
<!-- <link rel="stylesheet" href="{{ asset('admin/bootstrap/css/bootstrap.min.css')}}"> -->
<!-- Custom CSS -->
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('admin/style.css')}}"> -->

<body>
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
	.col-md-6 {
		width: 50%;
		float: left;
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
								<label>Direktorat</label><br>
								<input type="text" name="direktorat" value="{{ $dataNotulensi->direktorat->nama}}">
								<br><br>
								<label>Tanggal Rapat</label><br>
								<input type="text" name="tgl_dibuat" value="{{date('d-m-Y', strtotime($dataNotulensi->tgl_dibuat))}}">
						</div>

						<div class="col-md-6">
							
								<label>Tempat</label><br>
								<input class="form-control" disabled="disabled" type="text" name="tempat" value="{{ $dataNotulensi->tempat}}">
								<br><br>
								<label>Agenda</label><br>
								<input class="form-control" disabled="disabled" type="text" name="agenda" value="{{$dataNotulensi->agenda}}">
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
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>