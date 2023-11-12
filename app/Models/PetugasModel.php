<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model
{
    protected $table            = 'petugas';
    protected $primaryKey       = 'id_petugas';
    protected $returnType       = 'object';
    protected $allowedFields    = ['username', 'password', 'nama_petugas', 'level'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $deletedField  = 'deleted_at';
}