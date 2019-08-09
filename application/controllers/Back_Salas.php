<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Back_Salas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata("logado") != 1) redirect(base_url('index.php/Back_Login'));

		$this->load->model('Model_Salas');
		$this->load->model('Model_Aluno');
	}

	public function index(){

		$dados = array();
		$dados['dados'] = $this->Model_Salas->getall();
		$perfil = array();
		$perfil = $this->session->get_userdata();

		$this->load->view('Back_Header', $perfil);
		$this->load->view('Back_Footer');
		$this->load->view('Back_Corpo_Salas', $dados);
		$this->load->view('Back_Menu');
	}

	public function entrar(){

		$this->Model_Salas->id = $this->input->get('id');
		$this->Model_Salas->convite();

		redirect(base_url('index.php/Front_Salas'));
	}

	public function adicionar(){

		$this->Model_Salas->nome = $this->input->post('nome');
		$this->Model_Salas->descricao = $this->input->post('descricao');
		$this->Model_Salas->cadastrar();

		$dados = array();
		$dados['dados'] = $this->Model_Salas->getall();

		$perfil = array();
		$perfil = $this->session->get_userdata();

		$this->load->view('Back_Header', $perfil);
		$this->load->view('Back_Footer');
		$this->load->view('Back_Menu');
		$this->load->view('Back_Corpo_Salas', $dados);
	}

	public function deletar(){
		$this->Model_Salas->id = $this->input->post('id');
		$this->Model_Salas->deletar();

		$dados = array();
		$dados['dados'] = $this->Model_Salas->getall();


		$perfil = array();
		$perfil = $this->session->get_userdata();

		$this->load->view('Back_Header', $perfil);
		$this->load->view('Back_Footer');
		$this->load->view('Back_Menu');
		$this->load->view('Back_Corpo_Salas', $dados);
	}

	public function salas() {

		$dados = array();
		$this->Model_Salas->id = $this->input->get('id');
		$this->Model_Aluno->id_sala = $this->input->get('id');
		$dados['dados'] = $this->Model_Salas->getsala();
		$dados['alunos'] = $this->Model_Aluno->getalunos();
		$alert = array();

		$this->load->view('Back_Header');
		$this->load->view('Back_Footer');
		$this->load->view('Back_Menu');
		$this->load->view('Back_View_Sala', $dados, $alert);
	}

	public function alterar(){
		$this->Model_Salas->id = $this->input->post('id');
		$this->Model_Salas->nome = $this->input->post('nome');
		$this->Model_Salas->descricao = $this->input->post('descricao');
		$this->Model_Salas->update();

		redirect(base_url('index.php/Back_Salas'));

	}

	public function add_aluno() {

		$id = $this->input->post('id_sala');
		$this->Model_Aluno->nome = $this->input->post('nome');
		$aluno = array();
		$aluno = $this->Model_Aluno->busca();
		

		$alert = array();
		if($aluno){
			$this->Model_Salas->id = $id;
			$this->Model_Salas->id_aluno = $aluno[0]['alun_id'];
			$this->Model_Salas->cadastrar_aluno();
			$alert['title'] = 'Sucesso!';
			$alert['type'] = 'alert alert-success';
			$alert['mensagem'] = 'Aluno adicionado com sucesso!';
		} else {
			$alert['title'] = 'Erro!';
			$alert['type'] = 'alert alert-danger';
			$alert['mensagem'] = 'Aluno Nao encontrado!';
		}

		$dados = array();
		$this->Model_Salas->id = $id;
		$this->Model_Aluno->id_sala = $id;
		$dados['dados'] = $this->Model_Salas->getsala();
		$dados['alunos'] = $this->Model_Aluno->getalunos();

		$this->load->view('Back_Header');
		$this->load->view('Back_Footer');
		$this->load->view('Back_Menu');
		$this->load->view('Back_View_Sala', $dados, $alert);
	}
}
?>