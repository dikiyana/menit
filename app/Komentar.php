<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table ='komentar';
    protected $fillable =['berita_id', 'user_id', 'isi'];

    public function berita()
    {
        return $this->belongsTo('App\Berita');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
