<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengembalianModel;
use App\Models\BukuModel;
use App\Models\AnggotaModel;
use App\Models\PegawaiModel;
use Dompdf\Dompdf;


class PengembalianController extends Controller
{
   public function __construct(Type $foo = null)
   {
     $this->middleware('auth');
     $this->PengembalianModel = new PengembalianModel();
     $this->BukuModel = new BukuModel();
     $this->AnggotaModel = new AnggotaModel();
     $this->PegawaiModel = new PegawaiModel();
   }

    public function index()
    {
      $data = [
        'pengembalian' => $this->PengembalianModel->list(),
      ];
      return view('pengembalian.list', $data);
    }

    public function tambah()
    {
      $data =[
        'buku' =>$this->BukuModel->list(),
        'anggota' =>$this->AnggotaModel->list(),
        'pegawai' =>$this->PegawaiModel->list(),
      ];
      return view('pengembalian.tambah',$data);
    }

    public function insert()
    {
      // proses validasi data
      Request()->validate([
        'tanggal_pengembalian' => 'required',
      ],[
        'tanggal_pengembalian.required'  => 'wajib diisi !!!',
      ]);

      $data = [
          'tanggal_pengembalian' => Request()->tanggal_pengembalian,
          'id_buku' => Request()->id_buku,
          'id_anggota' => Request()->id_anggota,
          'id_pegawai' => Request()->id_pegawai,
          'komentar' => Request()->komentar,
      ];

      $this->PengembalianModel->insert($data);
      return redirect()->route('pengembalian')->with('pesan', 'Data berhasil ditambahkan');

    }

    public function detail($id)
    {
      if (!$this->PengembalianModel->detail($id)) {
        abort(404);
      }else {
        $data = [
          'detail' => $this->PengembalianModel->detail($id),
        ];
      }

      return view('pengembalian.detail', $data);
    }

    public function edit($id)
    {
      if (!$this->PengembalianModel->detail($id)) {
        abort(404);
      }else {
        $data = [
            'buku' =>$this->BukuModel->list(),
            'anggota' =>$this->AnggotaModel->list(),
            'pegawai' =>$this->PegawaiModel->list(),
            'detail' => $this->PengembalianModel->detail($id),
        ];
      }
      return view('pengembalian.edit',$data);
    }

    public function update($id)
    {
      // proses validasi data
      Request()->validate([
        'tanggal_pengembalian' => 'required',
      ],[
        'tanggal_pengembalian.required'  => 'wajib diisi !!!',
      ]);

      $data = [
          'tanggal_pengembalian' => Request()->tanggal_pengembalian,
          'id_buku' => Request()->id_buku,
          'id_anggota' => Request()->id_anggota,
          'id_pegawai' => Request()->id_pegawai,
          'komentar' => Request()->komentar,
      ];


      $this->PengembalianModel->updatedata($id, $data);
      return redirect()->route('pengembalian')->with('pesan', 'Data berhasil diupdate');
    }

    public function hapus($id)
    {
      $this->PengembalianModel->hapus($id);
      return redirect()->route('pengembalian')->with('pesan','Data berhasil dihapus');
    }

    public function excel()
    {
      $data = [
      'pengembalian' => $this->PengembalianModel->list(),
    ];
    return view('pengembalian.excel', $data);
    }

    public function pdf()
    {
      $data = [
      'pengembalian' => $this->PengembalianModel->list(),
    ];
    $html = view('pengembalian.pdf', $data);
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
