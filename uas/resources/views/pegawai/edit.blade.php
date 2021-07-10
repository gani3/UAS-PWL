{{-- mengambil template dengan nama v_template --}}
@extends('layout.v_template')

@section('content')
  <form class="" action="/pegawai/update/{{$detail->id_pegawai}}" method="post" enctype="multipart/form-data">
    {{-- @csrf berfungsi agar data yang dikirim tidak expired --}}
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Anggota</label>
        <div class="col-sm-10">
          <input type="text" name="nama_pegawai" value="{{ $detail->nama_pegawai }}" class="form-control  @error('nama_pegawai') is-invalid @enderror" placeholder="Nama Anggota">
            <div class="text-danger">
              @error('nama_pegawai')
                {{$message}}
              @enderror
            </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Jabatan</label>
        <div class="col-sm-10">
          <input type="text" name="jabatan_pegawai"  value="{{$detail->jabatan_pegawai}}" class="form-control @error('jabatan_pegawai') is-invalid @enderror " placeholder="Jabatan Pegawai ">
            <div class="text-danger">
              @error('no_telp_pegawai')
                {{$message}}
              @enderror
            </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Nomor Telpon</label>
        <div class="col-sm-10">
          <input type="text" name="no_telp_pegawai"  value="{{$detail->no_telp_pegawai}}" class="form-control @error('no_telp_pegawai') is-invalid @enderror " placeholder="Nomor Telpon" maxlength="12">
            <div class="text-danger">
              @error('no_telp_pegawai')
                {{$message}}
              @enderror
            </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
          <textarea name="alamat_pegawai" rows="8" value="" class="form-control @error('alamat_pegawai') is-invalid @enderror" cols="80">{{$detail->alamat_pegawai}}</textarea>
            <div class="text-danger">
              @error('alamat_pegawai')
                {{$message}}
              @enderror
            </div>
        </div>
      </div>
<br>
      <hr>
      <h4>Akun Login</h4>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <input type="text" name="username" value="{{$detail->username}}" class="form-control @error('username') is-invalid @enderror" placeholder="Username" readonly>
            <div class="text-danger">
              @error('username')
                {{$message}}
              @enderror
            </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" name="password" value="{{$detail->password}}" class="form-control @error('password') is-invalid @enderror" placeholder="Password" readonly>
            <div class="text-danger">
              @error('password')
                {{$message}}
              @enderror
            </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <button type="submit" class="btn-sm btn-info">Update</button>
    <a href="/pegawai" class="btn-sm btn-default float-right">Cancel</a>
  </form>
@endsection


{{-- untuk melempar data ke template v_template --}}
@section('title','Anggota')
@section('title_card','Edit Anggota')
@section('breadcrumb','Edit Anggota')
@section('active','pegawai')