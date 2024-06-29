<?php

namespace App\Http\Controllers;
use App\Models\Kategori;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminKategoriController extends Controller
{
    public function index(){

        if(null != request('search')){
            $list_kategori = Kategori::where('nama_kategori', 'like', '%' . request('search') . '%')->paginate(5);
        }
        else{
            $list_kategori = Kategori::paginate(5);
        }

        return view('admin.kategori', ['data_kategori'=>$list_kategori]);
    }

    public function create(){
        return view('admin.kategori-tambah');
    }

    public function store(Request $request){
        $kategori = new Kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = Str::limit(Str::slug($request->nama_kategori), 100, '');
        $kategori->save();
        return redirect()->route('admin.kategori.index');

    }

    public function edit($id_kategori){
        
        $kategori = Kategori::find($id_kategori);
        return view('admin.kategori-edit', ['kategori'=>$kategori]);
    }

    public function update(Request $request){
        $kategori = Kategori::where('id', $request->id)->first();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = Str::limit(Str::slug($request->nama_kategori), 100, '');
        $kategori->save();

        return redirect()->route('admin.kategori.index');
    }
}
