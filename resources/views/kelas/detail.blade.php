@extends('templates.master')

@section('title', 'Detail Kelas')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">{{$detail->nama_kelas}}</h3>
  </div>
  <div class="card-body">
    <p>Nama Kelas : {{$detail->nama_kelas}}</p>
    <p>Jurusan : {{$detail->jurusan}}</p>
    <p>Jumlah Siswa : {{$detail->jumlah_siswa}}</p>
    @if ($walikelas != 'tidak ada')
    <p>Wali Kelas : {{$walikelas->nama}}</p>
    @else
    <p>Wali Kelas : tidak ada</p>
    @endif
    <form action="/kelas/{{$detail->id}}" method="post">
      @csrf
      @method('DELETE')
      <button class="btn btn-danger float-right ml-2" type="submit">Hapus</button>
    </form>
    <a href="/kelas/{{$detail->id}}/edit" class="btn btn-warning float-right">Ubah</a>
  </div>
</div>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Siswa</h3>
  </div>
  <div class="card-body p-0">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama</th>
          <th>NIS</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($siswa as $index => $item)
        <tr>
          <td>{{$index + 1}}</td>
          <td>{{$item->nis}}</td>
          <td>{{$item->nama}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection