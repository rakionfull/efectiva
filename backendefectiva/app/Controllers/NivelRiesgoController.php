<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NivelRiesgo;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class NivelRiesgoController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        try {
            $model = new NivelRiesgo();
            $response = [
                'data' => $model->findAll()
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

    public function show($id){
        try {
            $model = new NivelRiesgo();
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

    public function store(){
        $rules = [
            "operador1" => 'required',
            "valor1" => 'required',
            "operador2" => 'required',
            "valor2" => 'required',
            'descripcion' => 'required',
            'color' => 'required',
            'estado' => 'required',
            'comentario' => 'required'
        ];
        $errors = [
            "operador1" => [
                'required' => 'Debe ingrear el operador 1'
            ],
            "operador2" => [
                'required' => 'Debe ingrear el operador 2'
            ],
            "valor1" => [
                'required' => 'Debe ingrear el valor 1'
            ],
            "valor2" => [
                'required' => 'Debe ingrear el valor 2'
            ],
            "color" => [
                'required' => 'Debe ingrear el color'
            ],
            'descripcion' => [
                'required' => 'Debe ingresar la descripcion'
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
        $model = new NivelRiesgo();
        $result = $model->insert($input);
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
    }
    public function update($id){
        $rules = [
            "operador1" => 'required',
            "valor1" => 'required',
            "operador2" => 'required',
            "valor2" => 'required',
            'descripcion' => 'required',
            'color' => 'required',
            'estado' => 'required',
            'comentario' => 'required'
        ];
        $errors = [
            "operador1" => [
                'required' => 'Debe ingrear el operador 1'
            ],
            "operador2" => [
                'required' => 'Debe ingrear el operador 2'
            ],
            "valor1" => [
                'required' => 'Debe ingrear el valor 1'
            ],
            "valor2" => [
                'required' => 'Debe ingrear el valor 2'
            ],
            "color" => [
                'required' => 'Debe ingrear el color'
            ],
            'descripcion' => [
                'required' => 'Debe ingresar la descripcion'
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
        $model = new NivelRiesgo();
        $result = $model->update($id,$input);
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
    }

    public function destroy($id){
        try {
            $model = new NivelRiesgo();
            $result = $model->delete($id);
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
