@extends('templates.master')

@section('title', 'Tambah Data Nilai Siswa')

@section('content')

<div class="card">
  <div class="card-body">
    <form action="/admin/nilai/{{$siswa->nis}}" method="post">
      <div class="form-group">
        <label for="siswa_nis">NIS</label>
        <input type="text" name="siswa_nis" id="siswa_nis" class="form-control" placeholder="NIS"
          aria-describedby="helpId" value="{{$siswa->nis}}" readonly>
        <small id="helpId" class="text-muted">NIS Siswa</small>
      </div>
      @csrf
      <div class="form-group">
        <label for="mapel">Mapel</label>
        <select name="mapel_id" id="mapel_id" class="form-control">
          <option value="">Pilih Salah Satu</option>
        </select>
        <small id="helpId" class="text-muted">Help text</small>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="pengetahuan">Pengetahuan</label>
            <input type="number" name="pengetahuan" id="pengetahuan" class="form-control" placeholder="Pengetahuan"
              aria-describedby="helpId">
            <small id="helpId" class="text-muted">Nilai Pengetahuan</small>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="keterampilan">Keterampilan</label>
            <input type="number" name="keterampilan" id="keterampilan" class="form-control" placeholder="Keterampilan"
              aria-describedby="helpId">
            <small id="helpId" class="text-muted">Nilai Keterampilan</small>
          </div>
        </div>
      </div>
      <input type="submit" class="btn btn-primary float-right">
    </form>
  </div>
</div>

<script>
  $(document).ready(function () {
    $.get('http://localhost/ci-sekolahapp/api/mapel', function (res) {
      listMapel = res.data;
      listMapel.forEach(mapel => {
        $('#mapel_id').append('<option value="' + mapel.id + '"> '+mapel.nama_mapel+' </option>');
      });
    })
  });
</script>

@endsection