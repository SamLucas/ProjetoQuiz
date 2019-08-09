<?php
	class Model_rank extends CI_Model{

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

		public function getaluno(){
			return $this->db->get('aluno')->result();
		}

		public function rank(){
			$this->db->from("aluno");
			$this->db->order_by("alun_point", 'DESC');
			return $this->db->get()->result();
		}


		public function salas(){

			if($this->id_quiz != null){
				$this->db->where('quiz_quiz_id', $this->id_quiz);
				$this->db->join('sala', 'sala_id = sala_sala_id');
				return $this->db->get('quiz_has_sala')->result();
			} else {
				$this->db->where('aluno_alun_id', $this->session->userdata('id'));
				$this->db->join('sala', 'sala_id = sala_sala_id');
				return $this->db->get('sala_has_aluno')->result();
			}
		}


		public function getall(){
			$this->db->where('professor_prof_id', $this->session->userdata('id'));
			$query = $this->db->get('sala');
			return $query->result();
		}

		

		public function getsala(){
			$this->db->where('sala_id', $this->id);
			return $this->db->get('sala')->result_array();
		}		
	}
?>