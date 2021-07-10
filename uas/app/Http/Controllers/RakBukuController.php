<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RakBukuModel;

class RakBukuController extends Controller
{
   public function __construct(Type $foo = null)
   {
     $this->middleware('auth');
     $this->RakBukuModel = new RakBukuModel();
   }
    public function index()
    {
      $data = [
        'rakbuku' => $this->RakBukuModel->list(),
      ];
      return view('rakbuku.list', $data);
    }

    public function tambah()
    {
      return view('rakbuku.tambah');
    }

    public function insert()
    {
      // proses validasi data
      Request()->validate([
        'nama_rak' => 'required',
        'lokasi_rak' => 'required',
      ],[
        'nama_rak.required'  => 'wajib diisi !!!',
        'lokasi_rak.required'  => 'wajib diisi !!!',
      ]);

      // proses simpan data ke database

      $data = [
          'nama_rak' => Request()->nama_rak,
          'lokasi_rak' => Request()->lokasi_rak,
      ];

      $this->RakBukuModel->insert($data);
      return redirect()->route('rakbuku')->with('pesan', 'Data berhasil ditambahkan');

    }

    public function detail($id)
    {
      if (!$this->RakBukuModel->detail($id)) {
        abort(404);
      }else {
        $data = [
          'detail' => $this->RakBukuModel->detail($id),
        ];
      }

      return view('rakbuku.detail', $data);
    }

    public function edit($id)
    {
      if (!$this->RakBukuModel->detail($id)) {
        abort(404);
      }else {
        $data = [
          'detail' => $this->RakBukuModel->detail($id),
        ];
      }
      return view('rakbuku.edit',$data);
    }

    public function update($id)
    {
      // proses validasi data
      Request()->validate([
        'nama_rak' => 'required',
        'lokasi_rak' => 'required',
      ],[
        'nama_rak.required'  => 'wajib diisi !!!',
        'lokasi_rak.required'  => 'wajib diisi !!!',
      ]);

      // proses simpan data ke database

      $data = [
          'nama_rak' => Request()->nama_rak,
          'lokasi_rak' => Request()->lokasi_rak,
      ];

      $this->RakBukuModel->updatedata($id, $data);
      return redirect()->route('rakbuku')->with('pesan', 'Data berhasil diupdate');
    }

    public function hapus($id)
    {
      $this->RakBukuModel->hapus($id);
      return redirect()->route('rakbuku')->with('pesan','Data berhasil dihapus');
    }
}
