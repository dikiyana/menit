@extends('layout.master')

@section('judul')
Tambah Kategori
@endsection

@section('content')
        <form action="/kategori" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Kategori">
                @error('nama')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label >Deskripsi Kategori</label>
                <textarea name="deskripsi" class="form-control"></textarea>
                @error('deskripsi')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
@endsection