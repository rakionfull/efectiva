<?php

namespace App\Models;

use CodeIgniter\Model;

class MconfigPass extends Model
{
  
    public function updateConfigPass($data){
       
        $last_activity = date('Y-m-d H:i:s');
        $query=$this->db->query("UPDATE config_pass SET
        duracion={$data['duracion']},inactividad={$data['inactividad']},sesion={$data['sesion']},
        tama_min={$data['tama_min']},tama_max={$data['tama_max']},letras={$data['letras']},numeros={$data['numeros']},
        caracteres={$data['caracteres']},fecha_actualizacion='{$last_activity}',intentos={$data['intentos']}") ;

        return $query;
    }
    public function getConfigPass(){
        $query = $this->db->query("SELECT * FROM  config_pass");
        return $query->getResultArray();
    }
    
    
}