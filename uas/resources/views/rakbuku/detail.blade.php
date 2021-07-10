{{-- mengambil template dengan nama v_template --}}
@extends('layout.v_template')

@section('content')
 <table class="table table-borderless">
   <tr>
     <th width="200px;">Nama Rak</th>
     <th width="30px;">:</th>
     <th>{{$detail->nama_rak}}</th>
   </tr>
   <tr>
     <th width="200px;">Lokasi</th>
     <th width="30px;">:</th>
     <th>{{$detail->lokasi_rak}}</th>
   </tr>
 </table>
 <tr>
   <th>
     <a href="/rakbuku" class="btn-sm btn-secondary float-right"> <i class="fas fa-long-arrow-alt-left"></i> Kembali</a>
   </th>
 </tr>
@endsection


{{-- untuk melempar data ke template v_template --}}
@section('title','Rak Buku')
@section('title_card','Detail Rak buku')
@section('breadcrumb','Detail rak buku')
@section('active','rakbuku')
