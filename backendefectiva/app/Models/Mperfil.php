<?php

namespace App\Models;

use CodeIgniter\Model;

class Mperfil extends Model
{
  
    
    //retorna todos los perfiles
    public function getPerfiles($data){
        $consulta = "";
        if($data['estado'] =='all'){ $consulta="SELECT * FROM  tb_perfiles";
        }else{ $consulta ="SELECT * FROM  tb_perfiles where est_perfil={$data['estado']}"; }
        $query = $this->db->query($consulta);
        return $query->getResultArray();
    }
    //agregar el perfil
    public function savePerfil($data){
        // return $data;
        
        $actualizacion_perfil = date('Y-m-d H:i:s');
    

        $query=$this->db->query("INSERT INTO tb_perfiles
        (perfil,desc_perfil,est_perfil,creacion_perfil) VALUES
        ('{$data['perfil']}','{$data['desc_perfil']}',
        '{$data['est_perfil']}','{$creacion_perfil}'); ") ;
    
    
        return $query;
    }
    public function updatePerfil($data){
      
        $actualizacion_perfil = date('Y-m-d H:i:s');
        $query=$this->db->query("UPDATE tb_perfiles SET 
        perfil = '{$data['perfil']}',
        desc_perfil = '{$data['desc_perfil']}',
        est_perfil= '{$data['est_perfil']}',
        actualizacion_perfil='{$actualizacion_perfil}'
        where id_perfil = {$data['id_perfil']} ") ;
           
        return $query;
    }
    public function deletePerfil($data){
      
        
        $query=$this->db->query("DELETE FROM tb_perfiles 
        where id_perfil = {$data['id']} ") ;
           
        return $query;
    }
    //detalle perfiles}
    public function getDetPerfil($data){

        $query = $this->db->query("SELECT * from tb_perfiles
         where id_perfil={$data['id_perfil']}" );
        return $query->getRow();
    }
    //permisos de usuario segun rol
    public function getPermisos($id){

        $query = $this->db->query("SELECT * from tb_detalle_perfil 
         where id_perfil={$id} order by id_det_per ASC" );
        return $query->getResultArray();
    }
    public function updateDetPer($data,$column){
      
        $query=$this->db->query("UPDATE tb_detalle_perfil SET 
        {$column} = {$data['estado']}
        where id_det_per = {$data['id_op']} ") ;
           
        return $query;
    }
    public function getModulo($data){
        
        $query = $this->db->query("SELECT * FROM tb_detalle_perfil as DP inner join tb_modulo as TM on DP.id=TM.id_mod 
        where DP.tabla='tb_modulo' and DP.id_perfil={$data['id_perfil']}" );
        return $query->getResultArray();

    }
    public function getOpcion($data){
        
        $query = $this->db->query("SELECT * from tb_detalle_perfil as DP inner join tb_opcion as T on DP.id=T.id_op 
        where DP.tabla='tb_opcion' and DP.id_perfil={$data['id_perfil']}" );
        return $query->getResultArray();

    }
    public function getItem($data){
        
        $query = $this->db->query("SELECT * FROM tb_detalle_perfil as DP inner join tb_item as TI on DP.id=TI.id_item where DP.tabla='tb_item' and DP.id_perfil={$data['id_perfil']}" );
        return $query->getResultArray();

    }
}

