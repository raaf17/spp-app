<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table            = 'siswa';
    protected $primaryKey       = 'nisn';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nisn', 'nis', 'nama_siswa', 'id_kelas', 'alamat', 'no_telp', 'id_spp'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $deletedField  = 'deleted_at';

    function getAll()
    {
        $builder = $this->db->table('siswa');
        $builder->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $builder->join('spp', 'spp.id_spp = siswa.id_spp');
        $query = $builder->get();
        return $query->getResult();
    }
}