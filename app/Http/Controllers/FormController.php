<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function biodata(){
        return view ('halaman.biodata');
    }
    public function kirim(Request $request){
        //dd($request->all());
        $Nama = $request['Nama'];
        $Umur = $request['Umur'];
        $ttl = $request['ttl'];
        $WN = $request['WN'];
        $JK = $request['JK'];
        $alamat = $request['alamat'];

        return view('halaman.home', compact('Nama', 'Umur', 'ttl', 'WN', 'JK', 'alamat'));

    }
}
