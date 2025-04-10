@extends('layout.master')

@section('judul')
Detail Kategori
@endsection

@section('content')
<h1>{{$kategori->nama}}</h1>
<p>{{$kategori->deskripsi}}</p>

<div class="row">
    @foreach ($kategori->berita as $item)
        <div class="col-4">
            <div class="card">
                <img src="{{asset('gambar/'.$item->thumbnail)}}" class="card-img-top" alt="...">
                <div class="card-body">
                <h5>{{$item->judul}}</h5>
                  {{-- <p class="card-text">{{Str::limit($item->content, 30)}}</p> --}}
                  <p class="card-text">{{Str::limit($item->content, 150, $end='...') }}</p>
                  {{-- <a href="/berita/{{$item->id}}/delete" class="btn btn-danger btn-sm">Delete</a> --}}
                  <a href="/berita/{{$item->id}}" class="btn btn-info btn-sm">View</a>
                </div>
              </div>
        </div>
    @endforeach
</div>

@endsection