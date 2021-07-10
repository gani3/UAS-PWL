<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel;
use App\Models\AnggotaModel;
use App\Models\PegawaiModel;
use App\Models\PeminjamanModel;
use App\Models\PengembalianModel;

class DashboardController extends Controller
{
  public function __construct(Type $foo = null)
  {
    $this->middleware('auth');
    $this->PengembalianModel = new PengembalianModel();
    $this->PeminjamanModel = new PeminjamanModel();
    $this->BukuModel = new BukuModel();
    $this->AnggotaModel = new AnggotaModel();
    $this->PegawaiModel = new PegawaiModel();
  }

    public function index()
    {
      $data = [
        "totalbuku" => $this->BukuModel->total(),
        "totalanggota" => $this->AnggotaModel->total(),
        "totalpegawai" => $this->PegawaiModel->total(),
        "daftarpinjam" => $this->PeminjamanModel->list(),
        "daftarkembali" => $this->PengembalianModel->list()
      ];
      return view('dashboard', $data);
    }
}
