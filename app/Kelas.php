<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = "kelas";
    protected $primaryKey = "id";
    protected $fillable = ["nama_kelas", "jurusan", "jumlah_siswa", "guru_id"];

    public $timestamps = false;

    public function siswa()
    {
        return $this->hasMany('App\Siswa');
    }

    public function guru()
    {
        return $this->belongsTo('App\Guru');
    }
}
