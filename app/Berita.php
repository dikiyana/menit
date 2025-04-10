<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table ='berita';
    protected $fillable = ['judul', 'content', 'kategori_id', 'thumbnail'];
    public function kategori()
    {
        return $this->belongsTo('App\Kategori');
    }

    public function komentar()
    {
        return $this->hasMany('App\Komentar');
    }
}
