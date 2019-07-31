<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Front_Sobre extends CI_Controller {

		public function __construct(){
			parent::__construct();
		}

		public function index(){

			$this->load->view('Front_Header');
			$this->load->view('Front_About');
			$this->load->view('Front_Footer');
		}
	}

?>