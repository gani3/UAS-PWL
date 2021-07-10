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
    <a href="/pengembalian/pdf" target="_blank" class="btn btn-sm btn-primary float-right ml-2"> <i class="fa fa-file-pdf"></i> PDF</a>
    <a href="/pengembalian/excel" target="_blank" class="btn btn-sm btn-info float-right ml-2"><i class="fa fa-file-excel"></i> Excel</a>
    <a href="/pengembalian/tambah" class="btn btn-sm btn-success float-right"> Tambah Data</a>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Pengembalian</th>
        <th>Nama Petugas</th>
        <th>Judul Buku</th>
        <th>Tanggal Pengembalian</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      @foreach ($pengembalian as $pengembalian)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$pengembalian->nama_anggota}}</td>
          <td>{{$pengembalian->nama_pegawai}}</td>
          <td>{{$pengembalian->judul_buku}}</td>
          <td>{{date('d/F/Y', strtotime($pengembalian->tanggal_pengembalian))}}</td>
          <td>
            <a href="/pengembalian/detail/{{$pengembalian->id_pengembalian}}" class="btn btn-sm btn-success"> <i class="fas fa-eye"></i> </a>
            <a href="/pengembalian/edit/{{$pengembalian->id_pengembalian}}" class="btn btn-sm btn-info"> <i class="fas fa-edit"></i> </a>
            <a href="/pengembalian/hapus/{{$pengembalian->id_pengembalian}}" class="btn btn-sm btn-danger" onclick="return confirm('Data akan dihapus, Anda yakin ?')" > <i class="fas fa-trash"></i> </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection


{{-- untuk melempar data ke template v_template --}}
@section('title','Pengembalian')
@section('title_card','Daftar Pengembalian')
@section('breadcrumb','Daftar Pengembalian')
@section('active','pengembalian')
