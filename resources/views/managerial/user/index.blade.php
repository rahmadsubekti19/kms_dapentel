@extends('admin.layout.master')

@section('content')


<div class="content-header">
	<h1>
		<center style="color:black;">Data Pegawai Pengguna KMS Dapentel<br></center>
	</h1>
</div>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs" id="tabpegawai">
					<li class="active"><a href="#datapegawai" data-toggle="tab">Data Pegawai</a></li>
				</ul>

				<div class="tab-content">
					<div class="active tab-pane" id="datapegawai">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Data Pegawai</h3>
							</div>

							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>No.</th>
											<th>NIK</th>
											<th>Nama</th>
											<th>Jabatan</th>
											<th>Direktorat</th>
											<th>Email</th>
											<th>Aksi</th>
										</tr>
									</thead>

									<tbody>
										@foreach ($dataPegawai as $index => $itemPegawai)
										<tr>
											<td>{{ ++$index }}</td>
											<td>{{$itemPegawai->nik}}</td>
											<td>{{$itemPegawai->nama}}</td>
											<td>{{$itemPegawai->jabatan->nama}}</td>
											<td>{{$itemPegawai->direktorat->nama}}</td>
											<td>{{$itemPegawai->email}}</td>
											<td>
												
												<!-- Temporary link -->
												<!-- href="{{ route('users.show', $itemPegawai->nik)}}" -->
												<!-- href="{{ route('users.edit', $itemPegawai->nik)}}" -->


												<!-- Button trigger modal -->
												<a data-toggle="modal" class="btn btn-info" data-show="true" href="#detailPegawai-{{ $index }}" >Detail</a>

												<!-- <a class="btn btn-info" href="{{ route('users.show', $itemPegawai->nik)}}" >Detail</a> -->


												<!-- Modal -->
												<div id="detailPegawai-{{ $index }}" class="modal fade" tabindex="-1">
													<div class="modal-dialog" role="document" aria-labelledby="myModalLabel" aria-hidden="true">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true"><i class="fa fa-times"></i></span>
																</button>
																<h4 class="modal-title" id="myModalLabel">Detail Pegawai</h4>
															</div>
															<div id="pegawai" class="modal-body">
																<table class="table table-striped">
																	<tr>
																		<th>NIK</th>
																		<td>{{$itemPegawai->nik}}</td>
																	</tr>
																	<tr>
																		<th>Nama</th>
																		<td>{{$itemPegawai->nama}}</td>
																	</tr>
																	<tr>
																		<th>Kode Jabatan</th>
																		<td>{{$itemPegawai->jabatan->kode}}</td>
																	</tr>
																	<tr>
																		<th>Jabatan</th>
																		<td>{{$itemPegawai->jabatan->nama}}</td>
																	</tr>
																	<th>Email</th>
																	<td>{{$itemPegawai->email}}</td>
																</tr>
															</table>
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
</div>
</div>
</section>

@endsection

@section('script')

<script type="text/javascript">
	$(function(){
		$('#dataPegawai').DataTable({"pageLength": 10});
	});

	$(document).ready(function(){
		$(".btn").click(function(){
			$("#detailPegawai").modal('show');
		});
	});
</script>
@endsection