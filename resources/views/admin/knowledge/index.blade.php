@extends('admin.layout.master')

@section('content')


<div class="content-header">
	<h1>
		<center style="color:black;">Manajemen Knowledge Dapentel<br></center>
	</h1>
</div>

<section class="content">
	<div class="row">
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>{{$dataKnowledge->count()}}</h3>

					<p>Data Masuk</p>
				</div>
				<div class="icon">
					<i class="fa fa-hdd-o"></i>
				</div>
				<a href="#dataknowledge" data-toggle="tab" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>{{$diterimaKnowledge->count()}}</h3>

					<p>Data Diterima</p>
				</div>
				<div class="icon">
					<i class="fa fa-check-circle"></i>
				</div>
				<a href="#dataditerima" data-toggle="tab" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3>{{$ditolakKnowledge->count()}}</h3>

					<p>Data Ditolak</p>
				</div>
				<div class="icon">
					<i class="fa fa-times-circle"></i>
				</div>
				<a href="#dataditolak"  data-toggle="tab" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-md-12">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs" id="tabknowledge">
					<li class="active"><a href="#tambahknowledge" data-toggle="tab">Tambah Knowledge</a></li>
					<li><a href="#dataknowledge" data-toggle="tab">Data Masuk</a></li>
					<li><a href="#dataditerima" data-toggle="tab">Data Diterima</a></li>
					<li><a href="#dataditolak" data-toggle="tab">Data Ditolak</a></li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane" id="dataknowledge">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Data Knowledge</h3>
							</div>

							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>No.</th>
											<th>Direktorat</th>
											<th>Judul</th>
											<th>Jenis</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>

									<tbody>
										@foreach ($dataKnowledge as $index => $itemKnowledge)
										<tr>
											<td>{{ ++$index }}</td>
											<td>{{$itemKnowledge->direktorat->nama}}</td>
											<td>{{$itemKnowledge->judul}}</td>
											<td>{{$itemKnowledge->jenis}}</td>
											<td>               
												<div class="btn-group">
													{{ csrf_field() }}
													<button type="button" class="btn btn-info js-status-kn" value="{{$itemKnowledge->id}}">{{$itemKnowledge->status}}</button>
													<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
														<span class="caret"></span>
														<span class="sr-only">Toggle Dropdown</span>
													</button>
													<ul class="dropdown-menu" role="menu">
														<li class="js-status-knowledge" data-value="diterima" data-id="{{$itemKnowledge->id}}">
															<a href="#">Diterima</a>
														</li>
														<li class="js-status-knowledge" data-value="dipertimbangkan" data-id="{{$itemKnowledge->id}}">
															<a href="#">Dipertimbangkan</a>
														</li>
														<li class="js-status-knowledge" data-value="ditolak" data-id="{{$itemKnowledge->id}}">
															<a href="#">Ditolak</a>
														</li>
													</ul>
												</div>
											</td>
											<td>
												<!-- Button trigger modal -->
												<a data-toggle="modal" class="btn btn-info" data-show="true" href="#detailKnowledge-{{ $index }}" >Detail</a>

												<!-- Modal -->
												<div id="detailKnowledge-{{ $index }}" class="modal fade" tabindex="-1" role="dialog">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div id="pegawai" class="modal-body">
																<table class="table table-striped">
																	<tr>
																		<th>Pegawai Pengajuan</th>
																		<td>{{$itemKnowledge->user->nama}}</td>
																	</tr>
																	<tr>
																		<th>Direktorat</th>
																		<td>{{$itemKnowledge->direktorat->nama}}</td>
																	</tr>
																	<tr>
																		<th>Judul</th>
																		<td>{{$itemKnowledge->judul}}</td>
																	</tr>
																	<tr>
																		<th>Jenis</th>
																		<td>{{$itemKnowledge->jenis}}</td>
																	</tr>
																	<tr>
																		<th>Status</th>
																		<td>
																			<div class="btn-group">
																				{{ csrf_field() }}
																				<button type="button" class="btn btn-info js-status-kn" value="{{$itemKnowledge->id}}">{{$itemKnowledge->status}}</button>
																				<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
																					<span class="caret"></span>
																					<span class="sr-only">Toggle Dropdown</span>
																				</button>
																				<ul class="dropdown-menu" role="menu">
																					<li class="js-status-knowledge" data-value="diterima" data-id="{{$itemKnowledge->id}}">
																						<a href="#">Diterima</a>
																					</li>
																					<li class="js-status-knowledge" data-value="dipertimbangkan" data-id="{{$itemKnowledge->id}}">
																						<a href="#">Dipertimbangkan</a>
																					</li>
																					<li class="js-status-knowledge" data-value="ditolak" data-id="{{$itemKnowledge->id}}">
																						<a href="#">Ditolak</a>
																					</li>
																				</ul>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<th>Deskripsi</th>
																		<td>{{strip_tags($itemKnowledge->deskripsi)}}</td>
																	</tr>
																	<tr>
																		<th>File</th>
																		<td>{{$itemKnowledge->file}}</td>
																	</tr>
																</table>

															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>

												<a href="#" class="btn btn-danger" 
												onclick="event.preventDefault(); 
												document.getElementById('knowledge-destroy-{{$itemKnowledge->id}}').submit();">Delete</a>
												<form action="{{route('knowledge.destroy', $itemKnowledge->id)}}"  id="knowledge-destroy-{{$itemKnowledge->id}}" method="POST" style="display: none;"> 
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

					<div class="tab-pane" id="dataditerima">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Knowledge Diterima</h3>
							</div>

							<div class="box-body">
								<table id="example2" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>No.</th>
											<th>Direktorat</th>
											<th>Judul</th>
											<th>Jenis</th>
											<th>Aksi</th>
										</tr>
									</thead>

									<tbody>
										@foreach ($diterimaKnowledge as $index => $item)
										<tr>
											<td>{{ ++$index }}</td>
											<td>{{$item->direktorat->nama}}</td>
											<td>{{$item->judul}}</td>
											<td>{{$item->jenis}}</td>
											<td>
												<!-- Button trigger modal -->
												<a data-toggle="modal" class="btn btn-info" data-show="true" href="#detailDiterima-{{ $index }}" >Detail</a>

												<!-- Modal -->
												<div id="detailDiterima-{{ $index }}" class="modal fade" tabindex="-1" role="dialog">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div id="diterima" class="modal-body">
																<table class="table table-striped">
																	<tr>
																		<th>Pegawai Pengajuan</th>
																		<td>{{$item->user->nama}}</td>
																	</tr>
																	<tr>
																		<th>Direktorat</th>
																		<td>{{$item->direktorat->nama}}</td>
																	</tr>
																	<tr>
																		<th>Judul</th>
																		<td>{{$item->judul}}</td>
																	</tr>
																	<tr>
																		<th>Jenis</th>
																		<td>{{$item->jenis}}</td>
																	</tr>
																	<tr>
																		<th>Deskripsi</th>
																		<td>{{strip_tags($item->deskripsi)}}</td>
																	</tr>
																	<tr>
																		<th>File</th>
																		<td>{{$item->file}}</td>
																	</tr>
																</table>

															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>

												<a href="#" class="btn btn-danger" 
												onclick="event.preventDefault(); 
												document.getElementById('knowledge-destroy-{{$item->id}}').submit();">Delete</a>
												<form action="{{route('knowledge.destroy', $item->id)}}"  id="knowledge-destroy-{{$item->id}}" method="POST" style="display: none;"> 
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

					<div class="tab-pane" id="dataditolak">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Knowledge Ditolak</h3>
							</div>

							<div class="box-body">
								<table id="example3" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>No.</th>
											<th>Direktorat</th>
											<th>Judul</th>
											<th>Jenis</th>
											<th>Aksi</th>
										</tr>
									</thead>

									<tbody>
										@foreach ($ditolakKnowledge as $index => $item)
										<tr>
											<td>{{ ++$index }}</td>
											<td>{{$item->direktorat->nama}}</td>
											<td>{{$item->judul}}</td>
											<td>{{$item->jenis}}</td>
											<td>
												<!-- Button trigger modal -->
												<a data-toggle="modal" class="btn btn-info" data-show="true" href="#detailDitolak-{{ $index }}" >Detail</a>

												<!-- Modal -->
												<div id="detailDitolak\-{{ $index }}" class="modal fade" tabindex="-1" role="dialog">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div id="diterima" class="modal-body">
																<table class="table table-striped">
																	<tr>
																		<th>Pegawai Pengajuan</th>
																		<td>{{$item->user->nama}}</td>
																	</tr>
																	<tr>
																		<th>Direktorat</th>
																		<td>{{$item->direktorat->nama}}</td>
																	</tr>
																	<tr>
																		<th>Judul</th>
																		<td>{{$item->judul}}</td>
																	</tr>
																	<tr>
																		<th>Jenis</th>
																		<td>{{$item->jenis}}</td>
																	</tr>
																	<tr>
																		<th>Deskripsi</th>
																		<td>{{strip_tags($item->deskripsi)}}</td>
																	</tr>
																	<tr>
																		<th>File</th>
																		<td>{{$item->file}}</td>
																	</tr>
																</table>

															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>

												<a href="#" class="btn btn-danger" 
												onclick="event.preventDefault(); 
												document.getElementById('knowledge-destroy-{{$item->id}}').submit();">Delete</a>
												<form action="{{route('knowledge.destroy', $item->id)}}"  id="knowledge-destroy-{{$item->id}}" method="POST" style="display: none;"> 
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

					<div class="active tab-pane" id="tambahknowledge">
						<div class="box">
							<div class="box-header">
								<div class="box-title">Tambah Knowledge</div>
							</div>


							<div class="box-body">
								<form class="form-horizontal" method="POST" action="{{ route('knowledge.store') }}">
									{{ csrf_field() }}

									<div class="form-group{{ $errors->has('kode_direktorat') ? ' has-error' : '' }}">
										<label for="kode_direktorat" class="col-md-4 control-label">Direktorat</label>

										<div class="col-md-6">
											<select id="kode_direktorat" class="form-control" name="kode_direktorat" required>
												@foreach(App\Direktorat::all() as $direktorat)
												<option value="{{$direktorat->kode}}">{{$direktorat->nama}}</option>
												@endforeach
											</select>

											@if ($errors->has('kode_direktorat'))
											<span class="help-block">
												<strong>{{ $errors->first('kode_direktorat') }}</strong>
											</span>
											@endif
										</div>
									</div>

									<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
										<label for="judul" class="col-md-4 control-label">Judul</label>

										<div class="col-md-6">
											<input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}" required autofocus placeholder="Masukan judul">

											@if ($errors->has('judul'))
											<span class="help-block">
												<strong>{{ $errors->first('judul') }}</strong>
											</span>
											@endif
										</div>
									</div>

									<div class="form-group{{ $errors->has('jenis') ? ' has-error' : '' }}">
										<label for="jenis" class="col-md-4 control-label">Jenis</label>

										<div class="col-md-6">
											<label class="radio-inline"><input type="radio" class="flat-red" name="jenis" value="Tacit Knowledge" required> Tacit Knowledge </label>

											<label class="radio-inline"><input type="radio" class="flat-red" name="jenis" value="Explicit Knowledge" required> Explicit Knowledge </label>

											@if ($errors->has('jenis'))
											<span class="help-block">
												<strong>{{ $errors->first('jenis') }}</strong>
											</span>
											@endif
											<br>
											<b style="color: red">Keterangan:</b><br>
											- <strong>Tacit Knowledge</strong> adalah pengetahuan yang terdapat di dalam otak/pikiran kita sesuai dengan pemahaman, keahlian dan pengalaman seseorang, susah untuk didefinisikan dengan bahasa formal dan isinya mencakup pemahaman pribadi. <br>
											- <strong>Explicit Knowledge</strong> adalah pengetahuan yang telah di artikulasikan sehingga lebih terstruktur dan dapat disimpan, serta dapat dipindahkan ke siapapun dengan mudah. Bentuk dari explicit knowledge, meliputi : manual, dokumen, dan prosedur.
										</div>


									</div>

									<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
										<label for="deskripsi" class=" col-md-4 control-label">Deskripsi</label><br>
										<div class="col-md-6">
											<textarea name="deskripsi" id="knowledge-deskripsi" value="{{ old('deskripsi') }}" class="textarea" placeholder="Masukan deskripsi" style="width: 50%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
										</div>
										@if ($errors->has('deskripsi'))
										<span class="help-block">
											<strong>{{ $errors->first('deskripsi') }}</strong>
										</span>
										@endif
									</div>

									<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
										<label class="col-md-4 control-label">File</label>
										<div class="col-md-6">
											<input id="file" type="file" class="form-control" name="file" value="{{ old('file') }}">
										</div>
										@if ($errors->has('file'))
										<span class="help-block">
											<strong>{{ $errors->first('file') }}</strong>
										</span>
										@endif


									</div>

									<div class="form-group">
										<div class="col-md-6 col-md-offset-4">
											<button type="submit" class="btn btn-primary">
												Simpan
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@push('scripts')

<script type="text/javascript">
	$(function(){
		$('#dataKnowledge').DataTable({"pageLength": 10});
		$('#diterimaKnowledge').DataTable({"pageLength": 10});
		$('#ditolakKnowledge').DataTable({"pageLength":10});
	});

	$(document).ready(function(){
		$(".btn").click(function(){
			$("#detailKnowledge").modal('show');
		});
	});

	$('#editKnowledge').on('shown.bs.modal', function () {
		$('#myInput').focus()
	})

	// iCheck radio
	 $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
</script>

<script type="text/javascript">
  // $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('knowledge-deskripsi');
  // });
</script>

@endpush