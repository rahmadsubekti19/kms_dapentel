@extends('admin.layout.master')

@section('content')

<div class="container">
	<br>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Tambah Notulensi</h4></div>
				<div class="panel-body">
					<form class="form" method="POST" enctype="multipart/form-data" action="{{ route('notulensi.store')}}">
						{{ csrf_field() }}

						<div class="col-md-6">
							<div class="form-group{{ $errors->has('kode_direktorat') ? ' has-error' : '' }}">
								<label>Direktorat</label>
								<select id="kode_direktorat" class="form-control " name="kode_direktorat" required>
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

							<div class="form-group{{ $errors->has('tgl_dibuat') ? ' has-error' : '' }}">
								<label>Tanggal Rapat</label>

								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input id="tgl_dibuat" type="date" class="form-control pull-right" name="tgl_dibuat" value="{{ old('tgl_dibuat') }}">
								</div>

								@if ($errors->has('tgl_dibuat'))
								<span class="help-block">
									<strong>{{ $errors->first('tgl_dibuat') }}</strong>
								</span>
								@endif
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group{{ $errors->has('tempat') ? ' has-error' : '' }}">
								<label>Tempat</label>
								<input id="tempat" type="text" class="form-control" name="tempat" value="{{ old('tempat') }}" autofocus placeholder="Masukan Tempat">
								@if ($errors->has('tempat'))
								<span class="help-block">
									<strong>{{ $errors->first('tempat') }}</strong>
								</span>
								@endif
							</div>

							<div class="form-group{{ $errors->has('agenda') ? ' has-error' : '' }}">
								<label>Agenda Rapat</label>
								<input id="agenda" type="text" class="form-control" name="agenda" value="{{ old('agenda') }}" autofocus placeholder="Masukan Agenda Rapat">
								@if ($errors->has('agenda'))
								<span class="help-block">
									<strong>{{ $errors->first('agenda') }}</strong>
								</span>
								@endif
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="pokok-bahasan-wrap">
								<div class="pokok-bahasan">
									<h4 class="judul-pokok-bahasan">Pokok Bahasan 1</h4>
									<div class="form-group{{ $errors->has('topik_bahasan') ? ' has-error' : '' }}">
										<label>Topik Bahasan</label>
										<textarea id="topik_bahasan" type="text" rows="4" cols="50" class="form-control" name="topik_bahasan[]" value="{{ old('topik_bahasan') }}" autofocus placeholder="Masukan topik bahasan"></textarea>

										@if ($errors->has('topik_bahasan'))
										<span class="help-block">
											<strong>{{ $errors->first('topik_bahasan') }}</strong>
										</span>
										@endif
									</div>

									<div class="form-group{{ $errors->has('catatan_diskusi') ? ' has-error' : '' }}">
										<label>Catatan Diskusi</label>
										<textarea id="catatan_diskusi" type="text" rows="4" cols="50" class="form-control" name="catatan_diskusi[]" value="{{ old('catatan_diskusi') }}" autofocus placeholder="Masukan catatan diskusi"></textarea>

										@if ($errors->has('catatan_diskusi'))
										<span class="help-block">
											<strong>{{ $errors->first('catatan_diskusi') }}</strong>
										</span>
										@endif
									</div>

									<div class="form-group{{ $errors->has('kep_tindakan') ? ' has-error' : '' }}">
										<label>Keputusan dan Tindakan</label>
										<textarea id="kep_tindakan" type="text" rows="4" cols="50" class="form-control" name="kep_tindakan[]" value="{{ old('kep_tindakan') }}" autofocus placeholder="Masukan keputusan dan tindakan"></textarea>

										@if ($errors->has('kep_tindakan'))
										<span class="help-block">
											<strong>{{ $errors->first('kep_tindakan') }}</strong>
										</span>
										@endif
									</div>
								</div>
							</div>

							<b class="btn btn-tambah-pokok-bahasan"><i class="fa fa-fw fa-plus-square-o"></i>Tambah Pokok Bahasan</b><br>

							<div class="form-group">
								<label>Daftar Hadir</label>
								<select class="form-control select2" name="daftar_hadir[]" multiple="multiple" data-placeholder="Pilih pegawai" style="width: 100%;">
									@foreach($daftarHadir as $pegawai)
									<option value="{{ $pegawai->nik }}">{{ $pegawai->nama }}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
								<label>File</label>
								<input id="file" type="file" class="form-control" accept=".vsd" name="file" value="{{ old('file') }}">

								@if ($errors->has('file'))
								<span class="help-block">
									<strong>{{ $errors->first('file') }}</strong>
								</span>
								@endif

								<p class="help-block">Please input file</p>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary">Simpan</button>
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