{{-- mengambil template dengan nama v_template --}}
@extends('layout.v_template')

@section('content')
  <form class="" action="/buku/update/{{$detail->id_buku}}" method="post" enctype="multipart/form-data">
    {{-- @csrf berfungsi agar data yang dikirim tidak expired --}}
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Buku</label>
        <div class="col-sm-10">
          <input type="text" name="kode_buku" class="form-control @error('kode_buku') is-invalid @enderror"  placeholder="Kode Buku" value="{{$detail->kode_buku}}" readonly>
            <div class="text-danger">
              @error('kode_buku')
                {{$message}}
              @enderror
            </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Judul Buku</label>
        <div class="col-sm-10">
          <input type="text" name="judul_buku" value="{{$detail->judul_buku}}" class="form-control  @error('judul_buku') is-invalid @enderror" placeholder="Nama Buku">
            <div class="text-danger">
              @error('judul_buku')
                {{$message}}
              @enderror
            </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Penulis Buku</label>
        <div class="col-sm-10">
          <input type="text" name="penulis_buku" value="{{$detail->penulis_buku}}" class="form-control  @error('penulis_buku') is-invalid @enderror" placeholder="Penulis Buku">
            <div class="text-danger">
              @error('penulis_buku')
                {{$message}}
              @enderror
            </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Penerbit Buku</label>
        <div class="col-sm-10">
          <input type="text" name="penerbit_buku" value="{{$detail->penerbit_buku}}" class="form-control  @error('penerbit_buku') is-invalid @enderror" placeholder="Penulis Buku">
            <div class="text-danger">
              @error('penerbit_buku')
                {{$message}}
              @enderror
            </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Tahun Terbit</label>
        <div class="col-sm-10">
            <select class="form-control select2bs4" style="width: 100%;" name="tahun_penerbit">
              <option value="{{$detail->tahun_penerbit}}">{{$detail->tahun_penerbit}}</option>
              @for ($i=1700; $i <= date('Y') ; $i++)
                <option value='{{$i}}'>{{$i}}</option>
              @endfor
           </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Rak Buku</label>
        <div class="col-sm-10">
          <select class="form-control select2bs4" style="width: 100%;" name="id_rak_buku">
            <option value="{{$detail->id_rak_buku}}">{{$detail->nama_rak}}</option>
           @foreach ($rak as $rak)
             <option value='{{$rak->id_rak_buku}}'>{{$rak->nama_rak}}</option>
           @endforeach
         </select>
        </div>
      </div>


      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Cover Buku</label>
        <div class="col-sm-4">
          <img src="{{ url('foto_buku/'.$detail->gambar_buku)}}" width="300" alt="{{$detail->gambar_buku}}">
        </div>
        <div class="col-sm-5">
          <input type="file" name="gambar_buku" value="" class="form-control  @error('gambar_buku') is-invalid @enderror">
          <div class="text-danger">
            @error('gambar_buku')
              {{$message}}
            @enderror
          </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Buku</label>
        <div class="col-sm-10">
          <input type="text" name="jml_buku" value="{{$detail->jml_buku}}" class="form-control  @error('jml_buku') is-invalid @enderror" placeholder="Jumlah Buku">
            <div class="text-danger">
              @error('jml_buku')
                {{$message}}
              @enderror
            </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <button type="submit" class="btn-sm btn-info">Update</button>
    <a href="/buku" class="btn-sm btn-default float-right">Cancel</a>
  </form>
@endsection


{{-- untuk melempar data ke template v_template --}}
@section('title','Buku')
@section('title_card','Edit Buku')
@section('breadcrumb','Edit Buku')
@section('active','buku')
