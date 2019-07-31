<?php
	class Model_salas extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public $id;
		public $nome;
		public $descricao;

		public $id_professor;
		public $id_aluno;
		public $id_quiz;

		public function sala_quiz(){

			$dados = array(
				'quiz_quiz_id' => $this->id_quiz,
				'sala_sala_id' => $this->id
			);

			$this->db->insert('quiz_has_sala', $dados);
		}

		public function getnome(){
			$query = array();
			$this->db->where('sala_nome',$this->nome);
			$query = $this->db->get('sala',1)->result_array();
			return $query[0]['sala_id'];
		}

		public function update(){
			
			$dados = array(
				'sala_nome' => $this->nome,
				'sala_descricao' => $this->descricao
			);
				
			$this->db->where('sala_id',$this->id);
			$this->db->update('sala',$dados);	
		}


		public function salas(){

			if($this->id_quiz != null){
				$this->db->where('quiz_quiz_id', $this->id_quiz);
				$this->db->join('sala', 'sala_id = sala_sala_id');
				return $this->db->get('quiz_has_sala')->result();
			} else {
				//$this->db->where('aluno_alun_id', $this->session->userdata('id'));
				//$this->db->join('sala', 'sala_id = sala_sala_id');
				return $this->db->get('sala')->result();
			}
		}

		public function convite(){
			$dados = array(
				'sala_sala_id' => $this->id,
				'aluno_alun_id' => $this->session->userdata('id')
			);
			$this->db->insert('sala_has_aluno',$dados);
		}

		public function removesala(){
			$this->db->where('quiz_quiz_id', $this->id_quiz);
			$this->db->where('sala_id', $this->id);
			$this->db->delete('quiz_has_sala');
		}

		public function cadastrar(){
			$dados = array(
				'sala_nome' => $this->nome,
				'sala_descricao' => $this->descricao,
				'professor_prof_id' => $this->session->userdata('id'),
				'sala_id' => '#546356'
			);

			$this->db->insert('sala',$dados);
		}	

		public function cadastrar_aluno(){

			$dados = array();
			$dados['sala_sala_id'] = $this->id;
			$dados['aluno_alun_id'] = $this->id_aluno;
			$query = $this->db->insert('sala_has_aluno',$dados)->result();
		}

		public function getall(){
			$this->db->where('professor_prof_id', $this->session->userdata('id'));
			$query = $this->db->get('sala');
			return $query->result();
		}

		public function deletar(){
			$this->db->where('sala_id', $this->id);
			return $this->db->delete('sala');
		}

		public function getsala(){
			$this->db->where('sala_id', $this->id);
			return $this->db->get('sala')->result_array();
		}		
	}
?>