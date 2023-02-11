<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriasVulnerabilidad extends Model
{
    protected $table            = 'categoria_vulnerabilidad';
    protected $allowedFields    = [
        'categoria',
        'estado'
    ];
}
