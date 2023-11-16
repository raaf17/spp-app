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
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['petugas_data'] = $this->petugas->findAll();
        $data['tahunajaran_data'] = $this->tahunajaran->findAll();
        $data['siswa_data'] = $this->siswa->findAll();
        $data['tagihan_data'] = $this->tagihan->findAll();
        $data['pembayaran_data'] = $this->pembayaran->getAll();
        return view('pembayaran/index', $data);
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        return view('pembayaran/new');
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getPost();
        $this->pembayaran->insert($data);
        return redirect()->to(site_url('pembayaran'))->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
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
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->pembayaran->update($id, $data);
        return redirect()->to(site_url('pembayaran'))->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id = null)
    {
        //
    }

    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->pembayaran->delete($id);
        return redirect()->to(site_url('pembayaran'))->with('success', 'Data Berhasil Dihapus');
    }
}
