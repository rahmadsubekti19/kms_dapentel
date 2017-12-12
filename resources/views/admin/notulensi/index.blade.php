@extends('admin.layout.master')

@section('content')

<div class="content-header">
	<h1>
		<center style="color:black;">Data Notulensi Rapat Dapentel<br></center>
	</h1>
</div>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<div class="box-title">Tabel Notulensi</div>
					<a href="{{ route('notulensi.create')}}">
						<button type="button" class="btn bg-purple btn-flat margin">Tambahkan Notulensi</button>
					</a>
				</div>

				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No.</th>
								<th>Direktorat</th>
								<th>Agenda</th>
								<th>Tanggal Dibuat</th>
								<th>Aksi</th>
							</tr>
						</thead>

						<tbody>
							@foreach ($dataNotulensi as $index => $itemNotulensi)
							<tr>
								<td>{{ $index + 1 }}</td>
								<td>{{$itemNotulensi->direktorat->nama}}</td>
								<td>{{$itemNotulensi->agenda}}</td>
								<td>{{$itemNotulensi->tgl_dibuat}}</td>
								<td>
									
									<a class="btn btn-info" data-show="true" href="{{ route('notulensi.show', $itemNotulensi->id)}}" >Detail</a>


									<!-- Modal -->
									<div id="detailNotulensi-{{ $index }}" class="modal fade" tabindex="-1" role="dialog">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div id="pegawai" class="modal-body">
													<table class="table table-striped">
														<tr>
															<th>Direktorat</th>
															<td>{{$itemNotulensi->direktorat->nama}}</td>
														</tr>
														<tr>
															<th>Tanggal Rapat</th>
															<td>{{$itemNotulensi->tgl_dibuat}}</td>
														</tr>
														<tr>
															<th>Agenda</th>
															<td>{{$itemNotulensi->agenda}}</td>
														</tr>
														<tr>
															<th>Tempat</th>
															<td>{{$itemNotulensi->tempat}}</td>
														</tr>
														<tr>
															<th>Notulen</th>
															<td>{{$itemNotulensi->user->nama}}</td>
														</tr>
														<tr>
															<th>Topik Bahasan</th>
															<td>
																<?php
																$data = explode('$$$', $itemNotulensi->topik_bahasan); 
																?>

																@foreach($data as $dataBaru)
																{{ $dataBaru }} <br><br>
																@endforeach
															</td>
														</tr>
														<tr>
															<th>Catatan Diskusi</th>
															<td><?php
															$data = explode('$$$', $itemNotulensi->catatan_diskusi); 
															?>

															@foreach($data as $dataBaru)
															{{ $dataBaru }} <br><br>
															@endforeach
														</td>
													</tr>
													<tr>
														<th>Keputusan dan Tindakan</th>
														<td>
															<?php
															$data = explode('$$$', $itemNotulensi->kep_tindakan); 
															?>

															@foreach($data as $dataBaru)
															{{ $dataBaru }} <br><br>
															@endforeach
														</td>
													</tr>
													<tr>
														<th>File</th>
														<td>{{$itemNotulensi->file}}</td>
													</tr>
												</table>

											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>

								<!-- Button Trigger Modal -->
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#editNotulensi-{{ $index }}">Edit</button>

								<!-- Modal -->
								<div id="editNotulensi-{{ $index }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog" style="width: 65%" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true"><i class="fa fa-times"></i></span>
												</button>
												<h4 class="modal-title" id="myModalLabel">Edit Notulensi</h4>
											</div>
											<div class="modal-body" >
												<form class="form-horizontal form-edit" method="POST" action="{{ route('notulensi.update', $itemNotulensi) }}">
													{{ csrf_field() }}
													{{ method_field('PUT')}}

													<div class="col-md-6">
														<div class="form-group{{ $errors->has('kode_direktorat') ? ' has-error' : '' }}">
															<label for="kode_direktorat" class="col-md-4 control-label">Direktorat</label>

															<div class="col-md-6">
																<input id="kode_direktorat" type="text" class="form-control" name="kode_direktorat" value="{{ old('kode_direktorat', $itemNotulensi->direktorat->nama) }}" required autofocus>

																@if ($errors->has('kode_direktorat'))
																<span class="help-block">
																	<strong>{{ $errors->first('kode_direktorat') }}</strong>
																</span>
																@endif
															</div>
														</div>

														<div class="form-group{{ $errors->has('tgl_dibuat') ? ' has-error' : '' }}">
															<label for="tgl_dibuat" class="col-md-4 control-label">Tanggal Rapat</label>

															<div class="col-md-6">
																<input id="tgl_dibuat" type="text" class="form-control" name="tgl_dibuat" value="{{ old('tgl_dibuat', $itemNotulensi->tgl_dibuat) }}" required autofocus>

																@if ($errors->has('tgl_dibuat'))
																<span class="help-block">
																	<strong>{{ $errors->first('tgl_dibuat') }}</strong>
																</span>
																@endif
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group{{ $errors->has('tempat') ? ' has-error' : '' }}">
															<label for="tempat" class="col-md-4 control-label">Tempat</label>

															<div class="col-md-6">
																<input id="tempat" type="text" class="form-control" name="tempat" value="{{ old('tempat', $itemNotulensi->tempat) }}" required autofocus>

																@if ($errors->has('tempat'))
																<span class="help-block">
																	<strong>{{ $errors->first('tempat') }}</strong>
																</span>
																@endif
															</div>
														</div>

														<div class="form-group{{ $errors->has('agenda') ? ' has-error' : '' }}">
															<label for="agenda" class="col-md-4 control-label">Agenda</label>

															<div class="col-md-6">
																<input id="agenda" type="text" class="form-control" name="agenda" value="{{ old('agenda', $itemNotulensi->agenda) }}" required autofocus>

																@if ($errors->has('agenda'))
																<span class="help-block">
																	<strong>{{ $errors->first('agenda') }}</strong>
																</span>
																@endif
															</div>
														</div>
													</div>

													<div class="col-md-12">
														<div class="pokok-bahasan-wrap">
															<div class="pokok-bahasan">
																<h4 class="judul-pokok-bahasan">Pokok Bahasan 1</h4>
																<div class="form-group{{ $errors->has('topik_bahasan') ? ' has-error' : '' }}">
																	<label for="topik_bahasan" class="col-md-4 control-label">Topik Bahasan</label>

																	<textarea id="topik_bahasan" type="text" rows="4" cols="50" class="form-control" name="topik_bahasan[]" value="{{ old('topik_bahasan', $itemNotulensi->topik_bahasan) }}" autofocus></textarea>

																	@if ($errors->has('topik_bahasan'))
																	<span class="help-block">
																		<strong>{{ $errors->first('topik_bahasan') }}</strong>
																	</span>
																	@endif
																</div>

																<div class="form-group{{ $errors->has('catatan_diskusi') ? ' has-error' : '' }}">
																	<label for="catatan_diskusi" class="col-md-4 control-label">Catatan Diskusi</label>
																	<textarea id="catatan_diskusi" type="text" rows="4" cols="50" class="form-control" name="catatan_diskusi[]" value="{{ old('catatan_diskusi', $itemNotulensi->catatan_diskusi) }}" autofocus></textarea>

																	@if ($errors->has('catatan_diskusi'))
																	<span class="help-block">
																		<strong>{{ $errors->first('catatan_diskusi') }}</strong>
																	</span>
																	@endif
																</div>

																<div class="form-group{{ $errors->has('kep_tindakan') ? ' has-error' : '' }}">
																	<label for="kep_tindakan" class="col-md-4 control-label">Keputusan dan Tindakan</label>
																	<textarea id="kep_tindakan" type="text" rows="4" cols="50" class="form-control" name="kep_tindakan[]" value="{{ old('kep_tindakan', $itemNotulensi->kep_tindakan) }}" autofocus></textarea>

																	@if ($errors->has('kep_tindakan'))
																	<span class="help-block">
																		<strong>{{ $errors->first('kep_tindakan') }}</strong>
																	</span>
																	@endif
																</div>
															</div>
														</div>

														<b class="btn btn-tambah-pokok-bahasan"><i class="fa fa-fw fa-plus-square-o"></i>Tambah Pokok Bahasan</b><br>

													</div>
												</div>	
												<div class="modal-footer">
													<div class="form-group">
														<div class="col-md-6 col-md-offset-4">
															<button type="submit" class="btn btn-primary" data-dismiss="modal">Simpan</button>
														</div>
													</div>
												</div>
											</form>
											
										</div>
									</div>
								</div>
							</div>

							<a href="#" class="btn btn-danger" 
							onclick="event.preventDefault(); 
							document.getElementById('notulensi-destroy-{{$itemNotulensi->id}}').submit();">Delete</a>
							<form
							action="{{route('notulensi.destroy', $itemNotulensi->id)}}" 
							id="notulensi-destroy-{{$itemNotulensi->id}}" 
							method="POST" 
							style="display: none;"> 
							{{ csrf_field() }}
							{{ method_field('DELETE')}}
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

</div>
</div>
</section>

@endsection