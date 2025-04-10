@extends('layout.master')

@section('judul')
Daftar Berita
@endsection

@section('content')

<div class="row">
    @forelse ($berita as $item)
    <div class="col-4">
        <div class="card">
            <img src="{{asset('gambar/'.$item->thumbnail)}}" class="card-img-top" alt="...">
            <div class="card-body">
            <h5>{{$item->judul}}</h5>
              {{-- <p class="card-text">{{Str::limit($item->content, 30)}}</p> --}}
              <p class="card-text">{{ \Illuminate\Support\Str::limit($item->content, 150, $end='...') }}</p>
              <a href="/berita/{{$item->id}}" class="btn btn-info btn-sm">View</a>
              <a href="/berita/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
              <a href="/berita/{{$item->id}}/delete" class="btn btn-danger btn-sm">Delete</a>
            </div>
          </div>
    </div>    

    @empty
    <h4> Data Berita Belum Ada<h4>
    @endforelse



</div>


@endsection