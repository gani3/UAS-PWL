<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PengembalianModel extends Model
{
  public function list()
  {
    return DB::table('pengembalian')
            ->join('buku', 'buku.id_buku', '=', 'pengembalian.id_buku')
            ->join('anggota', 'anggota.id_anggota', '=', 'pengembalian.id_anggota')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'pengembalian.id_pegawai')
            ->select('pengembalian.*', 'buku.judul_buku','anggota.nama_anggota','pegawai.nama_pegawai')
            ->get();
  }

  public function detail($id)
  {
    return DB::table('pengembalian')
            ->join('buku', 'buku.id_buku', '=', 'pengembalian.id_buku')
            ->join('anggota', 'anggota.id_anggota', '=', 'pengembalian.id_anggota')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'pengembalian.id_pegawai')
            ->select('pengembalian.*', 'buku.judul_buku','anggota.nama_anggota','pegawai.nama_pegawai')
            ->where('id_pengembalian', $id)->first();
  }

  public function insert($data)
  {
    DB::table('pengembalian')->insert($data);
  }

  public function updatedata($id, $data)
  {
    DB::table('pengembalian')->where('id_pengembalian', $id)->update($data);
  }

  public function hapus($id)
  {
    DB::table('pengembalian')->where('id_pengembalian', $id)->delete();
  }

}
