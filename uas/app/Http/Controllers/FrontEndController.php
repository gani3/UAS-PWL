<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaModel;
use App\Models\BukuModel;
use Hash;

class FrontEndController extends Controller
{
  public function __construct(Type $foo = null)
  {
    $this->AnggotaModel = new AnggotaModel();
    $this->BukuModel = new BukuModel();
  }

  public function register()
  {
  return view('user.register');
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
    return redirect()->route('login')->with('pesan', 'Anda Berhasil Register');

  }

  public function login()
  {
    return view('loginadmin');
  }

  public function home()
  {
    $data = [
      'listbuku' => $this->BukuModel->list(),
    ];

    return view('user.home',$data);
  }

  public function about()
  {
    return view('user.about');
  }

}
