<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'Mapel';

    public function nilai()
    {
        return $this->hasMany('App\Nilai');
    }
}
