<?php

namespace App\Models;

use CodeIgniter\Model;

class DescripcionVulnerabilidad extends Model
{
    protected $table            = 'desc_vulnerabilidad';
    protected $allowedFields    = [
        'idcategoria',
        'vulnerabilidad'
    ];
}
