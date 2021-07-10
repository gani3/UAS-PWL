@include('layoutuser.v_head')
@include('layoutuser.v_nav')

<h5 class="text-left text-black mb-5 mt-3"align ="center">Form Registrasi User</h5>
  <h3 class="text-center text-white pt-5">Login forms</h3>
  <div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
      <div id="login-column" class="col-md-12">
        <form class="" action="/insert" method="post" enctype="multipart/form-data">
          {{-- @csrf berfungsi agar data yang dikirim tidak expired --}}
          @csrf
          <div class="card-body">
            <div class="form-group row mb-3">
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
            <div class="form-group row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Anggota</label>
              <div class="col-sm-10">
                <input type="text" name="nama_anggota" value="{{old('nama_anggota')}}" class="form-control  @error('nama_anggota') is-invalid @enderror" placeholder="Nama Anggota">
                  <div class="text-danger">
                    @error('nama_anggota')
                      {{$message}}
                    @enderror
                  </div>
              </div>
            </div>
            <div class="form-group row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                <select class="form-control select2bs4" style="width: 100%;" name="jk_anggota">
                 <option value="L">Laki-Laki</option>
                 <option value="P">Perempuan</option>
               </select>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Jurusan</label>
              <div class="col-sm-10">
                <select class="form-control select2bs4" style="width: 100%;" name="jurusan_anggota">
                 <option value="Teknik Informatika">Teknik Informatika</option>
                 <option value="Sistem Informatika">Sistem Informatika</option>
               </select>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Nomor Telpon</label>
              <div class="col-sm-10">
                <input type="text" name="no_telp_anggota"  value="{{old('no_telp_anggota')}}" class="form-control @error('no_telp_anggota') is-invalid @enderror " placeholder="Nomor Telpon" maxlength="12">
                  <div class="text-danger">
                    @error('no_telp_anggota')
                      {{$message}}
                    @enderror
                  </div>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <textarea name="alamat_anggota" rows="8" value="{{old('alamat_anggota')}}" class="form-control @error('alamat_anggota') is-invalid @enderror" cols="80"></textarea>
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

            <div class="form-group row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" name="username" value="{{old('username')}}" class="form-control @error('username') is-invalid @enderror" placeholder="Username">
                  <div class="text-danger">
                    @error('username')
                      {{$message}}
                    @enderror
                  </div>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="text" name="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror" placeholder="Password" >
                  <div class="text-danger">
                    @error('password')
                      {{$message}}
                    @enderror
                  </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <button type="submit" class="btn-sm btn-info" style="color:white;float:right;">Register</button>
        </form>
        <br><br>
      </div>
    </div>
  </div>
@include('layoutuser.v_footer')
