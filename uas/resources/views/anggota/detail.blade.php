{{-- mengambil template dengan nama v_template --}}
@extends('layout.v_template')

@section('content')
 <table class="table table-borderless">
   <tr>
     <th width="200px;">Kode Anggota</th>
     <th width="30px;">:</th>
     <th>{{$detail->kode_anggota}}</th>
   </tr>
   <tr>
     <th width="200px;">Nama Anggota</th>
     <th width="30px;">:</th>
     <th>{{$detail->nama_anggota}}</th>
   </tr>
   <tr>
     <th width="200px;">Jenis Kelamin</th>
     <th width="30px;">:</th>
     <th> <?php if ($detail->kode_anggota = 'L') {
       echo "Laki-Laki / <s>Perempuan</s>";
     }else {
       echo "<s>Laki-Laki</s> / Perempuan";
       // code...
     } ?></th>
   </tr>
   <tr>
     <th width="200px;">Jurusan</th>
     <th width="30px;">:</th>
     <th>{{$detail->jurusan_anggota}}</th>
   </tr>
   <tr>
     <th width="200px;">Nomor Telphon</th>
     <th width="30px;">:</th>
     <th>{{$detail->no_telp_anggota}}</th>
   </tr>
   <tr>
     <th width="200px;">Alamat</th>
     <th width="30px;">:</th>
     <th>{{$detail->alamat_anggota}}</th>
   </tr>
 </table>
 <tr>
   <th>
     <a href="/anggota" class="btn-sm btn-secondary float-right"> <i class="fas fa-long-arrow-alt-left"></i> Kembali</a>
   </th>
 </tr>
@endsection


{{-- untuk melempar data ke template v_template --}}
@section('title','Anggota')
@section('title_card','Detail Anggota')
@section('breadcrumb','Detail Anggota')
@section('active','anggota')
