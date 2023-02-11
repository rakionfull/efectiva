<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoRiesgo extends Model
{
    protected $table = 'tipo_riesgo';

    public function getAll(){
        $query = $this->db->query("SELECT * FROM tipo_riesgo");
        return $query->getResultArray();
    }

    public function store($data){
        $query=$this->db->query("INSERT INTO tipo_riesgo(tipo_riesgo,descripcion,estado)
        VALUES ('{$data['tipo_riesgo']}','{$data['descripcion']}','{$data['estado']}')") ;
        return $query;
    }

    public function edit($data){
        $query=$this->db->query("UPDATE tipo_riesgo SET 
            tipo_riesgo = '{$data['tipo_riesgo']}',
            descripcion = '{$data['descripcion']}',
            estado = '{$data['estado']}'
            where id = {$data['id']}");
        return $query;
    }

    public function destroy($id){
        $query = $this->db->query("DELETE from tipo_riesgo where id = {$id}");
        return $query;
    }
    
}
