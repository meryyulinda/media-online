<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use App\Models\Kategori;

use Illuminate\Http\Request;
use Carbon\Carbon;

class FrontendKategoriController extends Controller
{
    public function index(Kategori $Kategori){
        $id_kategori = $Kategori->id;

        // TRENDING NEWS
        $trending = Berita::orderBy('created_at','DESC')->take(3)->get();

        // LIST KATEGORI
        $list_kategori = Kategori::get();

        // GET CURRENT KATEGORI
        $current_kategori = Kategori::where('id', $id_kategori)->first();

        // BERITA PER KATEGORI
        $berita_per_kategori = Berita::where('id_kategori', $id_kategori)->orderBy('created_at', 'DESC')->paginate(4);
        foreach($berita_per_kategori as $berita){
            // parsing created_at date to d/m/Y format
            $berita->parsed_created_at = $berita->created_at->format('d/m/Y');
        }

        // BERITA PILIHAN
        $berita_pilihan = Berita::with('kategori')->where('is_berita_pilihan', 'Yes')->orderBy('updated_at','DESC')->get();
        $berita_pilihan_count = $berita_pilihan->count();

        foreach($berita_pilihan as $berita){
            // getting diff_hours from created_at date
            $curr_datetime = Carbon::now();
            $created_datetime = Carbon::createFromFormat('Y-m-d H:i:s', $berita['created_at']);
            $diff_in_hours = $curr_datetime->diffInHours($created_datetime);
            $berita->diff_hours = $diff_in_hours;

            // parsing created_at date to d/m/Y format
            $berita->parsed_created_at = $berita->created_at->format('d/m/Y');
        };

        return view('frontend.kategori', ['trending'=>$trending, 'kategori'=>$list_kategori, 'current_kategori'=>$current_kategori, 'berita_per_kategori'=>$berita_per_kategori, 'berita_pilihan'=>$berita_pilihan, 'berita_pilihan_count'=>$berita_pilihan_count]);
    }
}
