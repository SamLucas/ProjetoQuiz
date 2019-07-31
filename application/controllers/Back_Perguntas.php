<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Back_Perguntas extends CI_Controller {

		public function __construct(){
			parent::__construct();
			if($this->session->userdata("logado") != 1) redirect(base_url('index.php/Back_Login'));

			$this->load->model('Model_Perguntas');
		}
		
		public function index(){

			$dados = array();
			$dados['arquivos'] = $this->Model_Perguntas->getall();
			$perfil = array();
			$perfil = $this->session->get_userdata();

			$this->load->view('Back_Header', $perfil);
			$this->load->view('Back_Menu');
			$this->load->view('Back_Corpo_Perguntas', $dados);
			$this->load->view('Back_Footer');
		}

		public function busca(){
			$this->Model_Perguntas->descricao = $this->input->post('busca');
			$query = $this->Model_Perguntas->buscar();
			$caminho = base_url('index.php/Back_Perguntas/alterar');

			if($query != null){

				echo "<div class='tab-content'>";
				for($d = 0;$d < ceil(sizeof($query)/10);$d++){

					$cont = $d+1;
					$active = "";
					if($d == 0) $active = "active";

					echo "<div role='tabpanel' class='tab-pane ".$active." col-sm-12' id='".$cont."' >";
					echo "
					<table class='table table-hover'>
	                    <thead>
	                        <tr>
	                            <th>DESCRICAO</th>
	                            <th>RESPOSTA</th>
	                            <th>DIFICUDADE</th>
	                            <th>AÇÃO</th>
	                        </tr>
	                    </thead>
	                    <tbody style='cursor: pointer;'>";
	                    for($k = $d * 10;$k < ($d + 1) * 10;$k++){
                            if($k < sizeof($query)){
								$descricao = $query[$k]->perg_descricao;
								if(strlen($descricao) > 80) $descricao = substr($descricao, 0,80);
								echo "<tr>
									<td>".$descricao."</td>
									<td>".$query[$k]->perg_accepted."</td>
									<td>".$query[$k]->perg_nvl."</td>
									<td>
										<a href='".base_url('index.php/Back_Perguntas/alterar')."' class='btn btn-success btn-outline m-1-20 btn-rounded'>Alterar</a>
			                            <button type='button' class='btn btn-danger btn-outline m-1-20 btn-rounded' data-toggle='modal' data-target='#modalexcluir' data-nome='".$query[$k]->perg_descricao."' data-id='".$query[$k]->perg_id."'>Deletar</button></td>
								</tr>";
                            }
						}
						echo "</tbody></table></div>";
					}

					echo "<div class='row'>
                    <div class='col-sm-4'></div>
                    <div class='col-sm-4'>
                         <ul class='nav pagination' role='tablist'>";
                        for($i=1;$i<=ceil(sizeof($query)/10);$i++){

                            echo "<li role='presentation'>
                                <a href='#".$i."' aria-controls='home' role='tab' data-toggle='tab'>".$i."</a>
                            </li>";
                        }
                    echo "</div>
                    <div class='col-sm-4'></div>
                </div>";
					
				
			} else echo "<tr><td><p class='text-center'>Nenhuma pergunta foi encontrada.</p></td><td>-</td><td>-</td><td>-</td></tr>";
		}

		public function adicionar(){
			$this->load->view('Back_Header');
			$this->load->view('Back_Footer');
			$this->load->view('Back_Menu');
			$this->load->view('Back_Corpo_Add_Pergunta');
		}

		public function alterar(){

			$this->Model_Perguntas->id = $this->input->get('id');
			$dado = array('dados' => $this->Model_Perguntas->getid());

			$this->load->view('Back_Header');
			$this->load->view('Back_Footer');
			$this->load->view('Back_Menu');
			$this->load->view('Back_Corpo_Alterar_Pergunta',$dado);

		}

		public function atualizar(){
			$this->Model_Perguntas->id = $this->input->post('id');
			$this->Model_Perguntas->descricao = $this->input->post('descricao'); 
			$this->Model_Perguntas->op1 = $this->input->post('primeira'); 
			$this->Model_Perguntas->op2 = $this->input->post('segunda'); 
			$this->Model_Perguntas->op3 = $this->input->post('terceira'); 
			$this->Model_Perguntas->op4 = $this->input->post('quarta');
			$this->Model_Perguntas->dica = $this->input->post('dica'); 
			$this->Model_Perguntas->accepted = $this->input->post('accepted');
			$this->Model_Perguntas->nivel = $this->input->post('dificuldade');  
			$this->Model_Perguntas->id_professor = $this->session->userdata('id');
			$this->Model_Perguntas->ponto = (30 * ($this->input->post('dificuldade') / 10)) + 30;

			$this->Model_Perguntas->atualizar();
			redirect(base_url('index.php/Back_Perguntas'));

		}

		public function cadastrar(){

			$this->Model_Perguntas->descricao = $this->input->post('descricao'); 
			$this->Model_Perguntas->op1 = $this->input->post('primeira'); 
			$this->Model_Perguntas->op2 = $this->input->post('segunda'); 
			$this->Model_Perguntas->op3 = $this->input->post('terceira'); 
			$this->Model_Perguntas->op4 = $this->input->post('quarta');
			$this->Model_Perguntas->dica = $this->input->post('dica'); 
			$this->Model_Perguntas->accepted = $this->input->post('accepted');
			$this->Model_Perguntas->nivel = $this->input->post('dificuldade');  
			$this->Model_Perguntas->id_professor = $this->session->userdata('id');

			$this->Model_Perguntas->cadastrar();
			redirect(base_url('index.php/Back_Perguntas'));

		}

		public function excluir(){

			$this->Model_Perguntas->id = $this->input->post('id');
			$this->Model_Perguntas->excluir();
			redirect(base_url('index.php/Back_Perguntas'));
		}
	}

?>