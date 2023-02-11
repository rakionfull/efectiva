<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DescripcionAmenaza;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class DescripcionAmenazaController extends BaseController
{
    use ResponseTrait;

    public function index(){
        try {
            $model = new DescripcionAmenaza();
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
            $model = new DescripcionAmenaza();
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
            'idtipo_amenaza' => 'required',
            'amenaza' => 'required',
        ];
        $errors = [
            'idtipo_amenaza' => [
                'required' => 'Debe ingresar el id del tipo de amenaza',
            ],
            'amenaza' => [
                'required' => 'Debe ingresar la amenaza'
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

        $model = new DescripcionAmenaza();
        $result = $model->insert($input);
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
    }

    public function update($id){
        $input = $this->getRequestInput($this->request);

        $model = new DescripcionAmenaza();
        $result = $model->update($id,$input);
    
        return $this->getResponse(
            [
                'msg' =>  $result
            ]
        );
    }

    public function destroy($id){
        try {
            $model = new DescripcionAmenaza();
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