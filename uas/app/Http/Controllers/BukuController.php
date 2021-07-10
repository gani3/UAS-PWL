<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel;
use App\Models\RakBukuModel;

class BukuController extends Controller
{
   public function __construct(Type $foo = null)
   {
     $this->middleware('auth');
     $this->BukuModel = new BukuModel();
     $this->RakBukuModel = new RakBukuModel();
   }
    public function index()
    {
      $data = [
        'buku' => $this->BukuModel->list(),
      ];
      return view('buku.list', $data);
    }

    public function tambah()
    {
      $data =[
        'rak' =>$this->RakBukuModel->list(),
      ];
      return view('buku.tambah',$data);
    }

    public function insert()
    {
      // proses validasi data
      Request()->validate([
        'kode_buku' => 'required|unique:buku,kode_buku|max:10',
        'judul_buku' => 'required',
        'gambar_buku' => 'required|mimes:jpg,jpeg,bmp,png|max:5120',
        'penulis_buku' => 'required',
        'penerbit_buku' => 'required',
        'tahun_penerbit' => 'required',
        'jml_buku' => 'required'
      ],[
        'kode_buku.unique'  => 'Kode ini sudah ada. silahkan refresh halaman',
        'judul_buku.required'  => 'wajib diisi !!!',
        'gambar_buku.required'  => 'wajib diisi !!!',
        'penulis_buku.required'  => 'wajib diisi !!!',
        'penerbit_buku.required'  => 'wajib diisi !!!',
        'tahun_penerbit.required'  => 'wajib diisi !!!',
        'jml_buku.required'  => 'wajib diisi !!!',
        'gambar_buku.mimes'  => 'Hanya type: jpg,jpeg,png , dengan ukuran 5 MB !!!',
      ]);

      // proses simpan data ke database

      $file = Request()->gambar_buku;
      //rename nama file yang diupload
      $filename = Request()->judul_buku. '.' . $file->extension();
      // memindahkan file ke folder foto_buku
      $file->move(public_path('foto_buku'), $filename);

      $data = [
          'kode_buku' => Request()->kode_buku,
          'judul_buku' => Request()->judul_buku,
          'penulis_buku' => Request()->penulis_buku,
          'penerbit_buku' => Request()->penerbit_buku,
          'tahun_penerbit' => Request()->tahun_penerbit,
          'jml_buku' => Request()->jml_buku,
          'id_rak_buku' => Request()->id_rak_buku,
          'gambar_buku' => $filename,
      ];

      $this->BukuModel->insert($data);
      return redirect()->route('buku')->with('pesan', 'Data berhasil ditambahkan');

    }

    public function detail($id)
    {
      if (!$this->BukuModel->detail($id)) {
        abort(404);
      }else {
        $data = [
          'detail' => $this->BukuModel->detail($id),
        ];
      }

      return view('buku.detail', $data);
    }

    public function edit($id)
    {
      if (!$this->BukuModel->detail($id)) {
        abort(404);
      }else {
        $data = [
          'rak' =>$this->RakBukuModel->list(),
          'detail' => $this->BukuModel->detail($id),
        ];
      }
      return view('buku.edit',$data);
    }

    public function update($id)
    {
      // proses validasi data
      Request()->validate([
        'judul_buku' => 'required',
        'penulis_buku' => 'required',
        'penerbit_buku' => 'required',
        'gambar_buku' => 'mimes:jpg,jpeg,bmp,png|max:5120',
        'tahun_penerbit' => 'required',
        'jml_buku' => 'required'
      ],[
        'judul_buku.required'  => 'wajib diisi !!!',
        'penulis_buku.required'  => 'wajib diisi !!!',
        'penerbit_buku.required'  => 'wajib diisi !!!',
        'tahun_penerbit.required'  => 'wajib diisi !!!',
        'gambar_buku.mimes'  => 'Hanya type: jpg,jpeg,png , dengan ukuran 5 MB !!!',
        'jml_buku.required'  => 'wajib diisi !!!',
      ]);



      // pengkondisian apabila gambar di isi
      if (Request()->gambar_buku) {
        // proses simpan data ke database
        $file = Request()->gambar_buku;
        //rename nama file yang diupload
        $filename = Request()->judul_buku. '.' . $file->extension();
        // memindahkan file ke folder foto_buku
        $file->move(public_path('foto_buku'), $filename);

        $data = [
            'kode_buku' => Request()->kode_buku,
            'judul_buku' => Request()->judul_buku,
            'penulis_buku' => Request()->penulis_buku,
            'penerbit_buku' => Request()->penerbit_buku,
            'tahun_penerbit' => Request()->tahun_penerbit,
            'jml_buku' => Request()->jml_buku,
            'id_rak_buku' => Request()->id_rak_buku,
            'gambar_buku' => $filename,
        ];

      }else {
        $data = [
            'judul_buku' => Request()->judul_buku,
            'penulis_buku' => Request()->penulis_buku,
            'penerbit_buku' => Request()->penerbit_buku,
            'tahun_penerbit' => Request()->tahun_penerbit,
            'jml_buku' => Request()->jml_buku,
            'id_rak_buku' => Request()->id_rak_buku,
        ];

      }


      $this->BukuModel->updatedata($id, $data);
      return redirect()->route('buku')->with('pesan', 'Data berhasil diupdate');
    }

    public function hapus($id)
    {
      //mengahapus foto yang diupload
      $buku =  $this->BukuModel->detail($id);
      if ($buku->gambar_buku <> "") {
        unlink(public_path('foto_buku').'/' . $buku->gambar_buku);
      }
      $this->BukuModel->hapus($id);
      return redirect()->route('buku')->with('pesan','Data berhasil dihapus');
    }
}
