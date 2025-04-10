@extends('layout.master')

@section('judul')
Edit Kategori
@endsection

@section('content')

<h2>Edit Kategori {{$kategori->id}}</h2>
<form action="/kategori/{{$kategori->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" value="{{$kategori->nama}}" id="nama" placeholder="Masukkan Nama">
        @error('nama')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Kategori</label>
        <input type="text" class="form-control" name="deskripsi"  value="{{$kategori->deskripsi}}"  id="deskripsi" placeholder="Masukkan Deskripsi">
        @error('deskripsi')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>

@endsection