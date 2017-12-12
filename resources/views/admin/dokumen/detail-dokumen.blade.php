	<!-- @foreach($dataDokumen as $index => $itemDokumen) -->
	<div class="box box-primary box-solid" id="panel-detail-dokumen" style="display: none;">
		<div class="box-header with-border">
			<h3 class="box-title"><b>Detail Dokumen</b></h3>
			<div class="box-tools pull-right">
				<!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
				<button type="button" class="btn btn-box-tool" data-widget="remove" onclick="event.preventDefault(); 
				document.getElementById('dokumen-destroy-{{$itemDokumen->id}}').submit();">
				<i class="fa fa-times"></i>
			</button>
			<form 
			action="{{route('dokumen.destroy', $itemDokumen->id)}}" 
			id="dokumen-destroy-{{$itemDokumen->id}}" 
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

<div class="box-footer box-comments">
	
</div>
<div class="box-footer">
	<form id="js-form-revisi" action="#" method="post">
		{{ csrf_field() }}
		<img class="img-responsive img-circle img-sm" src="{{asset('image/person.png')}}" alt="Alt Text">
		<!-- .img-push is used to add margin to elements next to floating images -->
		<div class="img-push">
			<input name="deskripsi" type="text" class="form-control input-sm" placeholder="Press enter to post comment">
			<input type="hidden" name="id_dokumen" id="js-revisi-id_dokumen">
		</div>
	</form>
</div>
</div>

<div id="template-revisi" style="display: none" class="box-comment">
		<!-- User image -->
		<img class="img-circle img-sm" src="{{asset('image/person.png')}}" alt="User Image">

		<div class="comment-text js-revisi-comment">
			<span class="username js-revisi-user">
				<span class="text-muted pull-right js-revisi-created"></span>
			</span><!-- /.username -->
		</div>
		<!-- /.comment-text -->
	</div>
<!-- @endforeach -->