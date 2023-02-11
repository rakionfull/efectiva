<?php

namespace App\Models;

use CodeIgniter\Model;

class Mproceso extends Model
{
  
    
    //retorna todos Proceso
    public function getProceso(){

        $query = $this->db->query("SELECT * FROM procesos");
        return $query->getResultArray();
    }
    /*
    public function getProcesoByActivo(){

        $query = $this->db->query("SELECT * FROM empresa where estado='1'");
        return $query->getResultArray();
    }
    */
    public function saveProceso($data){
       

        $query=$this->db->query("INSERT INTO procesos
        (proceso,estado) VALUES
        ('{$data['proceso']}',{$data['estado']})") ;
    
    
        return $query;
    }
    public function updateProceso($data){
      
        
        $query=$this->db->query("UPDATE procesos SET 
        proceso = '{$data['proceso']}',
        estado = '{$data['estado']}'
        where id = {$data['id']} ") ;
           
        return $query;
    }
}
