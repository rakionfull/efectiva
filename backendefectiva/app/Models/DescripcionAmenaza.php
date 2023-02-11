<?php

namespace App\Models;

use CodeIgniter\Model;

class DescripcionAmenaza extends Model
{
    protected $table            = 'desc_amenaza';
    protected $allowedFields    = [
        'idtipo_amenaza',
        'amenaza'
    ];

}
