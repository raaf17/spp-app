<?php

namespace App\Controllers;

use App\Database\Migrations\Status;
use App\Models\PembayaranModel;
use App\Models\PetugasModel;
use App\Models\TahunAjaranModel;
use App\Models\SiswaModel;
use App\Models\TagihanModel;
use App\Models\StatusModel;
use CodeIgniter\RESTful\ResourcePresenter;

class PembayaranBulanan extends ResourcePresenter
{
    protected $db;
    protected $pembayaran;
    protected $petugas;
    protected $tahunajaran;
    protected $siswa;
    protected $tagihan;
    protected $status;

    public function __construct()
    {
        $this->pembayaran = new PembayaranModel();
        $this->petugas = new PetugasModel();
        $this->tahunajaran = new TahunAjaranModel();
        $this->siswa = new SiswaModel();
        $this->tagihan = new TagihanModel();
        $this->status = new StatusModel();
    }

    public function index()
    {
        $data['petugas_data'] = $this->petugas->findAll();
        $data['tahunajaran_data'] = $this->tahunajaran->findAll();
        $data['siswa_data'] = $this->siswa->findAll();
        $data['tagihan_data'] = $this->tagihan->findAll();
        $data['pembayaran_data'] = $this->pembayaran->getAll();
        $data['status_data'] = $this->status->findAll();
        $data['data_bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return view('pembayaran/bulanan/index', $data);
    }

    public function new()
    {
        return view('pembayaran/bulanan/new');
    }

    public function create()
    {
        $this->status->set('status', 'Tunggak');
        $data = $this->request->getPost();
        $this->pembayaran->insert($data);
        return redirect()->to(site_url('pembayaranbulanan'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id = null)
    {
        $pembayaran = $this->pembayaran->where('id_pembayaran', $id)->first();
        if (is_object($pembayaran)) {
            $data['pembayaran_data'] = $pembayaran;
            $data['petugas_data'] = $this->petugas->findAll();
            $data['tahunajaran_data'] = $this->tahunajaran->findAll();
            $data['siswa_data'] = $this->siswa->findAll();
            $data['tagihan_data'] = $this->tagihan->findAll();
            $data['status_data'] = $this->status->findAll();
            return view('pembayaran/bulanan/edit', $data);
        } else {
            return view('pembayaran/404');
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->pembayaran->update($id, $data);
        return redirect()->to(site_url('pembayaranbulanan'))->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id = null)
    {
        $this->pembayaran->delete($id);
        return redirect()->to(site_url('pembayaranbulanan'))->with('success', 'Data Berhasil Dihapus');
    }
}
