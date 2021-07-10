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
          <th>Nama Peminjaman</th>
          <th>Nama Petugas</th>
          <th>Judul Buku</th>
          <th>Tanggal Pinjam</th>
          <th>Tanggal Kembali</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        @foreach ($peminjaman as $peminjaman)
          <tr>
            <td style="text-align:center;">{{$no++}}</td>
            <td style="text-align:center;">{{$peminjaman->nama_anggota}}</td>
            <td style="text-align:center;">{{$peminjaman->nama_pegawai}}</td>
            <td style="text-align:center;">{{$peminjaman->judul_buku}}</td>
            <td style="text-align:center;">{{date('d/F/Y', strtotime($peminjaman->tanggal_pinjam))}}</td>
            <td style="text-align:center;">{{date('d/F/Y', strtotime($peminjaman->tanggal_kembali))}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>
