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
    <a href="/pegawai/tambah" class="btn btn-sm btn-success float-right"> Tambah Data</a>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama pegawai</th>
        <th>Jabatan</th>
        <th>Alamat</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      @foreach ($pegawai as $pegawai)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$pegawai->nama_pegawai}}</td>
          <td>{{$pegawai->jabatan_pegawai}}</td>
          <td>{{$pegawai->alamat_pegawai}}</td>
          <td>
            <a href="/pegawai/detail/{{$pegawai->id_pegawai}}" class="btn btn-sm btn-success"> <i class="fas fa-eye"></i> </a>
            <a href="/pegawai/edit/{{$pegawai->id_pegawai}}" class="btn btn-sm btn-info"> <i class="fas fa-edit"></i> </a>
            <a href="/pegawai/hapus/{{$pegawai->id_pegawai}}" class="btn btn-sm btn-danger" onclick="return confirm('Data akan dihapus, Anda yakin ?')" > <i class="fas fa-trash"></i> </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection


{{-- untuk melempar data ke template v_template --}}
@section('title','pegawai')
@section('title_card','Daftar pegawai')
@section('breadcrumb','Daftar pegawai')
@section('active','pegawai')
