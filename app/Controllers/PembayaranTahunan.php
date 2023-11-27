<?php

namespace App\Controllers;

use App\Models\PembayaranModel;
use App\Models\PetugasModel;
use App\Models\TahunAjaranModel;
use App\Models\SiswaModel;
use App\Models\TagihanModel;
use App\Models\StatusModel;
use CodeIgniter\RESTful\ResourcePresenter;

class PembayaranTahunan extends ResourcePresenter
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
        $data['data_bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $data['status_data'] = $this->status->where('id_status', 1)->findAll();
        return view('pembayaran/tahunan/index', $data);
    }

    public function new()
    {
        return view('pembayaran/tahunan/new');
    }

    public function create()
    {
        $this->status->insert('status', 'Tunggak');
        $status_awal = $this->status->insertID();
        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'id_siswa' => $this->request->getPost('id_siswa'),
            'id_tagihan' => $this->request->getPost('id_tagihan'),
            'id_tahunajaran' => $this->request->getPost('id_tahunajaran'),
            'id_status' => $status_awal
        ];
        $this->pembayaran->insert($data);
        return redirect()->to(site_url('pembayarantahunan'))->with('success', 'Data Berhasil Disimpan');
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
            return view('pembayaran/tahunan/edit', $data);
        } else {
            return view('pembayaran/404');
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->pembayaran->update($id, $data);
        return redirect()->to(site_url('pembayarantahunan'))->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id = null)
    {
        $this->pembayaran->delete($id);
        return redirect()->to(site_url('pembayarantahunan'))->with('success', 'Data Berhasil Dihapus');
    }
}
