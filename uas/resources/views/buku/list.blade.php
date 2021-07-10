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
    <a href="/buku/tambah" class="btn btn-sm btn-success float-right"> Tambah Data</a>
    <thead>
      <tr>
        <th>No</th>
        <th>Kode Buku</th>
        <th>Judul Buku</th>
        <th>Nama Rak</th>
        <th>Cover Buku</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      @foreach ($buku as $buku)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$buku->kode_buku}}</td>
          <td>{{$buku->judul_buku}}</td>
          <td>{{$buku->nama_rak}}</td>
          <td> <img src="{{ url('foto_buku/'.$buku->gambar_buku)}}" width="120" alt="{{$buku->gambar_buku}}"></td>
          <td>
            <a href="/buku/detail/{{$buku->id_buku}}" class="btn btn-sm btn-success"> <i class="fas fa-eye"></i> </a>
            <a href="/buku/edit/{{$buku->id_buku}}" class="btn btn-sm btn-info"> <i class="fas fa-edit"></i> </a>
            <a href="/buku/hapus/{{$buku->id_buku}}" class="btn btn-sm btn-danger" onclick="return confirm('Data akan dihapus, Anda yakin ?')" > <i class="fas fa-trash"></i> </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection


{{-- untuk melempar data ke template v_template --}}
@section('title','Buku')
@section('title_card','Daftar Buku')
@section('breadcrumb','Daftar Buku')
@section('active','buku')
