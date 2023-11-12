<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table            = 'kelas';
    protected $primaryKey       = 'id_kelas';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_kelas', 'kompetensi_keahlian'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;

    function getAll()
    {
        $builder = $this->db->table('kelas');
        $builder->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
        $query = $builder->get();
        return $query->getResult();
    }
    
    // function getAll(){
    //     $builder = $this->db->table('kelas');
    //     // $builder->select('kelas.*, jurusan.nama_jurusan');
    //     $builder->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan', 'left');
    //     $query = $builder->get();
    //     return $query->getResult();
    // }

    // function getAll(){
    //     return $this->table('kelas')
    //         ->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan', 'left')
    //         ->Get()->getResultArray();
    // }
}