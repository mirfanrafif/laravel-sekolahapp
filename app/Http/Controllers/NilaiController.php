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
}
