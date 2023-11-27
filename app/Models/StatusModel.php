<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusModel extends Model
{
    protected $table            = 'status';
    protected $primaryKey       = 'id_status';
    protected $returnType       = 'object';
    protected $allowedFields    = ['status'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = false;
}