<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Front_Salas extends CI_Controller {

		public function __construct(){
			parent::__construct();

			$this->load->model('Model_Salas');
		}

		public function index(){

			$dados = array();
			$dados['salas'] = $this->Model_Salas->salas();

			$this->load->view('Front_Header');
			$this->load->view('Front_Salas', $dados);
			$this->load->view('Front_Footer');
		}
	}

?>