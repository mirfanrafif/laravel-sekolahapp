<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();

        return view('kelas.index', ['kelas' => $kelas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();
        return view('kelas.tambah', ['gurus' => $guru]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelas = new Kelas();
        $kelas->nama_kelas = $request->nama;
        $kelas->jurusan = $request->jurusan;
        $kelas->jumlah_siswa = $request->jumlah_siswa;
        $kelas->guru_id = $request->wali_kelas;

        if ($kelas->save()) {
            return redirect('kelas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);
        $siswa = $kelas->siswa;
        if ($kelas->guru_id) {
            $walikelas = Kelas::find($id)->guru;
        } else {
            $walikelas = 'tidak ada';
        }

        return view('kelas.detail', [
            'detail' => $kelas,
            'siswa' => $siswa,
            'walikelas' => $walikelas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $guru = Guru::all();

        return view('kelas.ubah', [
            'kelas' => $kelas,
            'gurus' => $guru
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->nama_kelas = $request->nama;
        $kelas->jurusan = $request->jurusan;
        $kelas->jumlah_siswa = $request->jumlah_siswa;
        $kelas->guru_id = $request->wali_kelas;

        if ($kelas->save()) {
            return redirect('kelas');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);

        if ($kelas->delete()) {
            return redirect('/kelas', 'refresh');
        }
    }
}
