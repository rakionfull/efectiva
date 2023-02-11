<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Muser;
use App\Models\Mperfil;
use App\Models\Msesiones;
use App\Models\MconfigPass;
use App\Models\Mcaptcha;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Libraries\Capcha;
use Exception;
use ReflectionException;

class Login extends BaseController
{
    use ResponseTrait;
 
    public function index()
    {
       
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]',
            'password' => 'required|min_length[6]|max_length[255]|validateUser[username, password]'
        ];

        $errors = [
            // 'username' => [
            //     'validateUser' => 'Usuario Incorrecto'
            // ],
            'password' => [
                'validateUser' => 'Credenciales Incorrectas'
            ]
        ];

        $input = $this->getRequestInput($this->request);

        $modelsUser = new Muser();

        $intento =  $modelsUser -> getIntento($input['username']);

        $time_actual = time();
       
        if($time_actual > $intento -> bloqueo_time){

            if (!$this->validateRequest($input, $rules, $errors)) {
               
    
                $intento =  $modelsUser -> getIntento($input['username']);
    
                $modelsUser -> setIntento($input['username'],$intento->intentos_us);
        
                $modelConfigPass = new MconfigPass();
    
                $configuracion = $modelConfigPass -> getConfigPass();
    
                if($intento->intentos_us  >= $configuracion[0]['intentos']){
                    //si llega al maximo de intentos mandar error y actualizar tb_user con el tiempo para desabilitar
                    $modelsUser -> setTimeIntento($input['username']);
                    // $error = new  \stdClass;
                    // $error->password = 'Se ha intentato '.$configuracion[0]['intentos'].' veces, el usuario se dabilitará por 
                    // 2 min';
                    $error = ['password' => 'Se ha intentato '.$configuracion[0]['intentos'].' veces, el usuario se dabilitará por 
                    2 min'];
                }else{
                    $error = $this->validator->getErrors();
                }
               
    
                return $this->getResponse(
                        $error, ResponseInterface::HTTP_OK
                        // ResponseInterface::HTTP_BAD_REQUEST
                    );
            }
          
            return $this->getJWTForUser($input["username"]);
        }else{
            // $error = new  \stdClass;
            $modelsUser -> setIntento($input['username'],0);
        
            // $error->password = 'El usuario esta dabilitado por 2 min';
            $error = ['password' => 'El usuario esta dabilitado por 2 min'];
            return $this->getResponse(
                $error, ResponseInterface::HTTP_OK
                // ResponseInterface::HTTP_BAD_REQUEST
            );
        }
        
        
    
       

    }
    public function newCaptcha(){
        
        $captcha = new Capcha();
        $Mcaptcha = new Mcaptcha();   
        $newCaptcha= $captcha->CreaCaptcha(180,50,180);
        $captchaword = $newCaptcha['word'];
        $query=$Mcaptcha->saveCaptcha($newCaptcha, $this->request->getIPAddress());
       
        $response = [
            'image' => $newCaptcha["image"],
            'captcha' => $newCaptcha["word"],
  
        ];
        return $this->respond($response, ResponseInterface::HTTP_OK);
    }
    public function validaCaptcha(){
     
      
            // funcion para validar el captcha 
            $Mcaptcha = new Mcaptcha();   
            $expiration = time() - 3*60; //limite de 3 minutos
            $ip = $this->request->getIPAddress(); //ip del usuario
            $captcha = $this->request->getVar('captcha'); //captcha introducido por el user
            //eliminanos los captcha con mas de 2 mintos de vida
            $Mcaptcha->deleteOldCaptcha($expiration);

            //comprobamos si es correcta la imagen introducida
            $last = $Mcaptcha->check($ip,$expiration,$captcha);

            // validacion del capcha
            if(count($last) == 1)
            {
                $response = [
                    'msg' => 1  
                ];
                return $this->respond($response, ResponseInterface::HTTP_OK);
                
            }else{
                return $this->respond(
                    [
                    'msg' => 0, 
                    'error' => 'Captcha Expirado',
                    ],
                    ResponseInterface::HTTP_OK
                );
            }
        
       
       
       
    }
    public function change_pass(){
        // $rules = [
        //     'passw' => 'required|min_length[8]|validatePass[passw]',
        //     'repassw' => 'required|min_length[8]|validatePass[repassw]'
        // ];

        // $errors = [
        //     // 'username' => [
        //     //     'validateUser' => 'Usuario Incorrecto'
        //     // ],
        //     'passw' => [
        //         'required' => 'Debe ingresar Contraseña',     
        //         'min_length' => 'La clave debe tener como minimo 8 carácteres',  
        //         'validatePass' => 'La clave debe contener 1 May, 1 Min , 1 Núm y 1 Caract. especial',  
        
        //     ],
        //     'repassw' => [
        //         'required' => 'Debe confirmar Contraseña',     
        //         'min_length' => 'La clave debe tener como minimo 8 carácteres',  
        //         'validatePass' => 'La clave debe contener 1 May, 1 Min , 1 Núm y 1 Caract. especial',  
        
        //     ]
        // ];

        $input = $this->getRequestInput($this->request);
        // if (!$this->validateRequest($input, $rules, $errors)) {

        //     $error = [
        //         'error' => 'valida',
        //         'datos' => $this->validator->getErrors()
        //     ];
        //     return ($this->getResponse($error,ResponseInterface::HTTP_OK));
          
        // }
        // creo un helper de validacion de claves
      
        $resultado =  validacionPassword($input);
        if($resultado == 1){
            
                //guardo la nueva clave
            $userModel = new Muser();
            $existe_pass = veriPass($input['passw'],$input['id_us']);
            if(!$existe_pass){
                $datos = array(
                    'pass_cl' => hashPass($input['passw']),
                    'id_us' =>$input['id_us'],
                );
                $userModel->savePass($datos);
                $result=$userModel->changePass($input['id_us']);
                $response = [
                    'dato' => $result,
                ];
            }else{
                $response = [
                    'error' => 'Ya ha utilizado esta contraseña, debe elegir otra',
                    // 'error' =>  'esto .'.$existe_pass,
                ];
            }

           
        }else{
            $response = [
                'error' => $resultado,
                
            ];
        }
          
       
        // }else{
            
        //}
        
       
        return $this->respond($response, ResponseInterface::HTTP_OK);
    }
    private function getJWTForUser(string $username,int $responseCode = ResponseInterface::HTTP_OK) 
    {
        //validamos si existe otra sesion activa en otro ordenador
        try {
            $model = new Muser();
            $modelPerfil = new Mperfil();

            $user = $model->getUser($username);
            unset($user->pass_cl);
            $iat = time();
            $modelSesion = new Msesiones();
            
            $sesion = $modelSesion->getByIdSesion($user->id_us,$iat);
            $modelConfig = new MconfigPass();
            $configuracion = $modelConfig ->getConfigPass();
            $model -> setIntento($username,0);

            if($sesion){
                $error = ['password' => 'Hay otra sesión Activa'];
                return $this->getResponse(
                    $error, ResponseInterface::HTTP_OK
                    // ResponseInterface::HTTP_BAD_REQUEST
                );
                
            }else{
                $recordatorio =  false;
                $fecha_actual = date('Y-m-d');
                $fecha_creacion = $user->creacion_cl;
                //sumo 10 dias ejem día
                $fecha_exp =  date("Y-m-d",strtotime($fecha_creacion."+ ".$configuracion[0]['duracion']." days")); 
                $fecha_recordatorio= date("Y-m-d",strtotime($fecha_exp."- ".$configuracion[0]['recordatorio']." days")); 
               
                $msg=1;
                $mensaje = '';
                if($fecha_actual > $fecha_exp){
                    $msg = 0;
                    $mensaje = 'Contraseña expirada, se redireccionara para cambio';
                }
                if($fecha_actual >= $fecha_recordatorio){
                    if($fecha_exp  > $fecha_recordatorio){
                   
                        $mensaje = 'Recordatorio: Su contraseña está a punto expirar';
                    }
                }
               
                helper('jwt');

                $token = [];
                $permisos = [];
                if($user->change_pass == 0){
                    $token = getSignedJWTForUser($username);
                    $msg=0;
                    $mensaje = 'Cambio de contrseña 1er logeo obligatorio';
                }else{
                    $token = getSignedJWTForUser($username);
                    $modelSesion->saveSesion($token, $user->id_us);
                    $permisos=$modelPerfil->getPermisos($user->perfil_us);
                }
                return $this->getResponse(
                        [
                            'password' => false,
                            // 'recordatorio' => $recordatorio,
                            'msg' => $mensaje,
                            'change' => $msg,
                            'user' => $user->usuario_us,
                            'id' => $user->id_us,
                            'permisos' => $permisos,
                            'access_token' => $token
                        ]
                );
               
            }
           
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    $responseCode
                );
        }
    }
    public function logout($id_us){
        $modelSesion = new Msesiones();
      
        $result=$modelSesion->updateLoged($id_us);
        $response = [
            'dato' => $result,
        ];

        return $this->respond($response, ResponseInterface::HTTP_OK);
    
    }
}

