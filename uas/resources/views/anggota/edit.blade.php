{{-- mengambil template dengan nama v_template --}}
@extends('layout.v_template')

@section('content')
  <form class="" action="/anggota/update/{{$detail->id_anggota}}" method="post" enctype="multipart/form-data">
    {{-- @csrf berfungsi agar data yang dikirim tidak expired --}}
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Anggota</label>
        <div class="col-sm-10">
          <input type="text" name="kode_anggota" class="form-control @error('kode_anggota') is-invalid @enderror"  placeholder="Kode Anggota" value="<?= rand(1,1000); ?>" readonly>
            <div class="text-danger">
              @error('kode_anggota')
                {{$message}}
              @enderror
            </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Anggota</label>
        <div class="col-sm-10">
          <input type="text" name="nama_anggota" value="{{ $detail->nama_anggota }}" class="form-control  @error('nama_anggota') is-invalid @enderror" placeholder="Nama Anggota">
            <div class="text-danger">
              @error('nama_anggota')
                {{$message}}
              @enderror
            </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-10">
          <select class="form-control select2bs4" style="width: 100%;" name="jk_anggota">
            <?php if ($detail->jk_anggota == 'L') {?>
              <option value="L">Laki-Laki</option>
              <option value="P">Perempuan</option>
            <?php }else {?>
              <option value="P">Perempuan</option>
              <option value="L">Laki-Laki</option>
            <?php } ?>

         </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Jurusan</label>
        <div class="col-sm-10">
          <select class="form-control select2bs4" style="width: 100%;" name="jurusan_anggota">
            <?php if ($detail->jk_anggota == 'Teknik Informatika') {?>
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Sistem Informatika">Sistem Informatika</option>
            <?php }else {?>
              <option value="Sistem Informatika">Sistem Informatika</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
            <?php } ?>

         </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Nomor Telpon</label>
        <div class="col-sm-10">
          <input type="text" name="no_telp_anggota"  value="{{$detail->no_telp_anggota}}" class="form-control @error('no_telp_anggota') is-invalid @enderror " placeholder="Nomor Telpon" maxlength="12">
            <div class="text-danger">
              @error('no_telp_anggota')
                {{$message}}
              @enderror
            </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
          <textarea name="alamat_anggota" rows="8" value="" class="form-control @error('alamat_anggota') is-invalid @enderror" cols="80">{{$detail->alamat_anggota}}</textarea>
            <div class="text-danger">
              @error('alamat_anggota')
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
    <a href="/anggota" class="btn-sm btn-default float-right">Cancel</a>
  </form>
@endsection


{{-- untuk melempar data ke template v_template --}}
@section('title','Anggota')
@section('title_card','Edit Anggota')
@section('breadcrumb','Edit Anggota')
@section('active','anggota')
