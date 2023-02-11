<?php

namespace App\Models;

use CodeIgniter\Model;

class Munidades extends Model
{
  
    
    //retorna todas las Unidades
    public function getUnidades(){

        $query = $this->db->query("SELECT * FROM unidades");
        return $query->getResultArray();
    }
    
    public function saveUnidades($data){
       

        $query=$this->db->query("INSERT INTO unidades
        (unidad,estado) VALUES
        ('{$data['unidad']}',{$data['estado']})") ;
    
    
        return $query;
    }
    public function updateUnidades($data){
      
        
        $query=$this->db->query("UPDATE unidades SET 
        unidad = '{$data['unidad']}',
        estado = '{$data['estado']}'
        where id = {$data['id']} ") ;
           
        return $query;
    }
}
