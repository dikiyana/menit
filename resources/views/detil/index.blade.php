@extends('layout.master')

@section('judul')
List Kategori
@endsection

@section('content')
<a href="/kategori/create" class="btn btn-primary my-2">Tambah</a>
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($kategori as $key=>$value)
                    <tr>
                        <td>{{$key + 1}}</th>
                        <td>{{$value->nama}}</td>
                        <td>{{$value->deskripsi}}</td>
                        <td style="display:flex">
                            <a href="/kategori/{{$value->id}}" class="btn btn-info">Show</a>
                            <br><br>
                            <a href="/kategori/{{$value->id}}/edit" class="btn btn-primary">Edit</a>
                            <br><br>
                            <form action="/kategori/{{$value->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger my-1" value="Delete">
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr colspan="3">
                        <td>No data</td>
                    </tr>  
                @endforelse              
            </tbody>
        </table>
@endsection