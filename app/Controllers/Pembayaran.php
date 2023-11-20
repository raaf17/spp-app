<?php

namespace App\Controllers;

use App\Models\PembayaranModel;
use App\Models\PetugasModel;
use App\Models\TahunAjaranModel;
use App\Models\SiswaModel;
use App\Models\TagihanModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Pembayaran extends ResourcePresenter
{
    protected $db;
    protected $pembayaran;
    protected $petugas;
    protected $tahunajaran;
    protected $siswa;
    protected $tagihan;

    public function __construct()
    {
        $this->pembayaran = new PembayaranModel();
        $this->petugas = new PetugasModel();
        $this->tahunajaran = new TahunAjaranModel();
        $this->siswa = new SiswaModel();
        $this->tagihan = new TagihanModel();
    }

    public function index()
    {
        $data['petugas_data'] = $this->petugas->findAll();
        $data['tahunajaran_data'] = $this->tahunajaran->findAll();
        $data['siswa_data'] = $this->siswa->findAll();
        $data['tagihan_data'] = $this->tagihan->findAll();
        $data['pembayaran_data'] = $this->pembayaran->getAll();
        return view('pembayaran/index', $data);
    }

    public function pembayaran()
    {
        if (isset($_POST['cari'])) {
            $id_siswa = $this->request->getPost('id_siswa');
            $id_tagihan = $this->request->getPost('id_tagihan');
            $id_tahunajaran = $this->request->getPost('id_tahunajaran');
            $siswa = $this->pembayaran->where('id_siswa', $id_siswa)->first();
            $tagihan = $this->pembayaran->where('id_tagihan', $id_tagihan)->first();
            $tahunajaran = $this->pembayaran->where('id_tahunajaran', $id_tahunajaran)->first();

            if(!empty($siswa && $tagihan && $tahunajaran)) {
                echo "ok";
            }
        }
    }

    public function new()
    {
        return view('pembayaran/new');
    }

    public function create()
    {
        $data = $this->request->getPost();
        $this->pembayaran->insert($data);
        return redirect()->to(site_url('pembayaran'))->with('success', 'Data Berhasil Disimpan');
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
            return view('pembayaran/edit', $data);
        } else {
            return view('pembayaran/404');
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->pembayaran->update($id, $data);
        return redirect()->to(site_url('pembayaran'))->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id = null)
    {
        $this->pembayaran->delete($id);
        return redirect()->to(site_url('pembayaran'))->with('success', 'Data Berhasil Dihapus');
    }
}
