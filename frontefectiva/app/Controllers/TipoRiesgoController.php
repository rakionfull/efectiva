<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TipoRiesgoController extends BaseController
{
    public function getTipoRiesgos()
    {
        if ($this->session->logged_in) {
            $get_endpoint = '/api/getTipoRiesgos';
            $response = perform_http_request('GET', REST_API_URL . $get_endpoint, []);
            if ($response) {
                echo json_encode($response);
            }
        }
    }
    public function showTipoRiesgo($id)
    {
        if ($this->session->logged_in) {
            $get_endpoint = '/api/showTipoRiesgo/' . $id;
            $response = perform_http_request('GET', REST_API_URL . $get_endpoint, []);
            if ($response) {
                echo json_encode($response);
            }
        }
    }

    public function addTipoRiesgo()
    {
        if ($this->session->logged_in) {
            if (!$this->request->getPost()) {
                return redirect()->to(base_url('/riesgos'));
            } else {
                $post_endpoint = '/api/addTipoRiesgo';
                $request_data = [];
                $request_data = $this->request->getPost();
                $response = (perform_http_request('POST', REST_API_URL . $post_endpoint, $request_data));
                if ($response->msg) {
                    echo json_encode($response->msg);
                } else {
                    echo json_encode(false);
                }
            }
        }
    }

    public function updateTipoRiesgo()
    {
        if ($this->session->logged_in) {
            if (!$this->request->getPost()) {
                return redirect()->to(base_url('/riesgos'));
            } else {

                $post_endpoint = '/api/updateTipoRiesgo';
                $request_data = [];
                $request_data = $this->request->getPost();

                $response = (perform_http_request('POST', REST_API_URL . $post_endpoint, $request_data));
                // var_dump($response);

                if ($response->msg) {
                    echo json_encode($response->msg);
                } else {
                    echo json_encode(false);
                }
            }
        }
    }

    public function deleteTipoRiesgo($id)
    {
        if ($this->session->logged_in) {
            $post_endpoint = '/api/deleteTipoRiesgo/' . $id;
            $response = (perform_http_request('DELETE', REST_API_URL . $post_endpoint, []));
            if ($response->msg) {
                echo json_encode($response->msg);
            } else {
                echo json_encode(false);
            }
        }
    }
}
