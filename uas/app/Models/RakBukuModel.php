<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RakBukuModel extends Model
{
  public function list()
  {
    return DB::table('rak_buku')->get();
  }

  public function detail($id)
  {
    return DB::table('rak_buku')->where('id_rak_buku', $id)->first();
  }

  public function insert($data)
  {
    DB::table('rak_buku')->insert($data);
  }

  public function updatedata($id, $data)
  {
    DB::table('rak_buku')->where('id_rak_buku', $id)->update($data);
  }

  public function hapus($id)
  {
    DB::table('rak_buku')->where('id_rak_buku', $id)->delete();
  }

}
