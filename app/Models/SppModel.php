<?php

namespace App\Models;

use CodeIgniter\Model;

class SppModel extends Model
{
    protected $table            = 'spp';
    protected $primaryKey       = 'id_spp';
    protected $returnType       = 'object';
    protected $allowedFields    = ['tahun', 'nominal'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $deletedField  = 'deleted_at';
}