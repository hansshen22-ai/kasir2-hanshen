@extends('adminlte::page')

@section('title', 'Tambah jurusan')

@section('content_header')
    <h1>Tambah Jurusan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
             <form action="{{ route('jurusan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 

                 <div class="form-group">
                    <label for="kode_jurusan">kode_jurusan</label>
                    <input type="text" name="kode_jurusan" class="form-control @error('kode_jurusan') is-invalid @enderror" id="kode_jurusan" required value="{{ old('kode_jurusan') }}">
                    @error('kode_jurusan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama_jurusan">Nama Jurusan</label>
                    <input type="text" name="nama_jurusan" class="form-control @error('nama_jurusan') is-invalid @enderror" id="nama_jurusan" required value="{{ old('nama_jurusan') }}">
                    @error('nama_jurusan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" required placeholder="Contoh: Rekayasa Perangkat Lunak" value="{{ old('jurusan') }}">
                    @error('jurusan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" id="kelas" required placeholder="Contoh: 12-RPL-A" value="{{ old('kelas') }}">
                    @error('kelas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@stop