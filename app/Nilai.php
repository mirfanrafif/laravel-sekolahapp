<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id';
    protected $fillable = ['siswa_id', 'mapel_id', 'pengetahuan', 'keterampilan'];
    public $timestamps = false;

    public function siswa()
    {
        $this->belongsTo('App\Siswa');
    }

    public function mapel()
    {
        $this->belongsTo('App\Mapel');
    }
}
