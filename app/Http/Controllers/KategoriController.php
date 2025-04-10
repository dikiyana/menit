<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class KategoriController extends Controller
{
//create
    public function create(){
        return view('kategori.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);
        $query = DB::table('kategori')->insert([
            "nama" => $request["nama"],
            "deskripsi" => $request["deskripsi"]
        ]);
        return redirect('/kategori');
    }
//index
    public function index() {
        $kategori = DB::table('kategori')->get();
        return view('kategori.index', compact('kategori'));
    }
//show 
    public function show($id){
        $kategori = DB::table('kategori')->where('id', $id)->first();
        return view('kategori.show', compact('kategori'));
    }
//Update
    public function edit($id)
    {
        $kategori = DB::table('kategori')->where('id', $id)->first();
        return view('kategori.edit', compact('kategori'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        $query = DB::table('kategori')
            ->where('id', $id)
            ->update([
                "nama" => $request["nama"],
                "deskripsi" => $request["deskripsi"]
            ]);
        return redirect('/kategori') -> with('success', 'Berhasil update kategori');
    }
//delete
    public function destroy($id)
    {
        $query = DB::table('kategori')->where('id', $id)->delete();
        return redirect('/kategori');
    }
}
