{{-- mengambil template dengan nama v_template --}}
@extends('layout.v_template')

@section('content')
 <table class="table table-borderless">
   <tr>
     <th width="200px;">Kode Buku</th>
     <th width="30px;">:</th>
     <th>{{$detail->kode_buku}}</th>
   </tr>
   <tr>
     <th width="200px;">Rak Buku</th>
     <th width="30px;">:</th>
     <th>{{$detail->nama_rak}}</th>
   </tr>
   <tr>
     <th width="200px;">Judul Buku</th>
     <th width="30px;">:</th>
     <th>{{$detail->judul_buku}}</th>
   </tr>
   <tr>
     <th width="200px;">Penulis Buku</th>
     <th width="30px;">:</th>
     <th>{{$detail->penulis_buku}}</th>
   </tr>
   <tr>
     <th width="200px;">Penerbit Buku</th>
     <th width="30px;">:</th>
     <th>{{$detail->penerbit_buku}}</th>
   </tr>
   <tr>
     <th width="200px;">Tahun Terbitan</th>
     <th width="30px;">:</th>
     <th>{{$detail->tahun_penerbit}}</th>
   </tr>
   <tr>
     <th width="200px;">Jumlah Buku</th>
     <th width="30px;">:</th>
     <th>{{$detail->jml_buku}}</th>
   </tr>
   <tr>
     <th width="200px;">Cover Buku</th>
     <th width="30px;">:</th>
     <th><img src="{{ url('foto_buku/'.$detail->gambar_buku)}}" width="300" alt="{{$detail->gambar_buku}}"></th>
   </tr>
 </table>
 <tr>
   <th>
     <a href="/buku" class="btn-sm btn-secondary float-right"> <i class="fas fa-long-arrow-alt-left"></i> Kembali</a>
   </th>
 </tr>
@endsection


{{-- untuk melempar data ke template v_template --}}
@section('title','Buku')
@section('title_card','Detail Buku')
@section('breadcrumb','Detail Buku')
@section('active','buku')
