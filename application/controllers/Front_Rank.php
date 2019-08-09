<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Front_Rank extends CI_Controller {

		public function __construct(){
			parent::__construct();

			$this->load->model('Model_Rank');
		}

		public function index(){

			$dados = array();
			$dados['alunos'] = $this->Model_Rank->getaluno();
			// var_dump($dados['alunos']);
			$this->load->view('Front_Header');
			$this->load->view('Front_Rank',$dados);
			$this->load->view('Front_Footer');
		}
	}

?>