	<!-- @foreach($dataSop as $index => $itemSop) -->
	<div class="box box-primary box-solid" id="panel-detail-sop" style="display: none;">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Detail sop</b></h3>
			<div class="box-tools pull-right">
				<button 
				type="button" 
				class="btn btn-box-tool" 
				data-toggle="modal" 
				data-target="#editSop"> 
				<i class="fa fa-pencil"></i>
			</button>
			
			<div id="editSop" class="modal fade" tabindex="-1" roleitemalog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-body">
							<form class="form-horizontal form-edit" enctype="multipart/form-data"  method="POST" action="{{ route('sop.update', $itemSop) }}">
								{{ csrf_field() }}
								{{ method_field('PUT')}}

								 <input type="hidden" name="kode_direktorat" value="1">
								
								<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
									<label for="judul" style="color: black" class="col-sm-2 control-label">Judul</label>

									<div class="col-sm-9">
										<input style="border-radius: 8px" id="judul" type="text" class="form-control" name="judul" value="{{ old('judul', $itemSop->judul) }}" required autofocus>

										@if ($errors->has('judul'))
										<span class="help-block">
											<strong>{{ $errors->first('judul') }}</strong>
										</span>
										@endif									
									</div>
								</div>

								<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
									<label for="deskripsi" style="color: black" class="col-sm-2 control-label">Deskripsi</label>

									<div class="col-sm-9">
										<input style="border-radius: 8px" id="deskripsi" type="text" class="form-control" name="deskripsi" value="<?= old('deskripsi', strip_tags($itemSop->deskripsi)) ?>" required autofocus>

										@if ($errors->has('deskripsi'))
										<span class="help-block">
											<strong>{{ $errors->first('deskripsi') }}</strong>
										</span>
										@endif									
									</div>
								</div>

								<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
									<label for="file" style="color: black" class="col-sm-2 control-label">File</label>

									<div class="col-sm-9">
										<input style="border-radius: 8px" id="file" type="file" class="form-control" name="file" value="{{ old('file', $itemSop->file) }}" required autofocus>

										@if ($errors->has('file'))
										<span class="help-block">
											<strong>{{ $errors->first('file') }}</strong>
										</span>
										@endif									
									</div>
								</div>

								<div class="form-group{{ $errors->has('versi') ? ' has-error' : '' }}">
									<label for="versi" style="color: black" class="col-sm-2 control-label">Versi</label>

									<div class="col-sm-9">
										<input style="border-radius: 8px" id="versi" type="text" class="form-control" name="versi" value="{{ old('versi', $itemSop->versi) }}" required autofocus>

										@if ($errors->has('versi'))
										<span class="help-block">
											<strong>{{ $errors->first('versi') }}</strong>
										</span>
										@endif									
									</div>
								</div>

								<div class="form-group{{ $errors->has('tgl_dibuat') ? ' has-error' : '' }}">
									<label for="tgl_dibuat" style="color: black" class="col-sm-2 control-label">Tanggal Dibuat</label>

									<div class="input-group date col-sm-9">
										<input style="border-radius: 8px" id="tgl_dibuat" type="date" class="form-control pull-right" name="tgl_dibuat" value="{{ old('tgl_dibuat',  $itemSop->tgl_dibuat) }}">
									</div>

									

										@if ($errors->has('judul'))
										<span class="help-block">
											<strong>{{ $errors->first('judul') }}</strong>
										</span>
										@endif									
									</div>
							

								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Simpan</button>
							</form>
							
						</div>
					</div>
				</div>
			</div>

			<button 
			type="button" 
			class="btn btn-box-tool" 
			data-widget="remove" 
			onclick="event.preventDefault(); 
			document.getElementById('sop-destroy-{{$itemSop->id}}').submit();">
			<i class="fa fa-times"></i>
		</button>
		<form 
		action="{{route('sop.destroy', $itemSop->id)}}" 
		id="sop-destroy-{{$itemSop->id}}" 
		method="POST" 
		style="display: none;"> {{ csrf_field() }}
		{{ method_field('DELETE')}}
	</form>
</div>
</div>
<div class="box-body">
	<table class="table table-striped">
		<tr>
			<th>Judul</th>
			<td id="js-sop-judul"></td>
			<td id="js-jumlah-acuan">{{ $itemSop->jumlah_acuan}} Telah Dijadikan Acuan</td>
		</tr>
		<tr>
			<th>Deskripsi</th>
			<td id="js-sop-deskripsi" colspan="2"></td>

		</tr>
		<tr>
			<th>File</th>
			<td colspan="2"><a href="#" id="js-sop-file"></a>
			</td>
		</tr>
		<tr>
			<th>Versi</th>
			<td colspan="2"><a href="#" id="js-sop-versi"></a>
			</td>
		</tr>
		<tr>
			<th>Tanggal Pembuatan</th>
			<td id="js-sop-created_at" colspan="2"></td>
		</tr>
	</table>

	<button type="button" id="js-pengajuan-revisi" class="btn btn-default-xs pull-right" data-toggle="modal" data-target="#revisiSop"><i class="fa fa-commenting"></i> Pengajuan Revisi</button>

	<button type="button" id="js-jadikan-acuan" class="btn btn-default-xs pull-right" style="margin-right: 10px" ><i class="fa fa-thumbs-o-up"></i> {{ csrf_field() }} Jadikan Acuan</button>

	<div id="revisiSop" class="modal fade" tabindex="-1" roleitemalog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<form class="form-horizontal form-edit" method="POST" action="{{route('revisiSop.store')}}">
						{{ csrf_field() }}

						<input type="hidden" name="id_sop" id="js-id-sop">

						<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
							<label for="deskripsi" style="color: black" class="col-sm-2 control-label">Deskripsi</label>

							<div class="col-sm-9">
								<input style="border-radius: 8px" id="deskripsi" type="text" class="form-control" name="deskripsi" value="{{ old('deskripsi')}}" required autofocus>

								@if ($errors->has('deskripsi'))
								<span class="help-block">
									<strong>{{ $errors->first('deskripsi') }}</strong>
								</span>
								@endif									
							</div>
						</div>

						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="box-footer box-comments">
	
</div>
<div class="box-footer">
	<form id="js-form-komentar-sop" action="#" method="post">
		{{ csrf_field() }}
		<img class="img-responsive img-circle img-sm" src="{{asset('image/person.png')}}" alt="Alt Text">
		<!-- .img-push is used to add margin to elements next to floating images -->
		<div class="img-push">
			<input id="js-input-deskripsi" name="deskripsi" type="text" class="form-control input-sm" placeholder="Press enter to post comment">
			<input type="hidden" name="id_sop" id="js-komentar-sop-id_sop">
		</div>
	</form>
</div>
</div>

<div id="template-komentar-sop" style="display: none" class="box-comment">
	<!-- User image -->
	<img class="img-circle img-sm" src="{{asset('image/person.png')}}" alt="User Image">

	<div class="comment-text js-komentar-sop-comment">
		<span class="username js-komentar-sop-user">
			<span class="text-muted pull-right js-komentar-sop-created"></span>
		</span><!-- /.username -->
	</div>
	<!-- /.comment-text -->
</div>
<!-- @endforeach -->