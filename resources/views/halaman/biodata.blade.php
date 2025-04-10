@extends('layout.master')

@section('judul')
Halaman Utama
@endsection

@section('content')



    <form action="/kirim" method="post">
        @csrf
        <label>Nama Lengkap</label> <br><br>
        <input type="text" name="Nama"> <br><br>
        <label>Umur</label> <br><br>
        <input type="number" name="Umur"> <br><br>
        <label>Tanggal Lahir</label> <br><br>
        <input type="date" name="ttl"> <br><br>
        <label>Warga Negara</label> <br><br>
        <input type="radio" name="WN" >WNI
        <input type="radio" name="WN" >WNA  <br><br>
        <label>Skill</label> <br><br>
        <input type="checkbox">Html
        <input type="checkbox">CSS
        <input type="checkbox">JavaScript
        <input type="checkbox">Laravel <br><br>
        <label>Jenis Kelamin</label>
        <select name="JK" >
            <option value="1">Laki-Laki</option>
            <option value="2">Perempuan</option>
        </select><br><br>
        <label>Alamat</label> <br><br>
        <Textarea name="alamat" cols="50" rows="30"></Textarea> <br><br>
        <input type="submit">
    
 @endsection