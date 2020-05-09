<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    public function kelas()
    {
        return $this->hasOne('App\Kelas');
    }
}
