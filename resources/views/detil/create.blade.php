@extends('layout.master')

@section('judul')
Rekam Detil
@endsection

@section('content')
        <form action="/detil" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nama Judul</label>
                <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul">
                @error('judul')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label >Konten</label>
                <textarea name="content" class="form-control"></textarea>
                @error('content')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label >Kategori</label>
                <select name="kategori_id", class="form-control" id="">
                    <option value="">---Pilih Kategori---</option>"
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item ->nama }} </option>
                        {{-- yang masuk ke db id, yg muncul nama --}}
                    @endforeach
                </select>
                @error('kategori_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
           
            <div class="form-group">
                <label >Thumbnail</label>
                <textarea name="thumbnail" class="form-control" placeholder="Masukan Thumbnail"></textarea>
                @error('thumbnail')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
        
@endsection