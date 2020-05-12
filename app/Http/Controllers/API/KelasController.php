<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kelas;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kelas::all();
        $res['message'] = 'Success';
        $res['data'] = $data;

        return $res;
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
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->jurusan = $request->jurusan;
        $kelas->jumlah_siswa = $request->jumlah_siswa;
        $kelas->id_guru = $request->id_guru;

        if ($kelas->save()) {
            $res['message'] = 'Success';
            $res['data'] = $kelas;

            return $res;
        } else {
            $res['message'] = 'Gagal';
            $res['data'] = $kelas;

            return $res;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::findOrFail($id)->get();
        $siswa = $kelas->siswa;
        $walikelas = Kelas::find($id)->guru;

        $res['message'] = "Success";
        $res['detail'] = $kelas;
        $res['siswa'] = $siswa;
        $res['wali_kelas'] = $walikelas;

        return $res;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->jurusan = $request->jurusan;
        $kelas->jumlah_siswa = $request->jumlah_siswa;
        $kelas->id_guru = $request->id_guru;

        if ($kelas->save()) {
            $res['message'] = 'Success';
            $res['data'] = $kelas;

            return $res;
        } else {
            $res['message'] = 'Gagal';
            $res['data'] = $kelas;

            return $res;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);

        if ($kelas->delete()) {
            $res['message'] = 'Success';
            $res['data'] = $kelas;

            return $res;
        }
    }
}
