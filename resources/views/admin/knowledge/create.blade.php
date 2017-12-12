@extends('admin.layout.master')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Tambah Knowledge</h4></div>
                <div class="panel-body">
                    <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('knowledge.store')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('kode_direktorat') ? ' has-error' : '' }}">
                            <label for="kode_direktorat">Direktorat</label>

                            <div >
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
                            <label>Judul</label>
                            <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}" autofocus placeholder="Masukan judul">
                            @if ($errors->has('judul'))
                            <span class="help-block">
                                <strong>{{ $errors->first('judul') }}</strong>
                            </span>
                            @endif
                        </div>


                        <div class="form-group{{ $errors->has('jenis') ? ' has-error' : '' }}">
                            <label>Jenis</label>
                            
                            <div id="jenis"  name="jenis" value="{{ old('jenis') }}">
                                <input type="radio" name="jenis" <?php if (isset($jenis) && $jenis=="tacit") echo "checked";?> value="tacit">Tacit
                                <input type="radio" name="jenis" <?php if (isset($jenis) && $jenis=="explicit") echo "checked";?> value="explicit">Explicit
                            </div>

                            @if ($errors->has('jenis'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jenis') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" value="{{ old('deskripsi') }}" class="textarea" placeholder="Masukan deskripsi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                            @if ($errors->has('deskripsi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('deskripsi') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                            <label>File</label>
                            <input id="file" type="file" class="form-control" name="file" value="{{ old('file') }}">

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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
