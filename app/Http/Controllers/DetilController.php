<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\detil;

class DetilController extends Controller
{
    //create
        public function create(){
            // return view('detil.create');
            $kategori = DB::table('kategori')->get();
            return view('detil.create', compact('kategori'));
        }
    //store
        public function store(Request $request)
        {
            $request->validate([
                'judul' => 'required',
                'content' => 'required',
                'kategori_id' => 'required',
                'thumbnail' => 'required'
            ]);

            $detil = new Detil;

            $detil -> judul = $request ->judul;
            $detil -> content = $request->content;
            $detil -> kategori_id = $request->kategori_id;
            $detil -> thumbnail = $request->thumbnail;

            $detil -> save();

        }
    //index
        public function index() {
            // $detil = DB::table('detil')->get();
            // return view('detil.index', compact('detil'));

        }
    //show 
        public function show($id){
            $detil = DB::table('detil')->where('id', $id)->first();
            return view('detil.show', compact('detil'));
        }
    //Update
        public function edit($id)
        {
            $detil = DB::table('detil')->where('id', $id)->first();
            return view('detil.edit', compact('detil'));
        }
    
        public function update($id, Request $request)
        {
            $request->validate([
                'judul' => 'required',
                'content' => 'required',
                'thumbnail' => 'required'
            ]);
    
            $query = DB::table('detil')
                ->where('id', $id)
                ->update([
                    "judul" => $request["judul"],
                    "content" => $request["content"],
                    "thumbnail" => $request["thumbnail"]
                ]);
            return redirect('/detil') -> with('success', 'Berhasil update detil');
        }
    //delete
        public function destroy($id)
        {
            $query = DB::table('detil')->where('id', $id)->delete();
            return redirect('/detil');
        }
    }
    
