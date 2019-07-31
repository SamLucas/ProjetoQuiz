<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Front_Home extends CI_Controller {

		public function __construct(){
			parent::__construct();
		}

		public function index(){

			$this->load->view('Front_Header');
			$this->load->view('Front_Index');
			$this->load->view('Front_Footer');
		}
	}

?>