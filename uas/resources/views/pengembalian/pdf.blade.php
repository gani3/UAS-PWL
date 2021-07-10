<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
     <h3 style="text-align:center">Data Peminjaman Buku</h3>
    <table border="1" width="700">
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
        @foreach ($pengembalian as $pengembalian)
          <tr>
            <td>{{$no++}}</td>
            <td>{{$pengembalian->nama_anggota}}</td>
            <td>{{$pengembalian->nama_pegawai}}</td>
            <td>{{$pengembalian->judul_buku}}</td>
            <td>{{date('d/F/Y', strtotime($pengembalian->tanggal_pengembalian))}}</td>
            <td>
              <a href="/pengembalian/detail/{{$pengembalian->id_pengembalian}}" class="btn btn-sm btn-success"> <i class="fas fa-eye"></i> </a>
              <a href="/pengembalian/edit/{{$pengembalian->id_pengembalian}}" class="btn btn-sm btn-info"> <i class="fas fa-edit"></i> </a>
              <a href="/pengembalian/hapus/{{$pengembalian->id_pengembalian}}" class="btn btn-sm btn-danger" onclick="return confirm('Data akan dihapus, Anda yakin ?')" > <i class="fas fa-trash"></i> </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>
