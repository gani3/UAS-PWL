{{-- mengambil template dengan nama v_template --}}
@extends('layout.v_template')

@section('content')
 <table class="table table-borderless">
   <tr>
     <th width="200px;">Nama Pegawai</th>
     <th width="30px;">:</th>
     <th>{{$detail->nama_pegawai}}</th>
   </tr>
   <tr>
     <th width="200px;">Jabatan</th>
     <th width="30px;">:</th>
     <th>{{$detail->jabatan_pegawai}}</th>
   </tr>
   <tr>
     <th width="200px;">Nomor Telphon</th>
     <th width="30px;">:</th>
     <th>{{$detail->no_telp_pegawai}}</th>
   </tr>
   <tr>
     <th width="200px;">Alamat</th>
     <th width="30px;">:</th>
     <th>{{$detail->alamat_pegawai}}</th>
   </tr>
 </table>
 <tr>
   <th>
     <a href="/pegawai" class="btn-sm btn-secondary float-right"> <i class="fas fa-long-arrow-alt-left"></i> Kembali</a>
   </th>
 </tr>
@endsection


{{-- untuk melempar data ke template v_template --}}
@section('title','Pegawai')
@section('title_card','Detail Pegawai')
@section('breadcrumb','Detail Pegawai')
@section('active','pegawai')
