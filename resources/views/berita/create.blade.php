@extends('layout.master')

@section('judul')
Tambah Berita
@endsection

@section('content')
        <form action="/berita" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Judul Berita</label>
                <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Berita">
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
                <select name="kategori_id" class="form-control" id="">
                <option value="">---Pilih Kategori---</option>
                @foreach ($kategori as $item)
                    <option value="{{$item->id}}">{{$item->nama}}</option>
                @endforeach

            </select>
            </div>
            @error('kategori_id')
                    <div class="alert alert-danger">
                        {{ $message }}
            </div>
            @enderror

            <div class="form-group">
                <label >Thumbnail</label>
                <input type="file" name="thumbnail" class="form-controll">
                @error('thumbnail')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
@endsection