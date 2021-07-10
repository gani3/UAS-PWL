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
    <a href="/rakbuku/tambah" class="btn btn-sm btn-success float-right"> Tambah Data</a>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Rak Buku</th>
        <th>Lokasi Rak</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      @foreach ($rakbuku as $rakbuku)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$rakbuku->nama_rak}}</td>
          <td>{{$rakbuku->lokasi_rak}}</td>
          <td>
            <a href="/rakbuku/detail/{{$rakbuku->id_rak_buku}}" class="btn btn-sm btn-success"> <i class="fas fa-eye"></i> </a>
            <a href="/rakbuku/edit/{{$rakbuku->id_rak_buku}}" class="btn btn-sm btn-info"> <i class="fas fa-edit"></i> </a>
            <a href="/rakbuku/hapus/{{$rakbuku->id_rak_buku}}" class="btn btn-sm btn-danger" onclick="return confirm('Data akan dihapus, Anda yakin ?')" > <i class="fas fa-trash"></i> </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection


{{-- untuk melempar data ke template v_template --}}
@section('title','Rak Buku')
@section('title_card','Daftar Rak buku')
@section('breadcrumb','Daftar rak buku')
@section('active','rakbuku')
