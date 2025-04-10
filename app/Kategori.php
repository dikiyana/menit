<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table ='kategori';
    protected $fillable =['nama', 'deskripsi'];
    
    public function berita()
    {
        return $this->hasMany('App\Berita');
    }
}
