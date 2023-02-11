<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriasVulnerabilidad;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class CategoriasVulnerabilidadController extends BaseController
{
    use ResponseTrait;

    public function index(){
        try {
            $model = new CategoriasVulnerabilidad();
            $response = [
                'data' =>  $model->findAll(),
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
            $model = new CategoriasVulnerabilidad();
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
            'categoria' => 'required|is_unique[categoria_vulnerabilidad.categoria]',
            'estado' => 'required',
        ];
        $errors = [
            'categoria' => [
                'required' => 'Debe ingresar la categoria de la vulnerabilidad',
                'is_unique' => 'Esta categoria de vulnerabilidad ya existe en nuestros registros',
            ],
            'estado' => [
                'required' => 'Debe ingresar el estado'
            ]
        ];

        $input = $this->getRequestInput($this->request);
        if (!$this->validateRequest($input, $rules, $errors)) {
            $error = [
                'error' => true,
                'msg' => $this->validator->getErrors()
            ];
            return ($this->getResponse($error,ResponseInterface::HTTP_OK));
        }

        $model = new CategoriasVulnerabilidad();
        $result = $model->insert($input);
        return $this->getResponse(
            [
                'error' => false,
                'msg' =>  $result
            ]
        );
    }

    public function update($id){
        $rules = [
            'categoria' => 'required|is_unique[categoria_vulnerabilidad.categoria]',
            'estado' => 'required',
        ];
        $errors = [
            'categoria' => [
                'required' => 'Debe ingresar la categoria de la vulnerabilidad',
                'is_unique' => 'Esta categoria de vulnerabilidad ya existe en nuestros registros',
            ],
            'estado' => [
                'required' => 'Debe ingresar el estado'
            ]
        ];

        $input = $this->getRequestInput($this->request);
        if (!$this->validateRequest($input, $rules, $errors)) {
            $error = [
                'error' => true,
                'msg' => $this->validator->getErrors()
            ];
            return ($this->getResponse($error,ResponseInterface::HTTP_OK));
        }

        $model = new CategoriasVulnerabilidad();
        $result = $model->update($id,$input);
        
        return $this->getResponse(
            [
                'error' => false,
                'msg' =>  $result
            ]
        );
    }

    public function destroy($id){
        try {
            $model = new CategoriasVulnerabilidad();
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
