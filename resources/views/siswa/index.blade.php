@extends('templates.master')

@section('title', 'Data Siswa')

@section('content')

<div class="card">
  <div class="card-body p-0">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Tahun Ajar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($siswa as $index => $item)
        <tr>
          <td>{{$index + 1}}</td>
          <td>{{$item->nis}}</td>
          <td>{{$item->nama}}</td>
          <td>{{$item->tahun_ajar}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection