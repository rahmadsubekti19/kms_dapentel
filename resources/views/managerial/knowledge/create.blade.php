@extends('admin.layout.master')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Tambah Knowledge</h4></div>
                <div class="panel-body">
                    <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('knowledgeStore')}}">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('kode_direktorat') ? ' has-error' : '' }}">
                                <label for="kode_direktorat" class="control-label">Direktorat</label>
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
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                                <label for="judul" class="control-label">Judul</label>

                                <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}" required autofocus placeholder="Masukan judul">

                                @if ($errors->has('judul'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('judul') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('jenis') ? ' has-error' : '' }}">
                                <label for="jenis" class="control-label">Jenis</label><br>

                                <label class="radio-inline"><input type="radio" class="flat-red" name="jenis" value="Tacit Knowledge" required> Tacit Knowledge </label>

                                <label class="radio-inline"><input type="radio" class="flat-red" name="jenis" value="Explicit Knowledge" required> Explicit Knowledge </label>

                                @if ($errors->has('jenis'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('jenis') }}</strong>
                                </span>
                                @endif
                                <br>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <b style="color: red">Keterangan:</b><br>
                            - <strong>Tacit Knowledge</strong> adalah pengetahuan yang terdapat di dalam otak/pikiran kita sesuai dengan pemahaman, keahlian dan pengalaman seseorang, susah untuk didefinisikan dengan bahasa formal dan isinya mencakup pemahaman pribadi. <br>
                            - <strong>Explicit Knowledge</strong> adalah pengetahuan yang telah di artikulasikan sehingga lebih terstruktur dan dapat disimpan, serta dapat dipindahkan ke siapapun dengan mudah. Bentuk dari explicit knowledge, meliputi : manual, dokumen, dan prosedur.
                        </div>

                        <div class="col-md-12">
                            <br>
                            <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                                <label for="deskripsi" class="control-label">Deskripsi</label><br>
                                <textarea name="deskripsi" id="knowledge-deskripsi" value="{{ old('deskripsi') }}" class="textarea" placeholder="Masukan deskripsi" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                            @if ($errors->has('deskripsi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('deskripsi') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                                <label class="control-label">File</label>
                                <input id="file" type="file" class="form-control" name="file" value="{{ old('file') }}">
                            </div>
                            @if ($errors->has('file'))
                            <span class="help-block">
                                <strong>{{ $errors->first('file') }}</strong>
                            </span>
                            @endif
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
