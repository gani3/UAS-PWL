{{-- mengambil template dengan nama v_template --}}
@extends('layout.v_template')

@section('content')
 <table class="table table-borderless">
   <tr>
     <th width="200px;">Nama Peminjam</th>
     <th width="30px;">:</th>
     <th>{{$detail->nama_anggota}}</th>
   </tr>
   <tr>
     <th width="200px;">Petugas</th>
     <th width="30px;">:</th>
     <th>{{$detail->nama_pegawai}}</th>
   </tr>
   <tr>
     <th width="200px;">Judul Buku</th>
     <th width="30px;">:</th>
     <th>{{$detail->judul_buku}}</th>
   </tr>
   <tr>
     <th width="200px;">Tanggal Peminjaman</th>
     <th width="30px;">:</th>
     <th>{{$detail->tanggal_pinjam}}</th>
   </tr>
   <tr>
     <th width="200px;">Tanggal Pengembalian</th>
     <th width="30px;">:</th>
     <th>{{$detail->tanggal_kembali}}</th>
   </tr>
 </table>
 <tr>
   <th>
     <a href="/peminjaman" class="btn-sm btn-secondary float-right"> <i class="fas fa-long-arrow-alt-left"></i> Kembali</a>
   </th>
 </tr>
@endsection


{{-- untuk melempar data ke template v_template --}}
@section('title','Peminjaman')
@section('title_card','Detail Peminjaman')
@section('breadcrumb','Detail Peminjaman')
@section('active','peminjaman')
