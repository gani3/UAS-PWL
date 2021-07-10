<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AnggotaModel extends Model
{
  public function list()
  {
    return DB::table('anggota')->get();
  }

  public function detail($id)
  {
    return DB::table('anggota')->where('id_anggota', $id)->first();
  }

  public function insert($data)
  {
    DB::table('anggota')->insert($data);
  }

  public function insertanggota($dataanggota)
  {
    DB::table('users')->insert($dataanggota);
  }

  public function updatedata($id, $data)
  {
    DB::table('anggota')->where('id_anggota', $id)->update($data);
  }

  public function hapus($id)
  {
    DB::table('anggota')->where('id_anggota', $id)->delete();
  }

  public function hapuslogin($id)
  {
    DB::table('users')->where('id', $id)->delete();
  }

  //untuk halaman dashboard
  public function total()
  {
    return DB::table('anggota')->count();
  }

}
