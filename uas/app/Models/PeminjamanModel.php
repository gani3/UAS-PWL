<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PeminjamanModel extends Model
{
  public function list()
  {
    return DB::table('peminjaman')
            ->join('buku', 'buku.id_buku', '=', 'peminjaman.id_buku')
            ->join('anggota', 'anggota.id_anggota', '=', 'peminjaman.id_anggota')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'peminjaman.id_pegawai')
            ->select('peminjaman.*', 'buku.judul_buku','anggota.nama_anggota','pegawai.nama_pegawai')
            ->get();
  }

  public function detail($id)
  {
    return DB::table('peminjaman')
            ->join('buku', 'buku.id_buku', '=', 'peminjaman.id_buku')
            ->join('anggota', 'anggota.id_anggota', '=', 'peminjaman.id_anggota')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'peminjaman.id_pegawai')
            ->select('peminjaman.*', 'buku.judul_buku','anggota.nama_anggota','pegawai.nama_pegawai')
            ->where('id_peminjaman', $id)->first();
  }

  public function insert($data)
  {
    DB::table('peminjaman')->insert($data);
  }

  public function updatedata($id, $data)
  {
    DB::table('peminjaman')->where('id_peminjaman', $id)->update($data);
  }

  public function hapus($id)
  {
    DB::table('peminjaman')->where('id_peminjaman', $id)->delete();
  }

}
