<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ImpactoRiesgoController extends BaseController
{
    public function getImpactoRiesgo($scene)
    {
        if ($this->session->logged_in) {
            $get_endpoint = '/api/getImpactoRiesgo/' . $scene;
            $response = perform_http_request('GET', REST_API_URL . $get_endpoint, []);
            if ($response) {
                echo json_encode($response);
            }
        }
    }
    public function showImpactoRiesgo($id)
    {
        if ($this->session->logged_in) {
            $get_endpoint = '/api/showImpactoRiesgo/' . $id;
            $response = perform_http_request('GET', REST_API_URL . $get_endpoint, []);
            if ($response) {
                echo json_encode($response);
            }
        }
    }
    public function addImpactoRiesgo1()
    {
        if ($this->session->logged_in) {
            if (!$this->request->getPost()) {
                return redirect()->to(base_url('/riesgos'));
            } else {
                $post_endpoint = '/api/addImpactoRiesgo1';
                $request_data = [];
                $request_data = $this->request->getPost();
                $request_data['escenario'] = "1";
                $response = (perform_http_request('POST', REST_API_URL . $post_endpoint, $request_data));
                if ($response->msg) {
                    echo json_encode($response->msg);
                } else {
                    echo json_encode(false);
                }
            }
        }
    }
    public function addImpactoRiesgo2()
    {
        if ($this->session->logged_in) {
            if (!$this->request->getPost()) {
                return redirect()->to(base_url('/riesgos'));
            } else {
                $post_endpoint = '/api/addImpactoRiesgo2';
                $request_data = [];
                $request_data = $this->request->getPost();
                $request_data['escenario'] = "2";
                $response = (perform_http_request('POST', REST_API_URL . $post_endpoint, $request_data));
                if ($response->msg) {
                    echo json_encode($response->msg);
                } else {
                    echo json_encode(false);
                }
            }
        }
    }

    public function updateImpactoRiesgo1()
    {
        if ($this->session->logged_in) {
            if (!$this->request->getPost()) {
                return redirect()->to(base_url('/riesgos'));
            } else {
                $post_endpoint = '/api/updateImpactoRiesgo1';
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
    public function updateImpactoRiesgo2()
    {
        if ($this->session->logged_in) {
            if (!$this->request->getPost()) {
                return redirect()->to(base_url('/riesgos'));
            } else {
                $post_endpoint = '/api/updateImpactoRiesgo2';
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

    public function deleteImpactoRiesgo($id)
    {
        if ($this->session->logged_in) {
            $post_endpoint = '/api/deleteImpactoRiesgo/' . $id;
            $response = (perform_http_request('DELETE', REST_API_URL . $post_endpoint, []));
            if ($response->msg) {
                echo json_encode($response->msg);
            } else {
                echo json_encode(false);
            }
        }
    }
}
