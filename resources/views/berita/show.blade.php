@extends('layout.master')

@section('judul')
Detil Berita {{$berita->judul}}
@endsection

@section('content')

<img src="{{asset('gambar/'.$berita->thumbnail)}}" alt="">
<h1>{{$berita->judul}}</h1>
<p>{{$berita->content}}</p>

<h3>Komentar</h3>
@foreach ($berita->komentar as $item)
<div class="card">
    <div class="card-body">
      <h6 class="card-subtitle mb-2 text-muted">{{$item->user->name}}</h6>
      <p class="card-text">{{$item->isi}}</p>
    </div>
  </div>
@endforeach

<form action="/komentar" method="POST">
    @csrf
        <label >Isi komentar</label>
        <input type="hidden" value="{{$berita->id}}" name="berita_id">
        <textarea name="isi" class="form-control"></textarea>
        @error('isi')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary my-2">Tambah Komentar</button>
</form>


<a href="/berita" class="btn btn-secondary">Kembali</a>


@endsection