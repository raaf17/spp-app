<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table            = 'pembayaran';
    protected $primaryKey       = 'id_pembayaran';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_user', 'tanggal', 'bulan', 'nominal', 'id_tahunajaran', 'id_siswa', 'id_tagihan', 'id_status'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = false;

    function getAll()
    {
        $builder = $this->db->table('pembayaran');
        $builder->join('users', 'users.id_user = pembayaran.id_user')
                ->join('tahun_ajaran', 'tahun_ajaran.id_tahunajaran = pembayaran.id_tahunajaran')
                ->join('siswa', 'siswa.id_siswa = pembayaran.id_siswa')
                ->join('tagihan', 'tagihan.id_tagihan = pembayaran.id_tagihan')
                ->join('status', 'status.id_status = pembayaran.id_status');
        $query = $builder->get();
        return $query->getResult();
    }
}