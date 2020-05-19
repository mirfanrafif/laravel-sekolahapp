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
    <p id="wali_kelas"></p>

    <form action="/admin/kelas/{{$detail->id}}" method="post">
      @csrf
      @method('DELETE')
      <button class="btn btn-danger float-right ml-2" type="submit">Hapus</button>
    </form>
    <a href="/admin/kelas/{{$detail->id}}/edit" class="btn btn-warning float-right">Ubah</a>
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
        @foreach ($detail->siswa as $index => $item)
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

<script>
  $(document).ready(function () {
    $.get('http://localhost/ci-sekolahapp/api/guru?id={{$detail->guru_id}}', function (res) {
      guru = res.data[0];
      console.log(guru);
      $('#wali_kelas').append('Wali Kelas : ' + guru.nama);
    })
  });
</script>
@endsection