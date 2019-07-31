<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Back_Quiz extends CI_Controller {

		public function __construct(){
			parent::__construct();
			if($this->session->userdata("logado") != 1) redirect(base_url('index.php/Back_Login'));
			
			$this->load->model('Model_Quiz');
			$this->load->model('Model_Perguntas');
			$this->load->model('Model_Salas');
		}

		public function index(){

			$conf = array();
			$conf['dados'] = $this->Model_Quiz->getall();
			$perfil = array();
			$perfil = $this->session->get_userdata();

			$this->load->view('Back_Header', $perfil);
			$this->load->view('Back_Footer');
			$this->load->view('Back_Menu');
			$this->load->view('Back_Corpo_Quiz',$conf);
		}

		public function add_sala_quiz(){
			$this->Model_Salas->nome = $this->input->post('busca');
			$this->Model_Salas->id_quiz = $this->input->post('id_quiz');
			$this->Model_Salas->id = $this->Model_Salas->getnome();
			$this->Model_Salas->sala_quiz();

			redirect(base_url('index.php/Back_Quiz/quiz').'?id='.$this->input->post('id_quiz'));
		}

		public function excluir(){

			$this->Model_Quiz->id = $this->input->post('id');
			$this->Model_Quiz->excluir();

			$conf = array();
			$conf['dados'] = $this->Model_Quiz->getall();
			$perfil = array();
			$perfil = $this->session->get_userdata();

			$this->load->view('Back_Header', $perfil);
			$this->load->view('Back_Footer');
			$this->load->view('Back_Menu');
			$this->load->view('Back_Corpo_Quiz',$conf);

		}
		
		public function adicionar(){
			$this->load->view('Back_Header');
			$this->load->view('Back_Footer');
			$this->load->view('Back_Menu');
			$this->load->view('Back_Corpo_Add_Quiz');
		}

		public function cadastrar(){

			$this->Model_Quiz->nome = $this->input->post('nome'); 
			$this->Model_Quiz->descricao = $this->input->post('descricao'); 
			$this->Model_Quiz->id_professor = $this->session->userdata('id');
			$this->Model_Quiz->cadastrar();
			redirect(base_url('index.php/Back_Quiz'));
		}

		public function quiz(){

			$dados = array();
			$this->Model_Quiz->id = $this->input->get('id');
			$this->Model_Perguntas->id_quiz = $this->input->get('id');
			$this->Model_Perguntas->id_professor = $this->session->userdata('id');
			$this->Model_Salas->id_quiz = $this->input->get('id');

			$dados['dados'] = $this->Model_Quiz->quiz();
			$dados['nome_professor'] = $this->session->userdata('prof_nome');
			$dados['perguntas_quiz'] = $this->Model_Perguntas->perguntas_quiz();
			$dados['perguntas_professor'] = $this->Model_Perguntas->perguntas_professor();
			$dados['salas'] = $this->Model_Salas->salas();

			$this->load->view('Back_Header');
			$this->load->view('Back_View_Quiz', $dados);
			$this->load->view('Back_Footer');
			$this->load->view('Back_Menu');
		}

		public function alterar(){

			echo $this->Model_Quiz->id = $this->input->post('id'); 
			$this->Model_Quiz->nome = $this->input->post('nome'); 
			$this->Model_Quiz->descricao = $this->input->post('descricao'); 
			$this->Model_Quiz->id_professor = $this->session->userdata('id');
			$this->Model_Quiz->alterar();
			redirect(base_url('index.php/Back_Quiz'));

		}

		public function addpergunta(){
			$this->Model_Perguntas->id = $this->input->get('id');
			$this->Model_Perguntas->id_quiz = $this->input->get('id_quiz');
			$this->Model_Perguntas->addpergunta();

			redirect(base_url('index.php/Back_Quiz/quiz').'?id='.$this->input->get('id_quiz'));
		}

		public function removepergunta(){
			$this->Model_Perguntas->id = $this->input->get('id');
			$this->Model_Perguntas->id_quiz = $this->input->get('id_quiz');
			$this->Model_Perguntas->removepergunta();

			redirect(base_url('index.php/Back_Quiz/quiz').'?id='.$this->input->get('id_quiz'));
		}

		public function removesala(){
			$this->Model_Salas->id = $this->input->get('id');
			$this->Model_Salas->id_quiz = $this->input->get('id_quiz');
			$this->Model_Salas->removesala();

			redirect(base_url('index.php/Back_Quiz/quiz').'?id='.$this->input->get('id_quiz'));
		}

		public function busca(){
			$this->Model_Perguntas->nome = $this->input->post('busca');
			$dados = array();
			$dados = $this->Model_Perguntas->buscar();

			echo 
				"<table class='table'>
                    <thead>
                    	<tr>
                        	<th>DESCRICAO</th>
                        	<th>NIVEL</th>
                        	<th>AÇÃO</th>
                    	</tr>
                	</thead>
                	<tbody>";

                foreach($dados as $dad){

                	echo "<tr><td class='txt-oflo'>";
                    for($i = 0;$i< 40;$i++){
                        echo $dad->perg_descricao[$i]; 
                    }
                            echo "...  
                                </td>
                                <td class='txt-oflo'>".$dad->perg_nvl."</td>
                                <td>
                                    <a href=".base_url('index.php/Back_Perguntas/alterar').'?id='.$dad->perg_id." class='btn btn-success btn-outline m-1-20 btn-rounded'>Alterar</a>
                                    <button type='button' class='btn btn-danger btn-outline m-1-20 btn-rounded' data-toggle='modal' data-target='#modalexcluir' data-nome=".$dad->perg_descricao." data-id=".$dad->perg_id.">Deletar</button>
                                </td>
                            </tr>";
                }                   

                echo "</tbody></table>";
		}
	}


?>