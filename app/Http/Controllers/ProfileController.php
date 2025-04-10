<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profil;

class ProfileController extends Controller
{
    public function index(){
    $profile = Profil::where('user_id', Auth::id())->first();

    return view('profile.index', compact('profile'));
    }

    public function update(Request $request, $id){
    $profile = Profil::find($id);
    $profile->umur = $request->umur;
    $profile->alamat = $request->alamat;
    $profile->bio = $request->bio;

    $profile->save();

    return redirect('/profile');
    }
}
