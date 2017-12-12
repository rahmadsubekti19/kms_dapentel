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
					<li ><a href="#tambahpegawai" data-toggle="tab">Tambah Pegawai</a></li>
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
											
											<!-- Button Trigger Modal -->
											<button type="button" class="btn btn-success" data-toggle="modal" data-target="#editPegawai-{{ $index }}">Edit</button> 

											<!-- Modal -->
											<div id="editPegawai-{{ $index }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true"><i class="fa fa-times"></i></span>
															</button>
															<h4 class="modal-title" id="myModalLabel">Edit Pegawai</h4>
														</div>
														<div class="modal-body">
															<form class="form-horizontal form-edit" method="POST" action="{{ route('users.update', $itemPegawai) }}">
																{{ csrf_field() }}
																{{ method_field('PUT')}}

																<div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
																	<label for="nik" class="col-md-4 control-label">NIK</label>

																	<div class="col-md-6">
																		<input id="nik" type="text" class="form-control" name="nik" value="{{ old('nik', $itemPegawai->nik) }}" required autofocus>

																		@if ($errors->has('nik'))
																		<span class="help-block">
																			<strong>{{ $errors->first('nik') }}</strong>
																		</span>
																		@endif									
																	</div>
																</div>

																<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
																	<label for="nama" class="col-md-4 control-label">Nama</label>

																	<div class="col-md-6">
																		<input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama', $itemPegawai->nama) }}" required autofocus>

																		@if ($errors->has('nama'))
																		<span class="help-block">
																			<strong>{{ $errors->first('nama') }}</strong>
																		</span>
																		@endif
																	</div>
																</div>

																<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
																	<label for="email" class="col-md-4 control-label">E-Mail</label>

																	<div class="col-md-6">
																		<input id="email" type="email" class="form-control" name="email" value="{{ old('email', $itemPegawai->email) }}" required>

																		@if ($errors->has('email'))
																		<span class="help-block">
																			<strong>{{ $errors->first('email') }}</strong>
																		</span>
																		@endif
																	</div>
																</div>

																<div class="form-group{{ $errors->has('kode_jabatan') ? ' has-error' : '' }}">
																	<label for="kode_jabatan" class="col-md-4 control-label">Jabatan</label>

																	<div class="col-md-6">
																		<select id="kode_jabatan" class="form-control" name="kode_jabatan" required>
																			@foreach(App\Jabatan::all() as $jabatan)
																			@if($jabatan->kode == $itemPegawai->kode_jabatan)
																			<option selected value="{{$jabatan->kode}}">{{$jabatan->nama}}</option>
																			@else
																			<option value="{{$jabatan->kode}}">{{$jabatan->nama}}</option>
																			@endif
																			@endforeach
																		</select>

																		@if ($errors->has('kode_jabatan'))
																		<span class="help-block">
																			<strong>{{ $errors->first('kode_jabatan') }}</strong>
																		</span>
																		@endif
																	</div>
																</div>

																<div class="form-group{{ $errors->has('kode_direktorat') ? ' has-error' : '' }}">
																	<label for="kode_direktorat" class="col-md-4 control-label">Direktorat</label>

																	<div class="col-md-6">
																		<select id="kode_direktorat" class="form-control" name="kode_direktorat" required>
																			@foreach(App\Direktorat::all() as $direktorat)
																			@if($direktorat->kode == $itemPegawai->kode_direktorat)
																			<option selected value="{{$direktorat->kode}}">{{$direktorat->nama}}</option>
																			@else
																			<option value="{{$direktorat->kode}}">{{$direktorat->nama}}</option>
																			@endif
																			@endforeach
																		</select>

																		@if ($errors->has('kode_direktorat'))
																		<span class="help-block">
																			<strong>{{ $errors->first('kode_direktorat') }}</strong>
																		</span>
																		@endif
																	</div>
																</div>

																<div class="form-group{{ $errors->has('id_role') ? ' has-error' : '' }}">
																	<label for="id_role" class="col-md-4 control-label">Level</label>

																	<div class="col-md-6">
																		<select id="id_role" class="form-control" name="id_role" required>
																			@foreach(App\Role::all() as $role)
																			@if($role->id == $itemPegawai->id_role)
																			<option selected value="{{$role->id}}">{{$role->level}}</option>
																			@else
																			<option value="{{$role->id}}">{{$role->level}}</option>
																			@endif
																			@endforeach
																		</select>

																		@if ($errors->has('id_role'))
																		<span class="help-block">
																			<strong>{{ $errors->first('id_role') }}</strong>
																		</span>
																		@endif
																	</div>
																</div>

																<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
																	<label for="password" class="col-md-4 control-label">Password</label>

																	<div class="col-md-6">
																		<input id="password" type="password" class="form-control" name="password" placeholder="Masukan Password Baru">

																		@if ($errors->has('password'))
																		<span class="help-block">
																			<strong>{{ $errors->first('password') }}</strong>
																		</span>
																		@endif
																	</div>
																</div>

																<div class="form-group">
																	<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

																	<div class="col-md-6">
																		<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Password Baru">
																	</div>
																</div>

																<div class="form-group">
																	<div class="col-md-6 col-md-offset-4">
																		<button type="submit" class="btn btn-primary" id="button-reg">Simpan</button>
																	</div>
																</div>
																
															</form>
														</div>
													</div>
												</div>
											</div>

											<a href="#" class="btn btn-danger" 
											onclick="event.preventDefault(); 
											document.getElementById('user-destroy-{{$itemPegawai->nik}}').submit();">Delete</a>
											<form
											action="{{route('users.destroy', $itemPegawai->nik)}}" 
											id="user-destroy-{{$itemPegawai->nik}}" 
											method="POST" 
											style="display: none;"> 
											{{ csrf_field() }}
											{{ method_field('DELETE')}}
										</form>
									</td>

											<!-- <form class="form-horizontal" method="POST" action="{{ route('users.destroy',$itemPegawai) }}"><button class="glyphicon glyphicon-trash" "></button>
				                       		{{ csrf_field() }}
				                        	{{ method_field('DELETE')}}
				                        </form> -->

				                    </tr>
				                    @endforeach
				                </tbody>
				            </table>
				        </div>
				    </div>
				</div>

				<div class="tab-pane" id="tambahpegawai">
					<div class="box">
						<div class="box-header">
							<div class="box-title">Tambah Pegawai</div>
						</div>

						<div class="box-body">
							<form class="form-horizontal" method="POST" action="{{ route('users.store') }}">
								{{ csrf_field() }}

								<div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
									<label for="nik" class="col-md-4 control-label">NIK</label>

									<div class="col-md-6">
										<input id="nik" type="text" class="form-control" name="nik" value="{{ old('nik') }}" required autofocus placeholder="Masukan NIK">

										@if ($errors->has('nik'))
										<span class="help-block">
											<strong>{{ $errors->first('nik') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
									<label for="nama" class="col-md-4 control-label">Nama</label>

									<div class="col-md-6">
										<input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus placeholder="Masukan Nama">

										@if ($errors->has('nama'))
										<span class="help-block">
											<strong>{{ $errors->first('nama') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
									<label for="email" class="col-md-4 control-label">E-Mail</label>

									<div class="col-md-6">
										<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Masukan Email">

										@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="form-group{{ $errors->has('kode_jabatan') ? ' has-error' : '' }}">
									<label for="kode_jabatan" class="col-md-4 control-label">Jabatan</label>

									<div class="col-md-6">
										<select id="kode_jabatan" class="form-control" name="kode_jabatan" required>
											@foreach(App\Jabatan::all() as $jabatan)
											<option value="{{$jabatan->kode}}">{{$jabatan->nama}}</option>
											@endforeach
										</select>

										@if ($errors->has('kode_jabatan'))
										<span class="help-block">
											<strong>{{ $errors->first('kode_jabatan') }}</strong>
										</span>
										@endif
									</div>
								</div>

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

								<div class="form-group{{ $errors->has('id_role') ? ' has-error' : '' }}">
									<label for="id_role" class="col-md-4 control-label">Level</label>

									<div class="col-md-6">
										<select id="id_role" class="form-control" name="id_role" required>
											@foreach(App\Role::all() as $role)
											<option value="{{$role->id}}">{{$role->level}}</option>
											@endforeach
										</select>

										@if ($errors->has('id_role'))
										<span class="help-block">
											<strong>{{ $errors->first('id_role') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
									<label for="password" class="col-md-4 control-label">Password</label>

									<div class="col-md-6">
										<input id="password" type="password" class="form-control" name="password" required placeholder="Masukan Password">

										@if ($errors->has('password'))
										<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="form-group">
									<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

									<div class="col-md-6">
										<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Ulangi Password">
									</div>
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

	$('#editPegawai-{{ $index }}').on('shown.bs.modal', function () {
		$('#myInput').focus()
	})
</script>
@endsection