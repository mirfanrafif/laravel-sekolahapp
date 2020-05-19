<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Nilai;
use App\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listKelas = Kelas::all();

        // return $request->kelas;

        if ($request->kelas) {
            $listSiswa = Kelas::find($request->kelas)->siswa;
        } else {
            $listSiswa = [];
        }

        return view('nilai.index', [
            'listKelas' => $listKelas,
            'listSiswa' => $listSiswa
        ]);
    }

    public function nilaiSiswa($nis)
    {
        $siswa = Siswa::find($nis);

        return view('nilai.siswa', ['siswa' => $siswa]);
    }

    public function tambah($nis)
    {
        $siswa = Siswa::find($nis);

        return view('nilai.tambah', ['siswa' => $siswa]);
    }

    public function simpanNilaiSiswa(Request $request)
    {
        $nilai = new Nilai();
        $nilai->siswa_nis = $request->siswa_nis;
        $nilai->mapel_id = $request->mapel_id;
        $nilai->pengetahuan = $request->pengetahuan;
        $nilai->keterampilan = $request->keterampilan;

        if ($nilai->save()) {
            return redirect('/admin/nilai/' . $request->siswa_nis);
        }
    }
}
