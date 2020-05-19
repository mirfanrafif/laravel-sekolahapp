@extends('templates.master')

@section('title', 'Data Nilai')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Pilih Kelas</h3>
  </div>
  <div class="card-body">
    <form action="/admin/nilai" method="get">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Kelas</label>
            <select name="kelas" id="kelas" class="form-control">
              @foreach ($listKelas as $kelas)
              <option value="{{$kelas->id}}">{{$kelas->nama_kelas}}</option>
              @endforeach
            </select>
            <small id="helpId" class="text-muted">Pilih Kelas</small>
          </div>
          <input type="submit" value="submit" class="btn btn-primary">
        </div>
        <div class="col-md-6">
          
        </div>
      </div>
    </form>
  </div>
</div>

@if ($listSiswa)
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Siswa</h3>
  </div>
  <div class="card-body">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($listSiswa as $index => $siswa)
        <tr>
          <td>{{$index+1}}</td>
          <td>{{$siswa->nama}}</td>
          <td>
            <a href="/admin/nilai/{{$siswa->nis}}" class="btn btn-info">Lihat</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endif
@endsection