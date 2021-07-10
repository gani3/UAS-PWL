<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamanModel;
use App\Models\BukuModel;
use App\Models\AnggotaModel;
use App\Models\PegawaiModel;
use Dompdf\Dompdf;

class PeminjamanController extends Controller
{
   public function __construct(Type $foo = null)
   {
     $this->middleware('auth');
     $this->PeminjamanModel = new PeminjamanModel();
     $this->BukuModel = new BukuModel();
     $this->AnggotaModel = new AnggotaModel();
     $this->PegawaiModel = new PegawaiModel();
   }
    public function index()
    {
      $data = [
        'peminjaman' => $this->PeminjamanModel->list(),
      ];
      return view('peminjaman.list', $data);
    }

    public function tambah()
    {
      $data =[
        'buku' =>$this->BukuModel->list(),
        'anggota' =>$this->AnggotaModel->list(),
        'pegawai' =>$this->PegawaiModel->list(),
      ];
      return view('peminjaman.tambah',$data);
    }

    public function insert()
    {
      // proses validasi data
      Request()->validate([
        'tanggal_kembali' => 'required',
        'tanggal_pinjam' => 'required',
      ],[
        'tanggal_kembali.required'  => 'wajib diisi !!!',
        'tanggal_pinjam.required'  => 'wajib diisi !!!',
      ]);

      $data = [
          'tanggal_kembali' => Request()->tanggal_kembali,
          'tanggal_pinjam' => Request()->tanggal_pinjam,
          'id_buku' => Request()->id_buku,
          'id_anggota' => Request()->id_anggota,
          'id_pegawai' => Request()->id_pegawai,
          'komentar' => Request()->komentar,
      ];

      $this->PeminjamanModel->insert($data);
      return redirect()->route('peminjaman')->with('pesan', 'Data berhasil ditambahkan');

    }

    public function detail($id)
    {
      if (!$this->PeminjamanModel->detail($id)) {
        abort(404);
      }else {
        $data = [
          'detail' => $this->PeminjamanModel->detail($id),
        ];
      }

      return view('peminjaman.detail', $data);
    }

    public function edit($id)
    {
      if (!$this->PeminjamanModel->detail($id)) {
        abort(404);
      }else {
        $data = [
            'buku' =>$this->BukuModel->list(),
            'anggota' =>$this->AnggotaModel->list(),
            'pegawai' =>$this->PegawaiModel->list(),
            'detail' => $this->PeminjamanModel->detail($id),
        ];
      }
      return view('peminjaman.edit',$data);
    }

    public function update($id)
    {
      // proses validasi data
      Request()->validate([
        'tanggal_kembali' => 'required',
        'tanggal_pinjam' => 'required',
      ],[
        'tanggal_kembali.required'  => 'wajib diisi !!!',
        'tanggal_pinjam.required'  => 'wajib diisi !!!',
      ]);

      $data = [
          'tanggal_kembali' => Request()->tanggal_kembali,
          'tanggal_pinjam' => Request()->tanggal_pinjam,
          'id_buku' => Request()->id_buku,
          'id_anggota' => Request()->id_anggota,
          'id_pegawai' => Request()->id_pegawai,
          'komentar' => Request()->komentar,
      ];

      $this->PeminjamanModel->updatedata($id, $data);
      return redirect()->route('peminjaman')->with('pesan', 'Data berhasil diupdate');
    }

    public function hapus($id)
    {
      $this->PeminjamanModel->hapus($id);
      return redirect()->route('peminjaman')->with('pesan','Data berhasil dihapus');
    }

    public function excel()
    {
      $data = [
      'peminjaman' => $this->PeminjamanModel->list(),
    ];
    return view('peminjaman.excel', $data);
    }

    public function pdf()
    {
      $data = [
      'peminjaman' => $this->PeminjamanModel->list(),
    ];
    $html = view('peminjaman.pdf', $data);
    // menggunakan dompdf
    $dompdf = new Dompdf();
    // isi data yang akan di export
    $dompdf->loadHtml($html);
    // mengatur ukuran kerta
    $dompdf->setPaper('A4', 'landscape');
    // mengubah html ke pdf
    $dompdf->render();
    // menampilkan hasil pdf ke borwser
    $dompdf->stream();
    }
}
