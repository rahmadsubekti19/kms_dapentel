@extends('admin.layout.master')

@section('content')

<?php
use Illuminate\Support\Facades\Storage;
?>

<div class="container">
    <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Tambah Sop</h4></div>
                <div class="panel-body">
                    <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('sop.store')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="kode_direktorat" value="{{ $kode_direktorat}}">
                        
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                                <label>Judul</label>
                                <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}" autofocus placeholder="Masukan judul">
                                @if ($errors->has('judul'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('judul') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" id="sop-deskripsi" value="{{ old('deskripsi') }}" class="textarea" placeholder="Masukan deskripsi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                @if ($errors->has('deskripsi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('deskripsi') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
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

                            <div class="form-group{{ $errors->has('versi') ? ' has-error' : '' }}">
                                <label>Versi</label>
                                <input id="versi" type="text" class="form-control" name="versi" value="{{ old('versi') }}" autofocus placeholder="Masukan versi">
                                @if ($errors->has('versi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('versi') }}</strong>
                                </span>
                                @endif
                            </div>
                    </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('tgl_dibuat') ? ' has-error' : '' }}">
                                <label>Tanggal Dibuat</label>

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
                        
                    </div>

                    <div class="col-md-12">
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

<script>
  // $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('sop-deskripsi');
  // });
</script>

@endpush