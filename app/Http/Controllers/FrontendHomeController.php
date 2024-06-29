<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use App\Models\Kategori;

use Illuminate\Http\Request;
use Carbon\Carbon;

class FrontendHomeController extends Controller
{
    public function index(){

        // TRENDING NEWS
        $trending = Berita::orderBy('created_at','DESC')->take(3)->get();

        // LIST KATEGORI
        $kategori = Kategori::get();
        
        // HEADLINE
        $headline = Berita::with('kategori')->where('is_headline','Yes')->orderBy('created_at','DESC')->get();

        foreach($headline as $head){
            // getting diff_hours from created_at date
            $curr_datetime = Carbon::now();
            $created_datetime = Carbon::createFromFormat('Y-m-d H:i:s', $head['created_at']);
            $diff_in_hours = $curr_datetime->diffInHours($created_datetime);
            $head->diff_hours = $diff_in_hours;

            // parsing created_at date to d/m/Y format
            $head->parsed_created_at = $head->created_at->format('d/m/Y');
        };

        // BERITA TERBARU & SEARCH

        $berita_terbaru = Berita::orderBy('created_at', 'DESC')->paginate(4);
        $search_state = 'inactive';
        $keywords = '';

        if(request('search')) {
            $keywords = request('search');
            $search_state = 'active';
            $berita_terbaru = Berita::where('judul', 'like', '%' . request('search') . '%')
                                    ->orWhere('konten', 'like', '%' . request('search') . '%')
                                    ->orderBy('created_at', 'DESC')->paginate(4);
        }

        foreach($berita_terbaru as $berita){
            // getting diff_hours from created_at date
            $curr_datetime = Carbon::now();
            $created_datetime = Carbon::createFromFormat('Y-m-d H:i:s', $berita['created_at']);
            $diff_in_hours = $curr_datetime->diffInHours($created_datetime);
            $berita->diff_hours = $diff_in_hours;

            // parsing created_at date to d/m/Y format
            $berita->parsed_created_at = $berita->created_at->format('d/m/Y');
        };

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
        
        // return $berita_terbaru;
        return view('frontend.index', ['keywords'=>$keywords, 'search_state'=>$search_state,'trending'=>$trending, 'kategori'=>$kategori, 'headline'=>$headline, 'berita_terbaru'=>$berita_terbaru, 'berita_pilihan'=>$berita_pilihan, 'berita_pilihan_count'=>$berita_pilihan_count]);
    }






    public function indeks_berita(){
        // TRENDING NEWS
        $trending = Berita::orderBy('created_at','DESC')->take(3)->get();

        // LIST KATEGORI
        $kategori = Kategori::get();

        // LIST BERITA
        $berita_terbaru = Berita::with('kategori')->orderBy('created_at', 'DESC')->paginate(4);

        foreach($berita_terbaru as $brt){
            // getting diff_hours from created_at date
            $curr_datetime = Carbon::now();
            $created_datetime = Carbon::createFromFormat('Y-m-d H:i:s', $brt['created_at']);
            $diff_in_hours = $curr_datetime->diffInHours($created_datetime);
            $brt->diff_hours = $diff_in_hours;

            // parsing created_at date to d/m/Y format
            $brt->parsed_created_at = $brt->created_at->format('d/m/Y');
        };
        
        // BERITA PILIHAN
        $berita_pilihan = Berita::with('kategori')->where('is_berita_pilihan', 'Yes')->orderBy('created_at','DESC')->get();
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
        
        return view('frontend.indeks-berita', ['trending'=>$trending, 'kategori'=>$kategori, 'berita_terbaru'=>$berita_terbaru, 'berita_pilihan'=>$berita_pilihan, 'berita_pilihan_count'=>$berita_pilihan_count]);
    }
}
