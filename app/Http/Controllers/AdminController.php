<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Berita;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $total_berita = Berita::get()->count();

        // BERITA PER KATEGORI
        $berita_kategori = Berita::with('kategori')
                            ->select('id_kategori', \DB::raw('count(*) as count'))
                            ->groupBy('id_kategori')
                            ->get();

        $array_berita_kategori = array();
        $i = 0;
        foreach($berita_kategori as $kat){
            $array_berita_kategori[$i]['y'] = $kat->count;
            $array_berita_kategori[$i]['indexLabel'] = $kat->kategori->nama_kategori;
            $i++;
        }

        // BERITA PER BULAN
        $berita_monthly = Berita::whereYear('created_at', date("Y"))
                            ->select(\DB::raw('MONTHNAME(created_at) month'), \DB::raw('count(*) as `count`'), )
                            ->groupBy('month')
                            ->get();

        $array_berita_monthly = array();
        $i = 0;
        foreach($berita_monthly as $month){
            $array_berita_monthly[$i]['label'] = $month->month;
            $array_berita_monthly[$i]['y'] = $month->count;
            $i++;
        }

        return view('admin.home', ['total_berita'=>$total_berita, 'berita_kategori'=>$berita_kategori, 'array_berita_kategori'=>$array_berita_kategori, 'berita_monthly'=>$berita_monthly, 'array_berita_monthly'=>$array_berita_monthly]);
    }
}
