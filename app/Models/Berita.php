<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    public $timestamps = true;

    public function kategori() {
        return $this->belongsTo(Kategori::class,'id_kategori');

        
    }


    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

}
