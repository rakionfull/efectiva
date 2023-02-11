<?php

namespace App\Controllers;

use App\Models\TipoRiesgo;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class TipoRiesgosController extends BaseController
{
    use ResponseTrait;

    public function index(){
        try {
            $model = new TipoRiesgo();
            $response = [
                'data' =>  $model->getAll(),
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
            $model = new TipoRiesgo();
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
            'tipo_riesgo' => 'required|is_unique[tipo_riesgo.tipo_riesgo]',
            'descripcion' => 'required',
            'estado' => 'required'
        ];
        $errors = [
            'tipo_riesgo' => [
                'required' => 'Debe ingresar el tipo de riesgo',
                'is_unique' => 'El campo tipo de riesgo debe ser único'
            ],
            'descripcion' => [
                'required' => 'Debe ingresar la descripcion'
            ],
            'estado' => [
                'required' => 'Debe ingresar el estado'
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

        $model = new TipoRiesgo();
        $result = $model->store($input);
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
    }

    public function update(){
        $input = $this->getRequestInput($this->request);

      
        $model = new TipoRiesgo();
        $result = $model->edit($input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
    }

    public function destroy($id){
        try {
            $model = new TipoRiesgo();
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