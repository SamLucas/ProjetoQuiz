<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Front_Quiz extends CI_Controller {

		public function __construct(){
			parent::__construct();

			$this->load->model('Model_Quiz');
			$this->load->model('Model_Perguntas');
			$this->load->model('Model_Aluno');
		}

		public function resposta(){
			
			$this->Model_Perguntas->id_aluno = $this->session->userdata('id');
			$this->Model_Perguntas->id_quiz = $this->input->post('id_quiz');
			$this->Model_Perguntas->id_pergunta = $this->input->post('id_pergunta');
			$this->Model_Perguntas->accepted = $this->input->post('resposta');
			
			$this->Model_Perguntas->cadastra_resposta();

			$ans = $this->Model_Perguntas->res_perg();
			$pontos = $this->Model_Perguntas->ponto();

			if(strcmp($ans,$this->Model_Perguntas->accepted) == 0)
				$pontos = $this->Model_Aluno->soma($pontos);

			$this->session->set_userdata('pontos',$pontos);
			echo $pontos;
			
		}

		public function index(){

			$dados = array();
			$this->Model_Quiz->id_professor = $this->session->userdata('id'); 
			$dados['quiz'] = $this->Model_Quiz->getall();

			$this->load->view('Front_Header');
			$this->load->view('Front_Quiz',$dados);
			$this->load->view('Front_Footer');
		}

		public function view_quiz(){
			$dados = array();
			$this->Model_Quiz->id = $this->input->get('id');
			$dados['dados_quiz'] = $this->Model_Quiz->quiz();

			$this->load->view('Front_Header');
			$this->load->view('Front_View_Quiz',$dados);
			$this->load->view('Front_Footer');
		}

		public function perguntas(){
			$dados = array();
			$this->Model_Quiz->id = $this->input->get('id');
			$dados['dados_quiz'] = $this->Model_Quiz->quiz();
			$dados['perguntas'] = $this->Model_Quiz->perguntas();

			$this->load->view('Front_Header');
			$this->load->view('Front_View_Perguntas',$dados);
			$this->load->view('Front_Footer');
		}

		public function dica1(){
			$moedas_atuais = $this->session->userdata('moedas');
			if($moedas_atuais - 40 >= 0){
				$this->Model_Aluno->moeda = $moedas_atuais - 40;
				$this->Model_Aluno->attmoedas();
				$this->session->set_userdata('moedas',$moedas_atuais - 40);
				echo $this->session->userdata('moedas');
			} 
		}

		public function dica2(){
			$moedas_atuais = $this->session->userdata('moedas');
			if($moedas_atuais - 70 >= 0){
				$this->Model_Aluno->moeda = $moedas_atuais - 70;
				$this->Model_Aluno->attmoedas();
				$this->session->set_userdata('moedas',$moedas_atuais - 70);
				echo $this->session->userdata('moedas');
			} 
		}

		public function dica3(){
			$moedas_atuais = $this->session->userdata('moedas');
			if($moedas_atuais - 40 >= 0){
				$this->Model_Aluno->moeda = $moedas_atuais - 40;
				$this->Model_Aluno->attmoedas();
				$this->session->set_userdata('moedas',$moedas_atuais - 40);
				echo $this->session->userdata('moedas');
			} 
		}
	}

?>