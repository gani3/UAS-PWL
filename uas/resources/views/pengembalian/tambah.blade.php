{{-- mengambil template dengan nama v_template --}}
@extends('layout.v_template')

@section('content')
  <form class="" action="/pengembalian/insert" method="post" enctype="multipart/form-data">
    {{-- @csrf berfungsi agar data yang dikirim tidak expired --}}
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Peminjam</label>
        <div class="col-sm-10">
          <select class="form-control select2bs4" style="width: 100%;" name="id_anggota">
           @foreach ($anggota as $anggota)
             <option value='{{$anggota->id_anggota}}'>{{$anggota->nama_anggota}}</option>
           @endforeach
         </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Petugas</label>
        <div class="col-sm-10">
          <select class="form-control select2bs4" style="width: 100%;" name="id_pegawai">
           @foreach ($pegawai as $pegawai)
             <option value='{{$pegawai->id_pegawai}}'>{{$pegawai->nama_pegawai}}</option>
           @endforeach
         </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Buku</label>
        <div class="col-sm-10">
          <select class="form-control select2bs4" style="width: 100%;" name="id_buku">
           @foreach ($buku as $buku)
             <option value='{{$buku->id_buku}}'>{{$buku->judul_buku}}</option>
           @endforeach
         </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
        <div class="col-sm-10">
          <input type="date" name="tanggal_pengembalian" value="{{old('tanggal_pengembalian')}}" class="form-control  @error('tanggal_pengembalian') is-invalid @enderror" placeholder="Tanggal Pengembalian">
            <div class="text-danger">
              @error('tanggal_pengembalian')
                {{$message}}
              @enderror
            </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Komentar</label>
        <div class="col-sm-10">
          <textarea name="komentar" rows="8"  class="form-control @error('komentar') is-invalid @enderror" cols="80">{{old('komentar')}}</textarea>
            <div class="text-danger">
              @error('alamat_anggota')
                {{$message}}
              @enderror
            </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <button type="submit" class="btn-sm btn-info">Tambahkan</button>
    <a href="/pengembalian" class="btn-sm btn-default float-right">Cancel</a>
  </form>
@endsection

{{-- untuk melempar data ke template v_template --}}
@section('title','Pengembalian')
@section('title_card','Daftar Pengembalian')
@section('breadcrumb','Daftar Pengembalian')
@section('active','pengembalian')
