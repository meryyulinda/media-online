<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use App\Models\Kategori;

use Illuminate\Http\Request;
use Carbon\Carbon;

class FrontendBeritaController extends Controller
{
    public function index(Berita $berita){

        $id_berita = $berita->id;
        
        // TRENDING NEWS
        $trending = Berita::orderBy('created_at','DESC')->take(3)->get();

        // LIST KATEGORI
        $kategori = Kategori::get();

        // GET KONTEN BERITA
        $berita = Berita::with('kategori')->find($id_berita);

        // GET PREVIOUS BERITA
        $berita_prev = Berita::find($id_berita-1);

        // GET NEXT BERITA
        $berita_next = Berita::find($id_berita+1);

        // BERITA PILIHAN
        $berita_pilihan = Berita::with('kategori')->where('is_berita_pilihan', 'Yes')->orderBy('updated_at','DESC')->get();
        $berita_pilihan_count = $berita_pilihan->count();

        foreach($berita_pilihan as $pilihan){
            // getting diff_hours from created_at date
            $curr_datetime = Carbon::now();
            $created_datetime = Carbon::createFromFormat('Y-m-d H:i:s', $pilihan['created_at']);
            $diff_in_hours = $curr_datetime->diffInHours($created_datetime);
            $pilihan->diff_hours = $diff_in_hours;

            // parsing created_at date to d/m/Y format
            $pilihan->parsed_created_at = $pilihan->created_at->format('d/m/Y');
        };
        
        // BERITA LAINNYA
        $berita_lainnya = Berita::with('kategori')->where('id','!=',$id_berita)->orderBy('created_at','DESC')->get();

        return view('frontend.berita', ['trending'=>$trending, 'kategori'=>$kategori,'berita'=>$berita, 'berita_prev'=>$berita_prev, 'berita_next'=>$berita_next, 'berita_pilihan'=>$berita_pilihan, 'berita_pilihan_count'=>$berita_pilihan_count, 'berita_lainnya'=>$berita_lainnya]);
    }
}
