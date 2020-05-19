@extends('templates.master')

@section('title', 'Data Nilai')

@section('content')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Nilai Siswa</h3>
  </div>
  <div class="card-body">
    <h3>{{$siswa->nama}}</h3>
    <h6>{{$siswa->kelas->nama_kelas}}</h6>
    <br><br>
    <table class="table table-hover">
      <thead class="thead">
        <tr>
          <th>Nama Mapel</th>
          <th>Pengetahuan</th>
          <th>Keterampilan</th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
  </div>
</div>

@endsection