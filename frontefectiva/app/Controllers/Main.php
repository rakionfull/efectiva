<?php

namespace App\Controllers;

class Main extends BaseController {
  protected $error;
    public function inicio() {
     
      if($this->session->logged_in){
       
        $get_endpoint = '/api/dashboard';
        $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
       
        if($response){
          $data["mensaje"] = $response->msg;
          return view('main/inicio',$data);
        }
      }else{
        return redirect()->to(base_url('/login'));
      }
    
      
    }
    public function cambio_clave(){
      if($this->session->logged_in){
       
        return view('auth/cambio_clave');
      }else{
        return redirect()->to(base_url('/login'));
      }
     

    }
    public function updateClave(){
    
      if($this->session->logged_in){
        if($this->request->getPost()){
          $post_endpoint = '/api/change_pass';
           $request_data = (array("passw" => $this->request->getPost('passw'),
              "repassw" => $this->request->getPost('repassw'),
              "id_us"=> $this->session->id)
             );
            
           $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
            //  var_dump($response);
            if(isset($response->error)){
              $this->session->setFlashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">
             '.$response->error.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>');
            return redirect()->to(base_url('/cambio_clave'));
           }else{
            $this->session->setFlashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Clave Modificada Correctamente
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
           </div>');
            return redirect()->to(base_url('/inicio'));
          }
           
           
        }else{
          return redirect()->to(base_url('/login'));
        }
      }

     
    }
    public function listUsers(){
      
        //opteniendo los datos
        if($this->session->logged_in){
         
          // $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
          // if($response){
     
          //   $data["users"]=$response->datos;
     
              return view('accesos/listUsers');
          //}
        }else{
          return redirect()->to(base_url('/login'));
        }
        
     
  
    }
    public function getUsers(){

      $get_endpoint = '/api/getUsers';

      $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
      // var_dump($response);
      // if($response){
 
       echo json_encode($response);

      // }
    }

    public function configPass(){

      if($this->session->logged_in){
              $post_endpoint = '/api/getConfigPass';
                  
              $request_data = [];
              
              $response = (perform_http_request('GET', REST_API_URL . $post_endpoint,$request_data));
              if($response->data){
                $datos = $response->data[0];
              }else{
                // $datos=[
                //   'duracion' => "",
                //   'sesion' => "",
                //   'inactividad' => "",
                //   'time_intentos' => "",
                //   'tama_min' => "",
                //   'tama_max' => "",
                //   'letras' => 0,
                //   'caracteres' => 0,
                //   'numeros' => 0,
                //   'intentos' => "",
                // ];
              }
              
              $error = new  \stdClass;
              $error->duracion = '';
              $error->tama_min = '';
              $error->tama_max = '';
              $error->sesion = '';
              $error->inactividad = '';
              $error->intentos = '';
              // $error->letras = '';
              // $error->numeros = '';
              // $error->caracteres = '';
              $data = [
                'data' => $datos,
                'error'   =>  $error
                
              ];
             
              return view('accesos/configPass',$data);
            }else{
              return redirect()->to(base_url('/login'));
            }
    }
      public function addConfigPass() {
        // helper(['curl']);
        if($this->session->logged_in){
          if(!$this->request->getPost())
          {
            return redirect()->to(base_url('/inicio'));
          }else{
        
              $post_endpoint = '/api/addConfigPass';
              $request_data = $this->request->getPost();
             
              $numeros=0;
              if($this->request->getPost('num_pass')){
                $numeros=1;
                $request_data['numeros'] = $numeros;
              }else{
                
                $numeros=0;
                $request_data['numeros'] = $numeros;
              }
              $letras=0;
              if($this->request->getPost('letra_pass')){
                
                $letras=1;
                $request_data['letras'] = $letras;
              }else{
                
                $letras=0;
                $request_data['letras'] = $letras;
              }
              $char=0;
              if($this->request->getPost('char_pass')){
                
                $char=1;
                $request_data['caracteres'] = $char;
              }else{
                
                $char=0;
                $request_data['caracteres'] = $char;
              }
             
                              
              
             $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
            
              if(isset($response->error)){
                $datos=[
                  'data' => $request_data,
                  'error' => $response->datos,
                ];
  
                return view('accesos/configPass',$datos);
              }else{
                if($response->msg ){
                  $this->session->setFlashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Parametros Guaradados correctamente
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
                    return redirect()->to(base_url('/configPass'));
                  }else{
                      $this->session->setFlashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      Error al registrar
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');
                      return redirect()->to(base_url('/inicio'));
                  }
              }
             
              
          
             
            
          }
        }
       
         
      }
      public function createUser(){
        if($this->session->logged_in){
          $datos=[
            'docident_us' => "",
            'nombres_us' => "",
            'apepat_us' => "",
            'apemat_us' => "",
            'email_us' => "",
            'usuario_us' => "",
            'perfil_us' => "",
          ];
          $error = new  \stdClass;
          $error->docident_us = '';
          $error->nombres_us = '';
          $error->apepat_us = '';
          $error->apemat_us = '';
          $error->email_us = '';
          $error->usuario_us = '';
          $error->perfil_us = '';

          $get_endpoint = '/api/getPerfiles/1';

          $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
          

          $data = [
             'data' => $datos,
             'error'   =>  $error,
             'perfiles' =>  $response,
             
          ];
      
          return view('accesos/createUser',$data);
        }else{
          return redirect()->to(base_url('/login'));
        }
        
        
  
      }
      public function modifyUser($id){
        if($this->session->logged_in){
            if($id){
              $post_endpoint = '/api/getUser/'.$id;
              $request_data = [];
              $response = (perform_http_request('GET', REST_API_URL . $post_endpoint,$request_data));

              //traigo los perfiles
              $get_endpoint = '/api/getPerfiles/1';

              $perfiles =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);

              
              $error = new  \stdClass;
              $error->docident_us = '';
              $error->nombres_us = '';
              $error->apepat_us = '';
              $error->apemat_us = '';
              $error->email_us = '';
              $error->usuario_us = '';
              $error->perfil_us = '';
              $error->estado_us = '';

              $data = [
                'user' => $response->datos,
                'error'   =>  $error,
                'perfiles' =>  $perfiles,
                
             ];
      
              return view('accesos/updateUser',$data);
            }else{
              return redirect()->to(base_url('/listUsers'));
            }
        }else{
          return redirect()->to(base_url('/login'));
        }
       
      
      }
     
      public function addUser() {
        // helper(['curl']);
        if($this->session->logged_in){
          if(!$this->request->getPost())
          {
            return redirect()->to(base_url('/listUsers'));
          }else{
        
              $post_endpoint = '/api/addUser';
              $request_data = [];
              // $request_data = (array("username" => $this->request->getPost('username'), "password" => $this->request->getPost('pass')));
              $request_data = $this->request->getPost();
              $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
              // var_dump($response);
              if(isset($response->error)){
                $get_endpoint = '/api/getPerfiles/1';

                $getPerfiles =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);

                $datos=[
                  'data' => $request_data,
                  'error' => $response->datos,
                  'perfiles' =>  $getPerfiles,
                ];
                return view('accesos/createUser',$datos);
              }else{
                if($response->user ){
                  $this->session->setFlashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Usuario creado correctamente
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
                    return redirect()->to(base_url('/listUsers'));
                  }else{
                      $this->session->setFlashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      Error al registrar
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');
                      return redirect()->to(base_url('/listUsers'));
                  }
              }
             
              
          
             
            
          }
        }
       
         
      }
      public function updateUser($id) {
        
        if($this->session->logged_in){
          if(!$this->request->getPost())
          {
            return redirect()->to(base_url('/modifyUser'));
          }else{
        
              $post_endpoint = '/api/updateUser/'.$id;
              $request_data = $this->request->getPost();
              
              $response = perform_http_request('PUT', REST_API_URL . $post_endpoint,$request_data);
             
                if($response->user ){
                  $this->session->setFlashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Usuario modificado correctamente
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
                    return redirect()->to(base_url('/listUsers'));
                  }else{
                      $this->session->setFlashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      Error al modificar
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');
                      return redirect()->to(base_url('/listUsers'));
                  }
              
             
          
             
            
          }
        }
       
         
        
      }
      public function deleteUser($id) {
        if($this->session->logged_in){
          $post_endpoint = '/api/deleteUser/'.$id;
        
          $response = perform_http_request('DELETE', REST_API_URL . $post_endpoint,[]);
         
          if($response->user ){
                 $this->session->setFlashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Usuario eliminado correctamente
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
           </div>');
            return redirect()->to(base_url('/listUsers'));
          }else{
              $this->session->setFlashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">
              Error al eliminar
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
             </div>');
              return redirect()->to(base_url('/listUsers'));
          }
        }
            
        
           
          
        
         
          //opteniendo el cpatcha
        
          // return view('auth/login',$data);
      }
      public function perfiles(){
      
        //opteniendo los datos
        if($this->session->logged_in){
          // $get_endpoint = '/api/getPerfiles';

          // $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
          // if($response){
           
          //   $data["perfiles"]=$response->datos;
     
              return view('accesos/perfiles');
          //}
        }else{
          return redirect()->to(base_url('/login'));
        }
        
     
  
      }
      public function getPerfiles(){
        if($this->session->logged_in){
          $get_endpoint = '/api/getPerfiles';

          $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
          if($response){
           
            echo json_encode($response);
          }
        }
      }
      public function addPerfil() {
        // helper(['curl']);
        if($this->session->logged_in){
          if(!$this->request->getPost())
          {
            return redirect()->to(base_url('/listUsers'));
          }else{
        
              $post_endpoint = '/api/addPerfil';
              $request_data = [];
              // $request_data = (array("username" => $this->request->getPost('username'), "password" => $this->request->getPost('pass')));
              $request_data = $this->request->getPost();
             
              $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
              // var_dump($response);
              
                if($response->msg ){
                    echo json_encode($response->msg);
                
                }else{
                  echo json_encode(false);
                }
             
              
          
             
            
          }
        }
       
         
      }
      public function updatePerfil() {
        // helper(['curl']);
        if($this->session->logged_in){
          if(!$this->request->getPost())
          {
            return redirect()->to(base_url('/listUsers'));
          }else{
        
              $post_endpoint = '/api/updatePerfil';
              $request_data = [];
              // $request_data = (array("username" => $this->request->getPost('username'), "password" => $this->request->getPost('pass')));
              $request_data = $this->request->getPost();
             
              $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
              // var_dump($response);
              
                if($response->msg ){
                    echo json_encode($response->msg);
                
                }else{
                  echo json_encode(false);
                }
             
              
          
             
            
          }
        }
       
         
      }
      public function getDetPerfil($id){
        if($this->session->logged_in){
          $get_endpoint = '/api/getDetPerfil/'.$id;

          $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
          if($response){
           
            echo json_encode($response);
          }
        }
      }

      //update del detalle perfil
      public function updateView() {
        // helper(['curl']);
        if($this->session->logged_in){
          if(!$this->request->getPost())
          {
            return redirect()->to(base_url('/listUsers'));
          }else{
        
              $post_endpoint = '/api/updateView';
              $request_data = [];
              // $request_data = (array("username" => $this->request->getPost('username'), "password" => $this->request->getPost('pass')));
              $request_data = $this->request->getPost();
             
              $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
              // var_dump($response);
              // echo json_encode($request_data);
                if($response->msg ){
                    echo json_encode($response->msg);
                
                }else{
                  echo json_encode(false);
                }
 
          }
        }
       
         
      }
      public function updateCreate() {
        // helper(['curl']);
        if($this->session->logged_in){
          if(!$this->request->getPost())
          {
            return redirect()->to(base_url('/listUsers'));
          }else{
        
              $post_endpoint = '/api/updateCreate';
              $request_data = [];
              // $request_data = (array("username" => $this->request->getPost('username'), "password" => $this->request->getPost('pass')));
              $request_data = $this->request->getPost();
             
              $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
              // var_dump($response);
              
                if($response->msg ){
                    echo json_encode($response->msg);
                
                }else{
                  echo json_encode(false);
                }
 
          }
        }
       
         
      }
      public function updateUpdate() {
        // helper(['curl']);
        if($this->session->logged_in){
          if(!$this->request->getPost())
          {
            return redirect()->to(base_url('/listUsers'));
          }else{
        
              $post_endpoint = '/api/updateUpdate';
              $request_data = [];
              // $request_data = (array("username" => $this->request->getPost('username'), "password" => $this->request->getPost('pass')));
              $request_data = $this->request->getPost();
             
              $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
              // var_dump($response);
              
                if($response->msg ){
                    echo json_encode($response->msg);
                
                }else{
                  echo json_encode(false);
                }
 
          }
        }
       
         
      }
      public function updateDelete() {
        // helper(['curl']);
        if($this->session->logged_in){
          if(!$this->request->getPost())
          {
            return redirect()->to(base_url('/listUsers'));
          }else{
        
              $post_endpoint = '/api/updateDelete';
              $request_data = [];
              // $request_data = (array("username" => $this->request->getPost('username'), "password" => $this->request->getPost('pass')));
              $request_data = $this->request->getPost();
             
              $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
              // var_dump($response);
              
                if($response->msg ){
                    echo json_encode($response->msg);
                
                }else{
                  echo json_encode(false);
                }
 
          }
        }
       
         
      }

      public function activos(){
       
        if($this->session->logged_in){
    
              return view('parametrizacion/activos');
         
        }else{
          return redirect()->to(base_url('/login'));
        }

      }

      //funciones para opcion activos
      public function getEmpresas(){
        if($this->session->logged_in){
          $get_endpoint = '/api/getEmpresas';

          $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
          if($response){
           
            echo json_encode($response);
          }
        }
      }
      public function getEmpresasByActivo(){
        if($this->session->logged_in){
          $get_endpoint = '/api/getEmpresasByActivo';

          $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
          if($response){
           
            echo json_encode($response);
          }
        }
      }
      public function addEmpresa() {
        // helper(['curl']);
        if($this->session->logged_in){
          if(!$this->request->getPost())
          {
            return redirect()->to(base_url('/activos'));
          }else{
        
              $post_endpoint = '/api/addEmpresa';
              $request_data = [];
               $request_data = $this->request->getPost();
             
              $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
              // var_dump($response);
              
                if($response->msg ){
                    echo json_encode($response->msg);
                
                }else{
                  echo json_encode(false);
                }
             
              
          
             
            
          }
        }
       
         
      }
      public function updateEmpresa() {
        // helper(['curl']);
        if($this->session->logged_in){
          if(!$this->request->getPost())
          {
            return redirect()->to(base_url('/activos'));
          }else{
        
              $post_endpoint = '/api/updateEmpresa';
              $request_data = [];
               $request_data = $this->request->getPost();
             
              $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
              // var_dump($response);
              
                if($response->msg ){
                    echo json_encode($response->msg);
                
                }else{
                  echo json_encode(false);
                }

          }
        }
       
         
      }
        //funciones para opcion activos
        public function getAreas(){
          if($this->session->logged_in){
            $get_endpoint = '/api/getAreas';
  
            $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
            if($response){
             
              echo json_encode($response);
            }
          }
        }
        public function addArea() {
          // helper(['curl']);
          if($this->session->logged_in){
            if(!$this->request->getPost())
            {
              return redirect()->to(base_url('/activos'));
            }else{
          
                $post_endpoint = '/api/addArea';
                $request_data = [];
                 $request_data = $this->request->getPost();
               
                $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
                // var_dump($response);
                
                  if($response->msg ){
                      echo json_encode($response->msg);
                  
                  }else{
                    echo json_encode(false);
                  }
               
                
            
               
              
            }
          }
         
           
        }
        public function updateArea() {
          // helper(['curl']);
          if($this->session->logged_in){
            if(!$this->request->getPost())
            {
              return redirect()->to(base_url('/activos'));
            }else{
          
                $post_endpoint = '/api/updateArea';
                $request_data = [];
                 $request_data = $this->request->getPost();
               
                $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
                // var_dump($response);
                
                  if($response->msg ){
                      echo json_encode($response->msg);
                  
                  }else{
                    echo json_encode(false);
                  }
  
            }
          }
         
           
        }
        public function getAreasEmpresa(){
          if($this->session->logged_in){
            $get_endpoint = '/api/getAreasEmpresa';
  
            $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
            if($response){
             
              echo json_encode($response);
            }
          }
        }
        public function addAreaEmpresa() {
          // helper(['curl']);
          if($this->session->logged_in){
            if(!$this->request->getPost())
            {
              return redirect()->to(base_url('/activos'));
            }else{
          
                $post_endpoint = '/api/addAreaEmpresa';
                $request_data = [];
                 $request_data = $this->request->getPost();
               
                $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
                // var_dump($response);
                
                  if($response->msg ){
                      echo json_encode($response->msg);
                  
                  }else{
                    echo json_encode(false);
                  }
               
                
            
               
              
            }
          }
         
           
        }
        public function updateAreaEmpresa() {
          // helper(['curl']);
          if($this->session->logged_in){
            if(!$this->request->getPost())
            {
              return redirect()->to(base_url('/activos'));
            }else{
          
                $post_endpoint = '/api/updateAreaEmpresa';
                $request_data = [];
                 $request_data = $this->request->getPost();
               
                $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
                // var_dump($response);
                
                  if($response->msg ){
                      echo json_encode($response->msg);
                  
                  }else{
                    echo json_encode(false);
                  }
  
            }
          }
         
           
        }
          //--------------------------------------------------------      
      public function getValorActivo(){
        if($this->session->logged_in){
          $get_endpoint = '/api/getValorActivo';

          $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
          if($response){
           
            echo json_encode($response);
          }
        }
      }

      public function addValorActivo() {
        // helper(['curl']);
        if($this->session->logged_in){
          if(!$this->request->getPost())
          {
            return redirect()->to(base_url('/activos'));
          }else{
        
              $post_endpoint = '/api/addValorActivo';
              $request_data = [];
               $request_data = $this->request->getPost();
             
              $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
              // var_dump($response);
              
                if($response->msg ){
                    echo json_encode($response->msg);
                
                }else{
                  echo json_encode(false);
                }
             
              
          
             
            
          }
        }
       
         
      }
      public function updateValorActivo() {
        // helper(['curl']);
        if($this->session->logged_in){
          if(!$this->request->getPost())
          {
            return redirect()->to(base_url('/activos'));
          }else{
        
              $post_endpoint = '/api/updateValorActivo';
              $request_data = [];
               $request_data = $this->request->getPost();
             
              $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
              // var_dump($response);
              
                if($response->msg ){
                    echo json_encode($response->msg);
                
                }else{
                  echo json_encode(false);
                }

          }
        }
       
         
      }

      public function getTipoActivo(){
        if($this->session->logged_in){
          $get_endpoint = '/api/getTipoActivo';

          $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
          if($response){
           
            echo json_encode($response);
          }
        }
      }
      public function addTipoActivo() {
        // helper(['curl']);
        if($this->session->logged_in){
          if(!$this->request->getPost())
          {
            return redirect()->to(base_url('/activos'));
          }else{
        
              $post_endpoint = '/api/addTipoActivo';
              $request_data = [];
               $request_data = $this->request->getPost();
             
              $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
              // var_dump($response);
              
                if($response->msg ){
                    echo json_encode($response->msg);
                
                }else{
                  echo json_encode(false);
                }
             
              
          
             
            
          }
        }
       
         
      }
      public function updateTipoActivo() {
        // helper(['curl']);
        if($this->session->logged_in){
          if(!$this->request->getPost())
          {
            return redirect()->to(base_url('/activos'));
          }else{
        
              $post_endpoint = '/api/updateTipoActivo';
              $request_data = [];
               $request_data = $this->request->getPost();
             
              $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
              // var_dump($response);
              
                if($response->msg ){
                    echo json_encode($response->msg);
                
                }else{
                  echo json_encode(false);
                }

          }
        }
       
         
      }

      public function getClasInformacion(){
        if($this->session->logged_in){
          $get_endpoint = '/api/getClasInformacion';

          $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
          if($response){
           
            echo json_encode($response);
          }
        }
      }
      public function addClasInformacion() {
        // helper(['curl']);
        if($this->session->logged_in){
          if(!$this->request->getPost())
          {
            return redirect()->to(base_url('/activos'));
          }else{
        
              $post_endpoint = '/api/addClasInformacion';
              $request_data = [];
               $request_data = $this->request->getPost();
             
              $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
              // var_dump($response);
              
                if($response->msg ){
                    echo json_encode($response->msg);
                
                }else{
                  echo json_encode(false);
                }
             
              
          
             
            
          }
        }
       
         
      }
      public function updateClasInformacion() {
        // helper(['curl']);
        if($this->session->logged_in){
          if(!$this->request->getPost())
          {
            return redirect()->to(base_url('/activos'));
          }else{
        
              $post_endpoint = '/api/updateClasInformacion';
              $request_data = [];
               $request_data = $this->request->getPost();
             
              $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
              // var_dump($response);
              
                if($response->msg ){
                    echo json_encode($response->msg);
                
                }else{
                  echo json_encode(false);
                }

          }
        }
       
         
      }

      public function riesgos(){
        $count_scene_1 = 0;
        if($this->session->logged_in){
          $get_endpoint = '/api/getProbabilidadRiesgo/1';
          $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
          if($response){
            $count_scene_1 = count($response->data);
          }
          $get_endpoint = '/api/getProbabilidadRiesgo/2';
          $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
          if($response){
            $count_scene_2 = count($response->data);
          }
          $get_endpoint = '/api/getImpactoRiesgo/1';
          $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
          if($response){
            $count_scene_1_impacto = count($response->data);
          }
          $get_endpoint = '/api/getImpactoRiesgo/2';
          $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
          if($response){
            $count_scene_2_impacto = count($response->data);
          }
          $get_endpoint = '/api/getTiposAmenaza';
          $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
          if($response){
            $tipo_amenaza = $response->data;
          }
        }
        return view('parametrizacion/riesgos',[
          'count_scene_1' => $count_scene_1,
          'count_scene_2' => $count_scene_2,
          'count_scene_1_impacto' => $count_scene_1_impacto,
          'count_scene_2_impacto' => $count_scene_2_impacto,
          'tipos_amenaza' => $tipo_amenaza
        ]);
      } 
  }