<?php

namespace App\Http\Controllers;

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
        return view('kelas.tambah');
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
            return redirect('/admin/kelas');
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

        return view('kelas.detail', [
            'detail' => $kelas
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

        return view('kelas.ubah', [
            'kelas' => $kelas
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

        if (count($kelas->siswa) == 0) {
            $kelas->delete();
            return redirect('/kelas')->with('message', 'Berhasil Menghapus Data');;
        } else {
            return redirect('/kelas')->with('message', 'Gagal Menghapus Data. Pindahkan siswa ke kelas lain terlebih dahulu.');
        }
    }
}
