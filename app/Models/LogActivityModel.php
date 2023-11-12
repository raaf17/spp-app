<?php

namespace App\Models;

use CodeIgniter\Model;

class LogActivityModel extends Model
{
    protected $table            = 'log_activity';
    protected $primaryKey       = 'id_activity';
    protected $returnType       = 'object';
    protected $allowedFields    = ['subject', 'detail', 'url', 'method', 'agent'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $deletedField  = 'deleted_at';
}