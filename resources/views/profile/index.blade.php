@extends('layout.master')

@section('judul')
Update Profile
@endsection

@section('content')
        <form action="/profile/{{$profile->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama</label>
                <input type="text" value="{{$profile->user->name}}" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" value="{{$profile->user->email}}" class="form-control" disabled>
            </div>

            <div class="form-group">
                <label>Umur</label>
                <input type="number" value="{{$profile->umur}}" class="form-control" name="umur" placeholder="Masukkan Umur Anda">
                @error('umur')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat"  {{$profile->alamat}} class="form-control" id="" cols="30" rows="10"> {{$profile->alamat}}</textarea>
                @error('alamat')
                    <div class="alert alert-danger">
                         {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Biodata</label>
                <textarea name="bio" class="form-control" cols="30" rows="10">{{$profile->bio}}</textarea>
                @error('bio')
                    <div class="alert alert-danger">
                         {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
@endsection