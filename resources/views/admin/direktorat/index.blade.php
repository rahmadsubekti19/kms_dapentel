@extends('admin.layout.master')

@section('content')

<div class="content-header">
	<h1>
		<center style="color:black;">Data Direktorat Pengguna KMS Dapentel<br></center>
	</h1>
</div>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs" id="tabdirektorat">
					<li class="active"><a href="#datadirektorat" data-toggle="tab">Data Direktorat</a></li>
					<li ><a href="#tambahDirektorat" data-toggle="tab">Tambah Direktorat</a></li>
				</ul>

				<div class="tab-content">
					<div class="active tab-pane" id="datadirektorat">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Data Direktorat</h3>
							</div>

							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>No.</th>
											<th>Nama Direktorat</th>
											<th>Aksi</th>
										</tr>
									</thead>

									<tbody>
										@foreach ($dataDirektorat as $index => $itemDirektorat)
										<tr>
											<td>{{ ++$index }}</td>
											<td>{{$itemDirektorat->nama}}</td>
											<td>
												<!-- Button Trigger Modal -->
												<button type="button" class="btn btn-success" data-toggle="modal" data-target="#editDirektorat-{{ $index }}">Edit</button> 

												<!-- Modal -->
												<div id="editDirektorat-{{ $index }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true"><i class="fa fa-times"></i></span>
																</button>
																<h4 class="modal-title" id="myModalLabel">Edit Direktorat</h4>
															</div>
															<div class="modal-body">
																<form class="form-horizontal form-edit" method="POST" action="{{ route('direktorat.update', $itemDirektorat) }}">
																	{{ csrf_field() }}
																	{{ method_field('PUT')}}

																	<div class="form-group{{ $errors->has('kode') ? ' has-error' : '' }}">
																		<label for="kode" class="col-md-4 control-label">Kode Direktorat</label>

																		<div class="col-md-6">
																			<input id="kode" type="text" class="form-control" name="kode" value="{{ old('kode', $itemDirektorat->kode) }}" required autofocus>

																			@if ($errors->has('kode'))
																			<span class="help-block">
																				<strong>{{ $errors->first('kode') }}</strong>
																			</span>
																			@endif
																		</div>
																	</div>


																	<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
																		<label for="nama" class="col-md-4 control-label">Nama Direktorat</label>

																		<div class="col-md-6">
																			<input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama', $itemDirektorat->nama) }}" required autofocus>

																			@if ($errors->has('nama'))
																			<span class="help-block">
																				<strong>{{ $errors->first('nama') }}</strong>
																			</span>
																			@endif
																		</div>
																	</div>
																	<div class="form-group">
																		<div class="col-md-6 col-md-offset-4">
																			<button type="submit" class="btn btn-primary">Simpan</button>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>

												<a href="#" class="btn btn-danger" 
												onclick="event.preventDefault(); 
												document.getElementById('direktorat-destroy-{{$itemDirektorat->kode}}').submit();">Delete</a>
												<form
												action="{{route('direktorat.destroy', $itemDirektorat->kode)}}" 
												id="direktorat-destroy-{{$itemDirektorat->kode}}" 
												method="POST" 
												style="display: none;"> 
												{{ csrf_field() }}
												{{ method_field('DELETE')}}
											</form>
										</td>

											<!-- <form class="form-horizontal" method="POST" action="{{ route('users.destroy',$itemDirektorat) }}"><button class="glyphicon glyphicon-trash" "></button>
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

				<div class="tab-pane" id="tambahDirektorat">
					<div class="box">
						<div class="box-header">
							<div class="box-title">Tambah Direktorat</div>
						</div>

						<div class="box-body">
							<form class="form-horizontal" method="POST" action="{{ route('direktorat.store') }}">
								{{ csrf_field() }}

								<div class="form-group{{ $errors->has('kode') ? ' has-error' : '' }}">
									<label for="kode" class="col-md-4 control-label">Kode</label>

									<div class="col-md-6">
										<input id="kode" type="text" class="form-control" name="kode" value="{{ old('kode') }}" required autofocus placeholder="Masukan Kode Direktorat">

										@if ($errors->has('kode'))
										<span class="help-block">
											<strong>{{ $errors->first('kode') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
									<label for="nama" class="col-md-4 control-label">Nama Direktorat</label>

									<div class="col-md-6">
										<input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus placeholder="Masukan Nama Direktorat">

										@if ($errors->has('nama'))
										<span class="help-block">
											<strong>{{ $errors->first('nama') }}</strong>
										</span>
										@endif
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
		$('#dataDirektorat').DataTable({"pageLength": 10});
	});

	$(document).ready(function(){
		$(".btn").click(function(){
			$("#detailDirektorat").modal('show');
		});
	});

</script>
@endsection