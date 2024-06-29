<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use App\Models\Kategori;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBeritaController extends Controller
{
    public function index(){

       if(null != request('search')){
        $list_berita = Berita::where('judul', 'like', '%' . request('search') . '%')->with('kategori')->paginate(5);
       }
       else{
        $list_berita = Berita::with('kategori')->orderBy('created_at', 'DESC')->paginate(5); // 1. update the Models to create the relation, 2. update the Controller, 3. include it on the HTML frontend
        // e.g. to get category name on the frontend: $list_berita->kategori->nama_kategori 
       }
       
        return view('admin.berita', ['data_berita'=>$list_berita]);
    }

    public function create(){
        
        $list_kategori = Kategori::get();
        return view('admin.berita-tambah', ['list_kategori'=>$list_kategori]);
    }

    public function store(Request $request){

        $berita = new Berita;
        $berita->id = $request->id;
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->konten = $request->konten;
        $berita->is_headline = $request->is_headline;
        $berita->is_berita_pilihan = $request->is_berita_pilihan;
        $berita->id_kategori = $request->id_kategori;
        $berita->slug = Str::limit(Str::slug($request->judul), 100, '');
        if(isset($request->gambar)){
            
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path(), $imageName);
            
            $berita->gambar = $imageName;
        }
        else{
            $berita->gambar = null;
        }
        $berita->save();

        return redirect()->route('admin.berita.index');
    }

    public function edit($id_berita){
        if (auth()->user()->role != 'admin') {
            return redirect()->intended('/login');
        }

        $berita = Berita::where('id', $id_berita)->first();
        $list_kategori = Kategori::get();

        return view('admin.berita-edit', ['berita'=>$berita, 'list_kategori'=>$list_kategori]);
    }

    public function update(Request $request){

        $berita = Berita::where('id', $request->id)->first();

        if(!empty($request->gambar)){
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path(), $imageName);
            
            if(\Storage::exists(public_path().$berita->gambar)){
                \Storage::delete(public_path().$berita->gambar);
            };
            $berita->gambar = $imageName;
        }

        $berita->id = $request->id;
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->konten = $request->konten;
        $berita->is_headline = $request->is_headline;
        $berita->is_berita_pilihan = $request->is_berita_pilihan;
        $berita->id_kategori = $request->id_kategori;
        $berita->slug = Str::limit(Str::slug($request->judul), 100, '');
        $berita->save();

        return redirect()->route('admin.berita.index');
    }

    public function destroy($id_berita){

        $berita = Berita::where('id', $id_berita)->first();

        if($berita->gambar != "") {
           unlink(public_path($berita->gambar));
        }

        $berita->delete();
        return redirect()->route('admin.berita.index');
    }

    public function set_headline($id_berita){

        $berita = Berita::where('id', $id_berita)->first();
        $berita->is_headline = "Yes";
        $berita->save();
        return redirect()->route('admin.berita.index');
    }

    public function unset_headline($id_berita){

        $berita = Berita::where('id', $id_berita)->first();
        $berita->is_headline = "No";
        $berita->save();
        return redirect()->route('admin.berita.index');
    }

    public function set_berita_pilihan($id_berita){

        $berita = Berita::where('id', $id_berita)->first();
        $berita->is_berita_pilihan = "Yes";
        $berita->save();
        return redirect()->route('admin.berita.index');
    }

    public function unset_berita_pilihan($id_berita){
        
        $berita = Berita::where('id', $id_berita)->first();
        $berita->is_berita_pilihan = "No";
        $berita->save();
        return redirect()->route('admin.berita.index');
    }

}
