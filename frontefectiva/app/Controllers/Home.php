<?php

namespace App\Controllers;

class Home extends BaseController {
	
    public function index() {
		helper(['curl']);
		
		$rest_api_base_url = 'http://localhost:8080';
		
		//GET - list of users
		// $get_endpoint = '/api/users';
		
		// $response = perform_http_request('GET', $rest_api_base_url . $get_endpoint);
		
		// $data['users'] = $response;
		
        //POST - respuesta del logeo
        $get_endpoint = '/login';
        $request_data = (array("email" => "mpantac@unprg.edu.pe", "password" => "12345678"));
        $response = perform_http_request('POST', $rest_api_base_url . $get_endpoint,$request_data);
       
        $data['response'] = $response;

		// //GET - single user
		// $get_endpoint = '/api/users/2';
		
		// $response = perform_http_request('GET', $rest_api_base_url . $get_endpoint);
		
		// $data['user'] = $response;
		
		// //POST - create new user
		// $post_endpoint = '/api/users';
		
		// $request_data = json_encode(array("name" => "Soumitra", "job" => "Blog Author", "avatar" => "https://roytuts.com/about/"));
		
		// $response = perform_http_request('POST', $rest_api_base_url . $post_endpoint, $request_data);
		
		// $data['new_user'] = $response;
		
		// //PUT - update user
		// $put_endpoint = '/api/users';
		
		// $request_data = json_encode(array("name" => "Soumitra", "job" => "Roy Tutorials Author", "avatar" => "https://roytuts.com/about/"));
		
		// $response = perform_http_request('PUT', $rest_api_base_url . $put_endpoint, $request_data);
		
		// $data['update_user'] = $response;
		
		//View
        return view('login/consume_rest_api', $data);
    }
	
}
