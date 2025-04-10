@extends('layout.master')

@section('judul')
Halaman Edit Berita
@endsection

@section('content')
        <form action="/berita/{{$berita->id}}" method="POST" enctype="multipart/form-data">
            @csrf

            @method('PUT')
            <div class="form-group">
                <label>Judul Berita</label>
                <input type="text" value="{{$berita->judul}}" class="form-control" name="judul" placeholder="Masukkan Judul Berita">
                @error('judul')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label >Konten</label>
                <textarea name="content" class="form-control">{{$berita->content}}</textarea>
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
                    @if ($item->id == $berita->kategori_id)

                        <option value="{{$item->id}}" selected>{{$item->nama}}</option>
                    @else

                        <option value="{{$item->id}}">{{$item->nama}}</option>
                    @endif
                    {{-- <option value="{{$item->id}}">{{$item->nama}}</option> --}}
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


            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
@endsection