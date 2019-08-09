<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Back_Perfil extends CI_Controller {

		public function __construct(){
			parent::__construct();
			if($this->session->userdata("logado") != 1) redirect(base_url('index.php/Back_Login'));
		}

		public function index(){


			$perfil = array();
			$perfil = $this->session->get_userdata();

			$this->load->view('Back_Header', $perfil);
			$this->load->view('Back_Footer');
			$this->load->view('Back_Menu');
			$this->load->view('Back_Corpo_Perfil', $perfil);
		}
	}

?>