<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PegawaiModel;
use Hash;

class PegawaiController extends Controller
{
   public function __construct(Type $foo = null)
   {
     $this->middleware('auth');
     $this->PegawaiModel = new PegawaiModel();
   }
    public function index()
    {
      $data = [
        'pegawai' => $this->PegawaiModel->list(),
      ];
      return view('pegawai.list', $data);
    }

    public function tambah()
    {
      return view('pegawai.tambah');
    }

    public function insert()
    {
      // proses validasi data
      Request()->validate([
        'nama_pegawai' => 'required',
        'no_telp_pegawai' => 'required',
        'alamat_pegawai' => 'required',
        'jabatan_pegawai' => 'required',
        'username' => 'required|unique:pegawai,username|max:10',
        'password' => 'required'
      ],[
        'nama_pegawai.required'  => 'wajib diisi !!!',
        'no_telp_pegawai.required'  => 'wajib diisi !!!',
        'alamat_pegawai.required'  => 'wajib diisi !!!',
        'username.required'  => 'wajib diisi !!!',
        'jabatan_pegawai.required'  => 'wajib diisi !!!',
        'username.unique'  => 'username sudah ada  !!!',
        'password.required'  => 'wajib diisi !!!',
        'username.max'  => 'Max 10 karakter !!!'
      ]);

      // proses simpan data ke database

      $data = [
          'nama_pegawai' => Request()->nama_pegawai,
          'no_telp_pegawai' => Request()->no_telp_pegawai,
          'jabatan_pegawai' => Request()->jabatan_pegawai,
          'alamat_pegawai' => Request()->alamat_pegawai,
          'username' => Request()->username,
          'status' => '1',
          'password' => Hash::make(Request()->password)
      ];

      $dataloginadmin = [
        'name' => Request()->nama_pegawai,
        'username' => Request()->username,
        'password' => Hash::make(Request()->password),
        'level' => '1',
      ];

      $this->PegawaiModel->insertadmin($dataloginadmin);
      $this->PegawaiModel->insert($data);
      return redirect()->route('pegawai')->with('pesan', 'Data berhasil ditambahkan');

    }

    public function detail($id)
    {
      if (!$this->PegawaiModel->detail($id)) {
        abort(404);
      }else {
        $data = [
          'detail' => $this->PegawaiModel->detail($id),
        ];
      }

      return view('pegawai.detail', $data);
    }

    public function edit($id)
    {
      if (!$this->PegawaiModel->detail($id)) {
        abort(404);
      }else {
        $data = [
          'detail' => $this->PegawaiModel->detail($id),
        ];
      }
      return view('pegawai.edit',$data);
    }

    public function update($id)
    {

      // proses validasi data
      Request()->validate([
        'nama_pegawai' => 'required',
        'no_telp_pegawai' => 'required',
        'alamat_pegawai' => 'required',
        'jabatan_pegawai' => 'required',
      ],[
        'nama_pegawai.required'  => 'wajib diisi !!!',
        'no_telp_pegawai.required'  => 'wajib diisi !!!',
        'alamat_pegawai.required'  => 'wajib diisi !!!',
        'jabatan_pegawai.required'  => 'wajib diisi !!!',
      ]);

      // proses simpan data ke database

      $data = [
          'nama_pegawai' => Request()->nama_pegawai,
          'no_telp_pegawai' => Request()->no_telp_pegawai,
          'jabatan_pegawai' => Request()->jabatan_pegawai,
          'alamat_pegawai' => Request()->alamat_pegawai,
      ];

      $this->PegawaiModel->updatedata($id, $data);
      return redirect()->route('pegawai')->with('pesan', 'Data berhasil diupdate');
    }

    public function hapus($id)
    {
      $this->PegawaiModel->hapus($id);
      $this->PegawaiModel->hapuslogin($id);
      return redirect()->route('pegawai')->with('pesan','Data berhasil dihapus');
    }
}
