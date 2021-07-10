@include('layout.v_head')
<!-- Site wrapper -->
@include('layout.v_header')

@include('layout.v_sidebar')
<h4>Dashboard</h4>
<br>
<div class="row">
  <div class="col-12 col-sm-6 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Total Buku</span>
        <span class="info-box-number">
          {{$totalbuku}}
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-4">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Total Anggota</span>
        <span class="info-box-number">{{$totalanggota}}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-4">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total Pegawai</span>
        <span class="info-box-number">{{$totalpegawai}}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

<!-- Default box -->
 <div class="card">
   <div class="card-header">
     <h3 class="card-title">Peminjaman</h3>

     <div class="card-tools">
       <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
         <i class="fas fa-minus"></i>
       </button>
       <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
         <i class="fas fa-times"></i>
       </button>
     </div>
   </div>
   <div class="card-body">
     <table id="example1" class="table table-bordered table-striped">
       <thead>
         <tr>
           <th>No</th>
           <th>Nama Peminjaman</th>
           <th>Nama Petugas</th>
           <th>Judul Buku</th>
           <th>Tanggal Pinjam</th>
           <th>Tanggal Kembali</th>
           <th>Action</th>
         </tr>
       </thead>
       <tbody>
         <?php $no = 1; ?>
         @foreach ($daftarpinjam as $daftarpinjam)
           <tr>
             <td>{{$no++}}</td>
             <td>{{$daftarpinjam->nama_anggota}}</td>
             <td>{{$daftarpinjam->nama_pegawai}}</td>
             <td>{{$daftarpinjam->judul_buku}}</td>
             <td>{{date('d/F/Y', strtotime($daftarpinjam->tanggal_pinjam))}}</td>
             <td>{{date('d/F/Y', strtotime($daftarpinjam->tanggal_kembali))}}</td>
             <td>
               <a href="/peminjaman/detail/{{$daftarpinjam->id_peminjaman}}" class="btn btn-sm btn-success"> <i class="fas fa-eye"></i> </a>
               <a href="/peminjaman/edit/{{$daftarpinjam->id_peminjaman}}" class="btn btn-sm btn-info"> <i class="fas fa-edit"></i> </a>
               <a href="/peminjaman/hapus/{{$daftarpinjam->id_peminjaman}}" class="btn btn-sm btn-danger" onclick="return confirm('Data akan dihapus, Anda yakin ?')" > <i class="fas fa-trash"></i> </a>
             </td>
           </tr>
         @endforeach
       </tbody>
     </table>
   </div>
   <!-- /.card-body -->
   <div class="card-footer">
     Footer
   </div>
   <!-- /.card-footer-->
 </div>
 <!-- /.card -->

 <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Pengembalian</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <table id="example3" class="table table-bordered table-striped">
        <a href="/pengembalian/tambah" class="btn btn-sm btn-success float-right"> Tambah Data</a>
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pengembalian</th>
            <th>Nama Petugas</th>
            <th>Judul Buku</th>
            <th>Tanggal Pengembalian</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          @foreach ($daftarkembali as $daftarkembali)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$daftarkembali->nama_anggota}}</td>
              <td>{{$daftarkembali->nama_pegawai}}</td>
              <td>{{$daftarkembali->judul_buku}}</td>
              <td>{{date('d/F/Y', strtotime($daftarkembali->tanggal_pengembalian))}}</td>
              <td>
                <a href="/pengembalian/detail/{{$daftarkembali->id_pengembalian}}" class="btn btn-sm btn-success"> <i class="fas fa-eye"></i> </a>
                <a href="/pengembalian/edit/{{$daftarkembali->id_pengembalian}}" class="btn btn-sm btn-info"> <i class="fas fa-edit"></i> </a>
                <a href="/pengembalian/hapus/{{$daftarkembali->id_pengembalian}}" class="btn btn-sm btn-danger" onclick="return confirm('Data akan dihapus, Anda yakin ?')" > <i class="fas fa-trash"></i> </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

@include('layout.v_footer')
