<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PegawaiModel extends Model
{
  public function list()
  {
    return DB::table('pegawai')->get();
  }

  public function detail($id)
  {
    return DB::table('pegawai')->where('id_pegawai', $id)->first();
  }

  public function insert($data)
  {
    DB::table('pegawai')->insert($data);
  }

  public function insertadmin($dataloginadmin)
  {
    DB::table('users')->insert($dataloginadmin);
  }

  public function updatedata($id, $data)
  {
    DB::table('pegawai')->where('id_pegawai', $id)->update($data);
  }

  public function hapus($id)
  {
    DB::table('pegawai')->where('id_pegawai', $id)->delete();
  }

  public function hapuslogin($id)
  {
    DB::table('users')->where('id', $id)->delete();
  }

  //untuk halaman dashboard
  public function total()
  {
    return DB::table('pegawai')->count();
  }

}
