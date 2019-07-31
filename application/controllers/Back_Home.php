<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Back_Home extends CI_Controller {

		public function __construct(){
			parent::__construct();

			if($this->session->userdata("logado") != 1) redirect(base_url('index.php/Back_Login'));
			if($this->session->userdata("tipo") == "Aluno")
				redirect(base_url('index.php/Front_Home'));
		}

		public function index(){

			$perfil = array();
			$perfil = $this->session->get_userdata();

			$this->load->view('Back_Header', $perfil);
			$this->load->view('Back_Footer');
			$this->load->view('Back_Menu');
		}
	}

?>