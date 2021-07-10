<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      header('Content-Type: application/vnd-ms-excel');
      header('Content-Disposition: attachment; filename = Data Pengembalian Buku.xls');
     ?>
     <h3 style="text-align:center">Data Pengembalian Buku</h3>
    <table border="1" width="700">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Pengembalian</th>
          <th>Nama Petugas</th>
          <th>Judul Buku</th>
          <th>Tanggal Pengembalian</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        @foreach ($pengembalian as $pengembalian)
          <tr>
            <td style="text-align:center;">{{$no++}}</td>
            <td style="text-align:center;">{{$pengembalian->nama_anggota}}</td>
            <td style="text-align:center;">{{$pengembalian->nama_pegawai}}</td>
            <td style="text-align:center;">{{$pengembalian->judul_buku}}</td>
            <td style="text-align:center;">{{date('d/F/Y', strtotime($pengembalian->tanggal_pengembalian))}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>
