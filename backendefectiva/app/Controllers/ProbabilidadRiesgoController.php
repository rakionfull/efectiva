<?php

namespace App\Controllers;

use App\Models\ProbabilidadRiesgo;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class ProbabilidadRiesgoController extends BaseController
{
    use ResponseTrait;

    public function index($scene)
    {
        try {
            $model = new ProbabilidadRiesgo();
            $response = [
                'data' =>  $model->getAll($scene),
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
    public function show($id){
        try {
            $model = new ProbabilidadRiesgo();
            $response = [
                'data' => $model->where('id',$id)->findAll()
            ];
            return $this->respond($response, ResponseInterface::HTTP_OK);
        } catch (\Throwable $th) {
            return $this->getResponse(
                [
                    'error' => $th->getMessage(),
                ],
                ResponseInterface::HTTP_OK
            );
        }
    }
    public function store_escenario_1(){
        $rules = [
            'descripcion' => 'required',
            'tipo_regla' => 'required',
            'tipo_valor' => 'required',
            'estado' => 'required',
            'comentario' => 'required'
        ];
        $errors = [
            'descripcion' => [
                'required' => 'Debe ingresar la descripcion'
            ],
            'tipo_regla' => [
                'required' => 'Debe ingresar el tipo de regla'
            ],
            'tipo_valor' => [
                'required' => 'Debe ingresar el tipo de valor'
            ],
            'estado' => [
                'required' => 'Debe ingresar el estado'
            ],
            'comentario' => [
                'required' => 'Debe ingresar el comentario'
            ]
        ];

        $input = $this->getRequestInput($this->request);
        if (!$this->validateRequest($input, $rules, $errors)) {
            $error = [
                'error' => 'validar',
                'datos' => $this->validator->getErrors()
            ];
            return ($this->getResponse($error,ResponseInterface::HTTP_OK));
        }

        $model = new ProbabilidadRiesgo();
        $count_escenario_2 = count($model->where('escenario','2')->findAll());
        if($count_escenario_2 > 0){
            return $this->getResponse(
                [
                    'msg' =>  "No se pude ingresar registros a otro escenario distinto"
                ]
            );
        }else{
            $result = $model->insert($input,false);
            return $this->getResponse(
                [
                    'msg' =>  $result
                ]
            );
        }
    }
    public function store_escenario_2(){
        try {
            $rules = [
                'descripcion' => 'required',
                'tipo_regla' => 'required',
                'tipo_valor' => 'required',
                'operador1' => 'required',
                'valor1' => 'required',
                'operador2' => 'required',
                'valor2' => 'required',
                'estado' => 'required',
                'comentario' => 'required'
            ];
            $errors = [
                'descripcion' => [
                    'required' => 'Debe ingresar la descripcion'
                ],
                'tipo_regla' => [
                    'required' => 'Debe ingresar el tipo de regla'
                ],
                'tipo_valor' => [
                    'required' => 'Debe ingresar el tipo de valor'
                ],
                'operador1' => [
                    'required' => 'Debe ingresar el operador 1'
                ],
                'valor1' => [
                    'required' => 'Debe ingresar el valor 1'
                ],
                'operador2' => [
                    'required' => 'Debe ingresar el operador 2'
                ],
                'valor2' => [
                    'required' => 'Debe ingresar el valor 2'
                ],
                'estado' => [
                    'required' => 'Debe ingresar el estado'
                ],
                'comentario' => [
                    'required' => 'Debe ingresar el comentario'
                ]
            ];

            $input = $this->getRequestInput($this->request);
            if (!$this->validateRequest($input, $rules, $errors)) {
                $error = [
                    'error' => 'validar',
                    'msg' => $this->validator->getErrors()
                ];
                return ($this->getResponse($error,ResponseInterface::HTTP_OK));
            }

            $model = new ProbabilidadRiesgo();
            $count_escenario_1 = count($model->where('escenario','1')->findAll());
            if($count_escenario_1 > 0){
                return $this->getResponse(
                    [
                        'msg' =>  "No se puede ingresar registros a otro escenario distinto"
                    ]
                );
            }else{
                $result = $model->insert($input,false);
                return $this->getResponse(
                    [
                        'msg' =>  $result
                    ]
                );
            }
        } catch (\Throwable $th) {
            return $this->getResponse(
                [
                    'msg' =>  $th->getMessage()
                ]
            );
        }
    }

    public function edit_escenario_1(){
        try {
            $input = $this->getRequestInput($this->request);

            $model = new ProbabilidadRiesgo();
            $result = $model->edit_1($input);
        
            return $this->getResponse(
                [
                    'msg' =>  $result
                ]
            );
        } catch (\Throwable $th) {
            return $this->getResponse(
                [
                    'msg' =>  $th->getMessage()
                ]
            );
        }
        
    }
    public function edit_escenario_2(){
        try {
            $input = $this->getRequestInput($this->request);
            $model = new ProbabilidadRiesgo();
            $result = $model->edit_2($input);
            return $this->getResponse(
                [
                    'msg' =>  $result
                ]
            );
        } catch (\Throwable $th) {
            return $this->getResponse(
                [
                    'msg' =>  $th->getMessage()
                ]
            );
        }
    }

    public function destroy($id){
        try {
            $model = new ProbabilidadRiesgo();
            $result = $model->destroy($id);
            return $this->getResponse(
                [
                    'msg' =>  $result
                ]
            );
        } catch (\Throwable $th) {
            return $this->getResponse(
                [
                    'msg' =>  'Ocurrio un error '.$th->getMessage()
                ]
            );
        }
    }

}
