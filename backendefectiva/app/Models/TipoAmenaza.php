<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoAmenaza extends Model
{
    protected $table            = 'tipo_amenaza';
    protected $allowedFields    = [
        'tipo',
        'estado'
    ];
}
