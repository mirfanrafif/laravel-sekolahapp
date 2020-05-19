<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id';
    protected $fillable = ['siswa_nis', 'mapel_id', 'pengetahuan', 'keterampilan'];
    public $timestamps = false;

    public function siswa()
    {
        return $this->belongsTo('App\Siswa');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel');
    }
}
