{{-- mengambil template dengan nama v_template --}}
@extends('layout.v_template')

@section('content')
  <form class="" action="/rakbuku/insert" method="post" enctype="multipart/form-data">
    {{-- @csrf berfungsi agar data yang dikirim tidak expired --}}
    @csrf
    <div class="card-body">

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Rak Buku</label>
        <div class="col-sm-10">
          <input type="text" name="nama_rak"  value="{{old('nama_rak')}}" class="form-control @error('nama_rak') is-invalid @enderror " placeholder="Nama Rak Buku">
            <div class="text-danger">
              @error('nama_rak')
                {{$message}}
              @enderror
            </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Lokasi Rak</label>
        <div class="col-sm-10">
          <input type="text" name="lokasi_rak"  value="{{old('lokasi_rak')}}" class="form-control @error('lokasi_rak') is-invalid @enderror " placeholder="Lokasi Rak" >
            <div class="text-danger">
              @error('lokasi_rak')
                {{$message}}
              @enderror
            </div>
        </div>
      </div>

    </div>
    <!-- /.card-body -->
    <button type="submit" class="btn-sm btn-info">Tambahkan</button>
    <a href="/rakbuku" class="btn-sm btn-default float-right">Cancel</a>
  </form>
@endsection


{{-- untuk melempar data ke template v_template --}}
@section('title','Rak Buku')
@section('title_card','Tambah Rak buku')
@section('breadcrumb','Tambah rak buku')
@section('active','rakbuku')
