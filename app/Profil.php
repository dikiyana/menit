<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table ='profil';
    protected $fillable = ['umur', 'alamat', 'bio', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
