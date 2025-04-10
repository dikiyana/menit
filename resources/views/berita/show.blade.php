@extends('layout.master')

@section('judul')
Detil Berita {{$berita->judul}}
@endsection

@section('content')

<img src="{{asset('gambar/'.$berita->thumbnail)}}" alt="">
<h1>{{$berita->judul}}</h1>
<p>{{$berita->content}}</p>
<a href="/berita" class="btn btn-secondary">Kembali</a>


@endsection