<?php

namespace App\Models;

use CodeIgniter\Model;

class NivelRiesgo extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'nivel_riesgo';
    protected $allowedFields    = [
        'operador1',
        'operador2',
        'valor1',
        'valor2',
        'color',
        'descripcion',
        'comentario',
        'estado'
    ];

}
