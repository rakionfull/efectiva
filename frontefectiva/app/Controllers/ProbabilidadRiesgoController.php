<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProbabilidadRiesgoController extends BaseController
{
    public function getProbabilidadRiesgo($scene){
        if($this->session->logged_in){
          $get_endpoint = '/api/getProbabilidadRiesgo/'.$scene;
          $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
          if($response){
            echo json_encode($response);
          }
        }
      }
      public function showProbabilidadRiesgo($id){
        if($this->session->logged_in){
          $get_endpoint = '/api/showProbabilidadRiesgo/'.$id;
          $response =perform_http_request('GET', REST_API_URL . $get_endpoint,[]);
          if($response){
            echo json_encode($response);
          }
        }
      }
      public function addProbabilidadRiesgo1(){
        if($this->session->logged_in){
          if(!$this->request->getPost()){
            return redirect()->to(base_url('/riesgos'));
          }else{
            $post_endpoint = '/api/addProbabilidadRiesgo1';
            $request_data = [];
            $request_data = $this->request->getPost();
            $request_data['escenario'] = "1";
            $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
            if($response->msg ){
                echo json_encode($response->msg);
            }else{
              echo json_encode(false);
            }
          }
        }
      }
      public function addProbabilidadRiesgo2(){
        if($this->session->logged_in){
          if(!$this->request->getPost()){
            return redirect()->to(base_url('/riesgos'));
          }else{
            $post_endpoint = '/api/addProbabilidadRiesgo2';
            $request_data = [];
            $request_data = $this->request->getPost();
            $request_data['escenario'] = "2";
            $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
            if($response->msg ){
                echo json_encode($response->msg);
            }else{
              echo json_encode(false);
            }
          }
        }
      }

      public function updateProbabilidadRiesgo1(){
        if($this->session->logged_in){
          if(!$this->request->getPost())
          {
            return redirect()->to(base_url('/riesgos'));
          }else{
            $post_endpoint = '/api/updateProbabilidadRiesgo1';
            $request_data = [];
            $request_data = $this->request->getPost();
            $request_data['escenario'] = "1";
            $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
            if($response->msg ){
              echo json_encode($response->msg);
            }else{
              echo json_encode(false);
            }
          }
        }
       
      }
      public function updateProbabilidadRiesgo2(){
        if($this->session->logged_in){
          if(!$this->request->getPost())
          {
            return redirect()->to(base_url('/riesgos'));
          }else{
            $post_endpoint = '/api/updateProbabilidadRiesgo2';
            $request_data = [];
            $request_data = $this->request->getPost();
            $request_data['escenario'] = "2";
            $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
            if($response->msg ){
              echo json_encode($response->msg);
            }else{
              echo json_encode(false);
            }
          }
        }
       
      }

      public function deleteProbabilidadRiesgo($id){
        if($this->session->logged_in){
            $post_endpoint = '/api/deleteProbabilidadRiesgo/'.$id;
            $response = (perform_http_request('DELETE', REST_API_URL . $post_endpoint,[]));
            if($response->msg ){
              echo json_encode($response->msg);
            }else{
              echo json_encode(false);
            }
        }
      }
}
