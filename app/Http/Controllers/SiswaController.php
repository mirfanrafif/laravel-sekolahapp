<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();

        return view('siswa.index', ['siswa' => $siswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();

        return view('siswa.tambah', ['listKelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswa = new Siswa();

        $this->validate($request, [
            'nama' => 'required',
            'tgl_lahir' => 'required|date',
            'tahun_ajar' => 'required|numeric',
            'id_kelas' => 'required|numeric'
        ]);

        $siswa->nama = $request->nama;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->tahun_ajar = $request->tahun_ajar;
        $siswa->kelas_id = $request->id_kelas;

        if ($siswa->save()) {
            return redirect('/admin/siswa');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($nis)
    {
        $siswa = Siswa::find($nis);

        return view('siswa.detail', ['siswa' => $siswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($nis)
    {
        $siswa = Siswa::find($nis);
        $kelas = Kelas::all();
        return view('siswa.ubah', [
            'siswa' => $siswa,
            'listKelas' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nis' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required|date',
            'tahun_ajar' => 'required|numeric',
            'id_kelas' => 'required|numeric'
        ]);

        $siswa = Siswa::find($id);

        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->tahun_ajar = $request->tahun_ajar;
        $siswa->kelas_id = $request->id_kelas;

        if ($siswa->save()) {
            return redirect('/admin/siswa');
        } else {
            return redirect('/admin/siswa')->with('message', 'Gagal Mengubah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);

        if ($siswa->delete()) {
            return redirect('/admin/siswa');
        }
    }
}
