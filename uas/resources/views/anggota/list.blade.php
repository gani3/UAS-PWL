{{-- mengambil template dengan nama v_template --}}
@extends('layout.v_template')

@section('content')
  @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times</button>
      <h4> <i class="icon fa fa-check"> Success </i> </h4>
      {{session('pesan')}}
    </div>
  @endif
  <table id="example1" class="table table-bordered table-striped">
    <a href="/anggota/tambah" class="btn btn-sm btn-success float-right"> Tambah Data</a>
    <thead>
      <tr>
        <th>No</th>
        <th>Kode Anggota</th>
        <th>Nama Anggota</th>
        <th>Jurusan</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      @foreach ($anggota as $anggota)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$anggota->kode_anggota}}</td>
          <td>{{$anggota->nama_anggota}}</td>
          <td>{{$anggota->jurusan_anggota}}</td>
          <td>
            <a href="/anggota/detail/{{$anggota->id_anggota}}" class="btn btn-sm btn-success"> <i class="fas fa-eye"></i> </a>
            <a href="/anggota/edit/{{$anggota->id_anggota}}" class="btn btn-sm btn-info"> <i class="fas fa-edit"></i> </a>
            <a href="/anggota/hapus/{{$anggota->id_anggota}}" class="btn btn-sm btn-danger" onclick="return confirm('Data akan dihapus, Anda yakin ?')" > <i class="fas fa-trash"></i> </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection


{{-- untuk melempar data ke template v_template --}}
@section('title','Anggota')
@section('title_card','Daftar Anggota')
@section('breadcrumb','Daftar Anggota')
@section('active','anggota')
