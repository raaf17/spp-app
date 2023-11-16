<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table            = 'siswa';
    protected $primaryKey       = 'id_siswa';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_siswa', 'nis', 'nisn', 'id_kelas', 'jenis_kelamin', 'no_telp'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = false;

    function getAll()
    {
        $builder = $this->db->table('siswa');
        $builder->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $query = $builder->get();
        return $query->getResult();
    }
}