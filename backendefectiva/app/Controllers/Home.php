<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Muser;
use App\Models\MconfigPass;
use App\Models\Mperfil;
use App\Models\Mcaptcha;
use App\Models\Mempresa;
use App\Models\Marea;
use App\Models\MclasInformacion;
use App\Models\Mtipoactivo;
use App\Models\Mvaloractivo;
use App\Models\MaspectoSeg;
use App\Models\Munidades;
use App\Models\Mmacroprocesos;
use App\Models\MProceso;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Libraries\Capcha;
use Exception;
use ReflectionException;

class Home extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        return view('welcome_message');
    }
    public function dashboard(){
        $response = [
            'msg' => 'Bienvenido a la aplicación de Efectiva',
        ];
        return $this->respond($response, ResponseInterface::HTTP_OK);

    }
    public function getUsers(){

        try {
            $model = new Muser();
            $input = $this->getRequestInput($this->request);
                $response = [
                    
                    'data' =>  $model->getUsers($input),
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
        
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_OK
                );
        }

           
    }
    public function getUser($id){

        try {
            $model = new Muser();
                $response = [
                    'msg' => 'estos son los usuarios',
                    'datos' =>  $model->getUserbyId($id),
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
        
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_OK
                );
        }

           
    }
    public function addUser()
    {
        $rules = [
            'docident_us' => 'required|min_length[8]|max_length[8]|is_unique[tb_users.docident_us]',
            'nombres_us' => 'required|min_length[2]|max_length[50]',
            'apepat_us' => 'required|min_length[2]|max_length[50]',
            'apemat_us' => 'required|min_length[2]|max_length[50]',
            'email_us' => 'min_length[2]|max_length[50]|valid_email|is_unique[tb_users.email_us]',
            'usuario_us' => 'required|min_length[5]|max_length[50]|is_unique[tb_users.usuario_us]',
            'passw' => 'required|min_length[8]|validatePass[passw]',
            'perfil_us' => 'required',
        ];
        $errors = [
            'docident_us' => [
                'required' => 'Debe ingresar DNI',
                'is_unique' => 'El campo DNI debe ser único'
            ],
            'nombres_us' => [
                'required' => 'Debe ingresar Nombres',
              
            ],
            'apemat_us' => [
                'required' => 'Debe ingresar Apellido Paterno',
              
            ],
            'apepat_us' => [
                'required' => 'Debe ingresar Apellido Paterno',
              
            ],
            'email_us' => [
                'required' => 'Debe ingresar Correo',
                'is_unique' => 'El campo correo debe ser único'
            ],
            'usuario_us' => [
                'required' => 'Debe ingresar Usuario',
                'is_unique' => 'El campo usuario debe ser único'
            ],
            'perfil_us' => [
                'required' => 'Debe Seleccionar una opcion',
                
            ],
            'passw' => [
                'required' => 'Debe ingresar Contraseña',     
                'min_length' => 'La clave debe tener como minimo 8 carácteres',  
                'validatePass' => 'La clave debe contener 1 May, 1 Min , 1 Núm y 1 Caract. especial',  
            ]
        ];
        
        $input = $this->getRequestInput($this->request);

        if (!$this->validateRequest($input, $rules, $errors)) {
            $error = [
                'error' => 'valida',
                'datos' => $this->validator->getErrors()
            ];
            return ($this->getResponse($error,ResponseInterface::HTTP_OK));
            // return $this->getResponse(
            //         $this->validator->getErrors(),
            //         ResponseInterface::HTTP_OK
            //     );
        }

        $model = new Muser();
        $result = $model->saveUser($input);
        $id=$model->lastid();
        $datos = array(
            'pass_cl' => hashPass($input['passw']),
            'id_us' =>$id,
        );
        $model->savePass($datos);
        return $this->getResponse(
            [
                'user' =>  $result
            ]
        );
      
        
    }
    public function updateUser($id)
    {
        
        // $rules = [
        //     'docident_us' => 'required|min_length[8]|max_length[8]',
        //     'nombres_us' => 'required|min_length[2]|max_length[50]',
        //     'apepat_us' => 'required|min_length[2]|max_length[50]',
        //     'apemat_us' => 'required|min_length[2]|max_length[50]',
        //     'email_us' => 'min_length[2]|max_length[50]|valid_email',
        //     'usuario_us' => 'required|min_length[5]|max_length[50]',
        //     // 'passw' => 'required|min_length[8]|validatePass[passw]',
        //     'perfil_us' => 'required',
        //     'estado_us' => 'required',
        // ];
        // $errors = [
        //     'docident_us' => [
        //         'required' => 'Debe ingresar DNI',
                
        //     ],
        //     'nombres_us' => [
        //         'required' => 'Debe ingresar Nombres',
              
        //     ],
        //     'apemat_us' => [
        //         'required' => 'Debe ingresar Apellido Paterno',
              
        //     ],
        //     'apepat_us' => [
        //         'required' => 'Debe ingresar Apellido Paterno',
              
        //     ],
        //     'email_us' => [
        //         'required' => 'Debe ingresar Correo',
                
        //     ],
        //     'usuario_us' => [
        //         'required' => 'Debe ingresar Usuario',
                
        //     ],
        //     'perfil_us' => [
        //         'required' => 'Debe Seleccionar una opcion',
                
        //     ],
        //     'estado_us' => [
        //         'required' => 'Debe Seleccionar una opcion',
                
        //     ],
        //     // 'passw' => [
        //     //     'required' => 'Debe ingresar Contraseña',     
        //     //     'min_length' => 'La clave debe tener como minimo 8 carácteres',  
        //     //     'validatePass' => 'La clave debe contener 1 May, 1 Min , 1 Núm y 1 Caract. especial',  
        //     // ]
        // ];
        
        $input = $this->getRequestInput($this->request);

        // if (!$this->validateRequest($input, $rules)) {
        //     $error = [
        //         'error' => 'valida',
        //         'datos' => $this->validator->getErrors()
        //     ];
        //     return ($this->getResponse($error,ResponseInterface::HTTP_OK));
        // }

        $model = new Muser();
        $result = $model->updateUser($input,$id);
       
        return $this->getResponse(
            [
                'user' =>  $result
            ]
        );
      
        
    }
    public function updateEstadoUser(){
        $input = $this->getRequestInput($this->request);

    
        $model = new Muser();
        $result = $model->updateEstadoUser($input);
       
        return $this->getResponse(
            [
                'user' =>  $result
            ]
        );
    }
    public function deleteUser($id){
        $model = new Muser();
        $result = $model->deleteUser($id);
       
        return $this->getResponse(
            [
                'user' =>  $result
            ]
        );
    }
    public function getPerfiles(){

        try {
            $model = new Mperfil();
            $input = $this->getRequestInput($this->request);
                $response = [
                    'data' =>  $model->getPerfiles($input)
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
        
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_OK
                );
        }

           
    }
    public function addPerfil()
    {
   
        
        $input = $this->getRequestInput($this->request);

      
        $model = new Mperfil();
        $result = $model->savePerfil($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function updatePerfil()
    {
   
        
        $input = $this->getRequestInput($this->request);

      
        $model = new Mperfil();
        $result = $model->updatePerfil($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function deletePerfil()
    {
   
        
        $input = $this->getRequestInput($this->request);

      
        $model = new Mperfil();
        $result = $model->deletePerfil($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function getDetPerfil(){

        try {
            $model = new Mperfil();
            $input = $this->getRequestInput($this->request);
                $response = [
                    'data' =>  $model->getDetPerfil($input)
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
        
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_OK
                );
        }

           
    }
    public function getModulos(){

        try {
            $model = new Mperfil();
            $input = $this->getRequestInput($this->request);
                $response = [
                    'data' =>  $model->getModulo($input)
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
        
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_OK
                );
        }

           
    }
    public function getOpcion(){

        try {
            $model = new Mperfil();
            $input = $this->getRequestInput($this->request);
                $response = [
                    'data' =>  $model->getOpcion($input)
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
        
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_OK
                );
        }

           
    }
    public function getItem(){

        try {
            $model = new Mperfil();
            $input = $this->getRequestInput($this->request);
                $response = [
                    'data' =>  $model->getItem($input)
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
        
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_OK
                );
        }

           
    }
    public function updateView()
    {
   
        
        $input = $this->getRequestInput($this->request);

      
        $model = new Mperfil();
        $result = $model->updateDetPer($input,'view_det');
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function updateCreate()
    {
   
        
        $input = $this->getRequestInput($this->request);

      
        $model = new Mperfil();
        $result = $model->updateDetPer($input,'create_det');
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function updateUpdate()
    {
   
        
        $input = $this->getRequestInput($this->request);

      
        $model = new Mperfil();
        $result = $model->updateDetPer($input,'update_det');
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function updateDelete()
    {
   
        
        $input = $this->getRequestInput($this->request);

      
        $model = new Mperfil();
        $result = $model->updateDetPer($input,'delete_det');
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function getEmpresas(){

        try {
            $model = new Mempresa();
                $response = [
                    'data' =>  $model->getEmpresas()
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
        
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_OK
                );
        }

           
    }
    public function getEmpresasByActivo(){

        try {
            $model = new Mempresa();
                $response = [
                    'data' =>  $model->getEmpresasByActivo()
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
        
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_OK
                );
        }

           
    }
    public function addEmpresa()
    {
   
        
        $input = $this->getRequestInput($this->request);

      
        $model = new Mempresa();
        $result = $model->saveEmpresa($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function updateEmpresa()
    {
   
        
        $input = $this->getRequestInput($this->request);

      
        $model = new Mempresa();
        $result = $model->updateEmpresa($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function getAreas(){

        try {
            $model = new Marea();
                $response = [
                    'data' =>  $model->getAreas()
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
        
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_OK
                );
        }

           
    }
    public function addArea()
    {
   
        
        $input = $this->getRequestInput($this->request);

      
        $model = new Marea();
        $result = $model->saveArea($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function updateArea()
    {
   
        
        $input = $this->getRequestInput($this->request);

      
        $model = new Marea();
        $result = $model->updateArea($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function getAreasEmpresa(){

        try {
            $model = new Marea();
                $response = [
                    'data' =>  $model->getAreasEmpresa()
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
        
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_OK
                );
        }

           
    }
    public function addAreaEmpresa()
    {
   
        
        $input = $this->getRequestInput($this->request);

      
        $model = new Marea();
        $result = $model->saveAreaEmpresa($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function updateAreaEmpresa()
    {
   
        
        $input = $this->getRequestInput($this->request);

      
        $model = new Marea();
        $result = $model->updateAreaEmpresa($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function addConfigPass()
    {
        $rules = [
            'duracion' => 'required|is_natural',
            'sesion' => 'required|is_natural',
            'inactividad' => 'required|is_natural',
            'intentos' => 'required|is_natural',
            'tama_min' => 'required|is_natural',
            'tama_max' => 'required|is_natural',
                       
        ];
        $errors = [
            'duracion' => [
                'required' => 'Debe ingresar valor',
               
            ],
            'sesion' => [
                'required' =>'Debe ingresar valor',
              
            ],
            'inactividad' => [
                'required' =>'Debe ingresar valor',
              
            ],
            
            'intentos' => [
                'required' => 'Debe ingresar valor',
             
            ],
            'tama_min' => [
                'required' => 'Debe ingresar valor',
             
            ],
            'tama_max' => [
                'required' => 'Debe ingresar valor',
             
            ],
        
            
        ];
        
        $input = $this->getRequestInput($this->request);

        if (!$this->validateRequest($input, $rules, $errors)) {
            $error = [
                'error' => 'valida',
                'datos' => $this->validator->getErrors()
            ];
            return ($this->getResponse($error,ResponseInterface::HTTP_OK));
          
        }

        $model = new MconfigPass();
        $result = $model->updateConfigPass($input);
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function getConfigPass(){

        try {
            $model = new MconfigPass();
                $response = [
                    'data' =>  $model->getConfigPass()
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
        
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_OK
                );
        }

           
    }
      //------------------------------------------------------------------------------

      public function getValorActivo(){

        try {
            $model = new Mvaloractivo();
                $response = [
                    'data' =>  $model->getValorActivo()
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
        
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_OK
                );
        }

           
    }

    public function addValorActivo()
    {
   
        
        $input = $this->getRequestInput($this->request);

      
        $model = new Mvaloractivo();
        $result = $model->saveValorActivo($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function updateValorActivo()
    {
   
        
        $input = $this->getRequestInput($this->request);

      
        $model = new Mvaloractivo();
        $result = $model->updateValorActivo($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }

    public function getTipoActivo(){

        try {
            $model = new Mtipoactivo();
                $response = [
                    'data' =>  $model->getTipoActivo()
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
        
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_OK
                );
        }

           
    }
    public function addTipoActivo()
    {
   
        
        $input = $this->getRequestInput($this->request);

      
        $model = new Mtipoactivo();
        $result = $model->saveTipoActivo($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function updateTipoActivo()
    {
   
        
        $input = $this->getRequestInput($this->request);

      
        $model = new Mtipoactivo();
        $result = $model->updateTipoActivo($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }

    public function getClasInformacion(){

        try {
            $model = new MclasInformacion();
                $response = [
                    'data' =>  $model->getClasInformacion()
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
        
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_OK
                );
        }

           
    }
    public function addClasInformacion()
    {
   
        
        $input = $this->getRequestInput($this->request);

      
        $model = new MclasInformacion();
        $result = $model->saveClasInformacion($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function updateClasInformacion()
    {
   
        
        $input = $this->getRequestInput($this->request);

      
        $model = new MclasInformacion();
        $result = $model->updateClasInformacion($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }

    public function getAspectoSeg(){

        try {
            $model = new MaspectoSeg();
                $response = [
                    'data' =>  $model->getAspectoSeg()
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
        
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_OK
                );
        }

           
    }
    public function addAspectoSeg()
    {
           
        $input = $this->getRequestInput($this->request);

      
        $model = new MaspectoSeg();
        $result = $model->saveAspectoSeg($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function updateAspectoSeg()
    {
           
        $input = $this->getRequestInput($this->request);

      
        $model = new MaspectoSeg();
        $result = $model->updateAspectoSeg($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }

    public function getUnidades(){

        try {
            $model = new Munidades();
                $response = [
                    'data' =>  $model->getUnidades()
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
        
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_OK
                );
        }

           
    }
    public function addUnidades()
    {
           
        $input = $this->getRequestInput($this->request);

      
        $model = new Munidades();
        $result = $model->saveUnidades($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function updateUnidades()
    {
           
        $input = $this->getRequestInput($this->request);

      
        $model = new Munidades();
        $result = $model->updateUnidades($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    
    
    public function getMacroproceso(){

        try {
            $model = new Mmacroprocesos();
                $response = [
                    'data' =>  $model->getMacroproceso()
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
        
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_OK
                );
        }

           
    }
    public function addMacroproceso()
    {
           
        $input = $this->getRequestInput($this->request);

      
        $model = new Mmacroprocesos();
        $result = $model->saveMacroproceso($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function updateMacroproceso()
    {
           
        $input = $this->getRequestInput($this->request);

      
        $model = new Mmacroprocesos();
        $result = $model->updateMacroproceso($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }

    public function getProceso(){

        try {
            $model = new Mproceso();
                $response = [
                    'data' =>  $model->getProceso()
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
        
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_OK
                );
        }

           
    }
    public function addProceso()
    {
           
        $input = $this->getRequestInput($this->request);

      
        $model = new Mproceso();
        $result = $model->saveProceso($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
    public function updateProceso()
    {
           
        $input = $this->getRequestInput($this->request);

      
        $model = new Mproceso();
        $result = $model->updateProceso($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
      
        
    }
}
