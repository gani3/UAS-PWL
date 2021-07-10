<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaModel;
use Hash;

class AnggotaController extends Controller
{
   public function __construct(Type $foo = null)
   {
     // $this->middleware('auth');
     $this->AnggotaModel = new AnggotaModel();
   }
    public function index()
    {
      $data = [
        'anggota' => $this->AnggotaModel->list(),
      ];
      return view('anggota.list', $data);
    }

    public function tambah()
    {
      return view('anggota.tambah');
    }

    public function insert()
    {
      // proses validasi data
      Request()->validate([
        'kode_anggota' => 'required|unique:anggota,kode_anggota|max:10',
        'nama_anggota' => 'required',
        'no_telp_anggota' => 'required',
        'alamat_anggota' => 'required',
        'jurusan_anggota' => 'required',
        'username' => 'required|unique:anggota,username|max:10',
        'password' => 'required'
      ],[
        'nama_anggota.required'  => 'wajib diisi !!!',
        'kode_anggota.unique'  => 'Kode ini sudah ada. silahkan refresh halaman',
        'no_telp_anggota.required'  => 'wajib diisi !!!',
        'alamat_anggota.required'  => 'wajib diisi !!!',
        'username.required'  => 'wajib diisi !!!',
        'username.unique'  => 'username sudah ada  !!!',
        'password.required'  => 'wajib diisi !!!',
        'username.max'  => 'Max 10 karakter !!!'
      ]);

      // proses simpan data ke database

      $data = [
          'kode_anggota' => Request()->kode_anggota,
          'nama_anggota' => Request()->nama_anggota,
          'no_telp_anggota' => Request()->no_telp_anggota,
          'jk_anggota' => Request()->jk_anggota,
          'jurusan_anggota' => Request()->jurusan_anggota,
          'alamat_anggota' => Request()->alamat_anggota,
          'jurusan_anggota' => Request()->jurusan_anggota,
          'username' => Request()->username,
          'status' => '0',
          'password' => Hash::make(Request()->password)
      ];

      $dataanggota =[
        'name' => Request()->kode_anggota,
        'username' => Request()->username,
        'level' => '0',
        'password' => Hash::make(Request()->password)
      ];

      $this->AnggotaModel->insertanggota($dataanggota);
      $this->AnggotaModel->insert($data);
      return redirect()->route('anggota')->with('pesan', 'Data berhasil ditambahkan');

    }

    public function detail($id)
    {
      if (!$this->AnggotaModel->detail($id)) {
        abort(404);
      }else {
        $data = [
          'detail' => $this->AnggotaModel->detail($id),
        ];
      }

      return view('anggota.detail', $data);
    }

    public function edit($id)
    {
      if (!$this->AnggotaModel->detail($id)) {
        abort(404);
      }else {
        $data = [
          'detail' => $this->AnggotaModel->detail($id),
        ];
      }
      return view('anggota.edit',$data);
    }

    public function update($id)
    {
      // proses validasi data
      Request()->validate([
        'nama_anggota' => 'required',
        'no_telp_anggota' => 'required',
        'alamat_anggota' => 'required',
      ],[
        'nama_anggota.required'  => 'wajib diisi !!!',
        'no_telp_anggota.required'  => 'wajib diisi !!!',
        'alamat_anggota.required'  => 'wajib diisi !!!',
      ]);

      $data = [
          'nama_anggota' => Request()->nama_anggota,
          'no_telp_anggota' => Request()->no_telp_anggota,
          'jk_anggota' => Request()->jk_anggota,
          'jurusan_anggota' => Request()->jurusan_anggota,
          'alamat_anggota' => Request()->alamat_anggota,
          'jurusan_anggota' => Request()->jurusan_anggota,
          'username' => Request()->username,
      ];
      $this->AnggotaModel->updatedata($id, $data);
      return redirect()->route('anggota')->with('pesan', 'Data berhasil diupdate');
    }

    public function hapus($id)
    {
      $this->AnggotaModel->hapus($id);
      $this->AnggotaModel->hapuslogin($id);
      return redirect()->route('anggota')->with('pesan','Data berhasil dihapus');
    }
}
