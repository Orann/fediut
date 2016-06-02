<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'libraries/REST_Controller.php');

class Api extends REST_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function salle_get()
	{
		if(!$this->get('id'))
		{
			$this->response(NULL, 400);
		}

		$salle = $this->api_model->get_salle( $this->get('id') );

		if($salle)
		{
			$this->response($salle, 200); // 200 being the HTTP response code
		}

		else
		{
			$this->response(NULL, 404);
		}
	}

	function salles_get()
	{
		$salles = $this->api_model->get_all_salles();

		if($salles)
		{
			$this->response($salles, 200);
		}

		else
		{
			$this->response(NULL, 404);
		}
	}

	function salle_post()
	{
		print_r($this->post());
		$result = $this->api_model->create_salle($this->post());

		if($result === FALSE)
		{
			$this->response(array('status' => 'failed'));
		}

		else
		{
			$this->response(array('status' => 'success'));
		}

	}

	function salle_put()
	{
		print_r($this->put());
		$result = $this->api_model->create_salle($this->put());

		if($result === FALSE)
		{
			$this->response(array('status' => 'failed'));
		}

		else
		{
			$this->response(array('status' => 'success'));
		}

	}
}
