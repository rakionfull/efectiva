<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CategoriasVulnerabilidadController extends BaseController
{
    public function getCategoriasVulnerabilidad()
    {
        if ($this->session->logged_in) {
            $get_endpoint = '/api/getCategoriasVulnerabilidad';
            $response = perform_http_request('GET', REST_API_URL . $get_endpoint, []);
            if ($response) {
                echo json_encode($response);
            }
        }
    }
    public function showCategoriasVulnerabilidad($id)
    {
        if ($this->session->logged_in) {
            $get_endpoint = '/api/showCategoriasVulnerabilidad/' . $id;
            $response = perform_http_request('GET', REST_API_URL . $get_endpoint, []);
            if ($response) {
                echo json_encode($response);
            }
        }
    }

    public function addCategoriasVulnerabilidad()
    {
        if ($this->session->logged_in) {
            if (!$this->request->getPost()) {
                return redirect()->to(base_url('/riesgos'));
            } else {
                $post_endpoint = '/api/addCategoriasVulnerabilidad';
                $request_data = [];
                $request_data = $this->request->getPost();
                $response = (perform_http_request('POST', REST_API_URL . $post_endpoint, $request_data));
                // var_dump($response);die();
                if ($response) {
                    echo json_encode($response);
                } else {
                    echo json_encode(false);
                }
            }
        }
    }

    public function updateCategoriasVulnerabilidad($id)
    {
        if ($this->session->logged_in) {
            if (!$this->request->getPost()) {
                return redirect()->to(base_url('/riesgos'));
            } else {
                $post_endpoint = '/api/updateCategoriasVulnerabilidad/' . $id;
                $request_data = [];
                $request_data = $this->request->getPost();
                $response = (perform_http_request('POST', REST_API_URL . $post_endpoint, $request_data));
                if ($response) {
                    echo json_encode($response);
                } else {
                    echo json_encode(false);
                }
            }
        }
    }

    public function deleteCategoriasVulnerabilidad($id)
    {
        if ($this->session->logged_in) {
            $post_endpoint = '/api/deleteCategoriasVulnerabilidad/' . $id;
            $response = (perform_http_request('DELETE', REST_API_URL . $post_endpoint, []));
            if ($response->msg) {
                echo json_encode($response->msg);
            } else {
                echo json_encode(false);
            }
        }
    }
}
