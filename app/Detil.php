<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detil extends Model
{
    protected $table ='detil';
    protected $fillable = ['judul', 'content', 'kategori_id', 'thumbnail'];
}
