<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BukuModel extends Model
{
  public function list()
  {
    return DB::table('buku')
            ->join('rak_buku', 'rak_buku.id_rak_buku', '=', 'buku.id_rak_buku')
            ->select('buku.*', 'rak_buku.*')
            ->get();
  }

  public function detail($id)
  {
    return DB::table('buku')->join('rak_buku', 'rak_buku.id_rak_buku', '=', 'buku.id_rak_buku')->select('buku.*', 'rak_buku.*')->where('id_buku', $id)->first();
  }

  public function insert($data)
  {
    DB::table('buku')->insert($data);
  }

  public function updatedata($id, $data)
  {
    DB::table('buku')->where('id_buku', $id)->update($data);
  }

  public function hapus($id)
  {
    DB::table('buku')->where('id_buku', $id)->delete();
  }

  //untuk halaman dashboard
  public function total()
  {
    return DB::table('buku')->count();
  }

}
