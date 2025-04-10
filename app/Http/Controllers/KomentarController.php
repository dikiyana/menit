<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\komentar;

class KomentarController extends Controller
{
    public function store(request   $request){
        $komentar = new Komentar;
 
        $komentar->isi = $request->isi;
        $komentar->berita_id = $request->berita_id;
        $komentar->user_id = Auth::id();
 
        $komentar->save();

        return redirect()->back();
    }
}
