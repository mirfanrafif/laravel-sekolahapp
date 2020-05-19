@extends('templates.master')

@section('title', 'Ubah Data Kelas')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Ubah Data</h3>
  </div>
  <div class="card-body">
    <form action="/admin/kelas/{{$kelas->id}}" method="post">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label for="nama">Nama Kelas</label>
        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Kelas"
          value="{{$kelas->nama_kelas}}" aria-describedby="helpId">
        <small id="helpId" class="text-muted">Contoh : 10 IPA 1</small>
      </div>
      <div class="form-group">
        <label for="jurusan">Jurusan</label>
        <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Jurusan (3 Huruf Saja)"
          aria-describedby="helpId" value="{{$kelas->jurusan}}">
        <small id="helpId" class="text-muted">Contoh : IPA</small>
      </div>
      <div class="form-group">
        <label for="jumlah_siswa">Jumlah Siswa</label>
        <input type="number" name="jumlah_siswa" id="jumlah_siswa" class="form-control" placeholder="Jumlah Siswa"
          aria-describedby="helpId" value="{{$kelas->jumlah_siswa}}">
        <small id="helpId" class="text-muted">Contoh : 30</small>
      </div>
      <div class="form-group">
        <label for="wali_kelas">Wali Kelas</label>
        <select class="form-control" name="wali_kelas" id="wali_kelas" value="{{$kelas->guru_id}}">
          <option value="">Pilih Salah Satu</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success">Kirim</button>
    </form>
  </div>
</div>
<script>
  $(document).ready(function () {
    $.get('http://localhost/ci-sekolahapp/api/guru', function (res) {
      gurus = res.data;
      gurus.forEach(guru => {
        $('#wali_kelas').append('<option value="' + guru.id + '">'+ guru.nama +'</option>');
      });

      $('#wali_kelas').val('{{$kelas->guru_id}}');
    })

  });
</script>
@endsection