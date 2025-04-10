<?php

namespace App\Http\Controllers;
use DB;
use App\Berita;
use File;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//index    
    public function index()
    {
        // return "hello, world";
        $berita = Berita::all();
        return view('berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//create
    public function create()
    {
        $kategori = DB::table('kategori')->get();
        return view('berita.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

//store
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'content' => 'required',
            'kategori_id' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $thumbnailName = time().'.'.$request->thumbnail->extension();  
        $request->thumbnail->move(public_path('gambar'), $thumbnailName);

        $berita = new Berita;

        $berita->judul = $request->judul;      
        $berita->content = $request->content;
        $berita->kategori_id = $request->kategori_id;
        $berita->thumbnail = $thumbnailName;
        $berita->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

//Show
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view ('berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

//Edit
    public function edit($id)
    {
        $kategori = DB::table('kategori')->get();
        $berita = Berita::findOrFail($id);

        return view('berita.edit', compact('berita', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
// update
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'content' => 'required',
            'kategori_id' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $berita = Berita::find($id);

        if ($request-> has('thumbnail')) {
            
            $thumbnailName = time().'.'.$request->thumbnail->extension();  
            $request->thumbnail->move(public_path('gambar'), $thumbnailName);
    
            // $berita = new Berita;
            // yg bikin double
            $berita->judul = $request->judul;      
            $berita->content = $request->content;
            $berita->kategori_id = $request->kategori_id;
            $berita->thumbnail = $thumbnailName;
        }else {
            $berita->judul = $request->judul;      
            $berita->content = $request->content;
            $berita->kategori_id = $request->kategori_id;
        }
        $berita->update();
        return redirect('/berita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
// delete
     public function destroy($id)
    {
        $berita = berita::find($id);
 
        $path   = "gambar/";
        File::delete($path . $berita->thumbnails);
        $berita->delete();

        return redirect('/berita');
    }
}
