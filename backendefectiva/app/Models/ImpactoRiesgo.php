<?php

namespace App\Models;

use CodeIgniter\Model;

class ImpactoRiesgo extends Model
{
    protected $table = 'impacto_riesgo';

    protected $allowedFields = [
        'descripcion',
        'tipo_regla',
        'tipo_valor',
        'formula',
        'operador1',
        'valor1',
        'operador2',
        'valor2',
        'comentario',
        'estado',
        'escenario'
    ];


    public function getAll($scene){
        $query = $this->db->query("SELECT * FROM impacto_riesgo WHERE escenario=$scene");
        return $query->getResultArray();
    }

    public function store_1($data){
        $query=$this->db->query("INSERT INTO impacto_riesgo
        (descripcion,tipo_regla,tipo_valor,comentario,estado,escenario)
        VALUES ('{$data['descripcion']}','{$data['tipo_regla']}','{$data['tipo_valor']}','{$data['comentario']}','{$data['estado']}','1')") ;
    
        return $query;
    }

    public function store_2($data){
        $query=$this->db->query("INSERT INTO impacto_riesgo
        (descripcion,tipo_regla,tipo_valor,operador1,valor1,operador2,valor2,comentario,estado,escenario)
        VALUES ('{$data['descripcion']}','{$data['tipo_regla']}','{$data['tipo_valor']}','{$data['operador1']}','{$data['valor1']}','{$data['operador2']}','{$data['valor2']}','{$data['comentario']}','{$data['estado']}','2')") ;
    
        return $query;
    }
    public function edit_1($data){
        $query=$this->db->query("UPDATE impacto_riesgo SET
            descripcion = '{$data['descripcion']}',
            tipo_regla = '{$data['tipo_regla']}',
            tipo_valor = '{$data['tipo_valor']}',
            comentario = '{$data['comentario']}',
            estado = '{$data['estado']}',
            formula = '{$data['formula']}'
            where id = {$data['id']}
            ");
        return $query;
    }
    public function edit_2($data){
        $query=$this->db->query("UPDATE impacto_riesgo SET
            descripcion = '{$data['descripcion']}',
            tipo_regla = '{$data['tipo_regla']}',
            tipo_valor = '{$data['tipo_valor']}',
            operador1 = '{$data['operador1']}',
            operador2 = '{$data['operador2']}',
            valor1 = '{$data['valor1']}',
            valor2 = '{$data['valor2']}',
            comentario = '{$data['comentario']}',
            estado = '{$data['estado']}',
            formula = '{$data['formula']}'
            where id = {$data['id']}
            ");
        return $query;
    }
    public function destroy($id){
        $query = $this->db->query("DELETE from impacto_riesgo where id = {$id}");
        return $query;
    }
}
