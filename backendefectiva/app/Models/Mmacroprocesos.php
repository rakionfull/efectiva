<?php

namespace App\Models;

use CodeIgniter\Model;

class Mmacroprocesos extends Model
{
  
    
    //retorna todos MacroProcesos
    public function getMacroproceso(){

        $query = $this->db->query("SELECT * FROM macroprocesos");
        return $query->getResultArray();
    }
    /*
    public function getMacroprocesoByActivo(){

        $query = $this->db->query("SELECT * FROM empresa where estado='1'");
        return $query->getResultArray();
    }
    */
    public function saveMacroproceso($data){
       

        $query=$this->db->query("INSERT INTO macroprocesos
        (macroproceso,estado) VALUES
        ('{$data['macroproceso']}',{$data['estado']})") ;
    
    
        return $query;
    }
    public function updateMacroproceso($data){
      
        
        $query=$this->db->query("UPDATE macroprocesos SET 
        macroproceso = '{$data['macroproceso']}',
        estado = '{$data['estado']}'
        where id = {$data['id']} ") ;
           
        return $query;
    }
}
