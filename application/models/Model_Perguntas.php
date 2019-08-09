<?php
	class Model_Perguntas extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public $id;
		public $descricao;
		public $op1;
		public $op2;
		public $op3;
		public $op4;
		public $accepted;
		public $dica;
		public $nivel;

		public $id_quiz;
		public $id_professor;
		public $id_aluno;
		public $id_pergunta;
		public $ponto;

		public function cadastra_resposta(){
			$dados = array(
				'resp_accepted' => $this->accepted,
				'alun_id' => $this->id_aluno,
				'perg_id'=> $this->id_pergunta,
				'quiz_id'=> $this->id_quiz
			);

			$this->db->insert('respostas', $dados);
		}

		public function res_perg(){
			$this->db->where('perg_id', $this->id_pergunta);
			$query = $this->db->get('perguntas')->result_array();

			return $query[0]['perg_accepted'];
		}

		public function ponto(){
				$this->db->where('perg_id', $this->id_pergunta);
			$query = $this->db->get('perguntas')->result_array();

			return $query[0]['perg_pontos'];
		}

		public function atualizar(){

			$dados = array();
			$dados['perg_descricao'] = $this->descricao;
			$dados['perg_op1'] = $this->op1;
			$dados['perg_op2'] = $this->op2;
			$dados['perg_op3'] = $this->op3;
			$dados['perg_op4'] = $this->op4;
			$dados['perg_accepted'] = $this->accepted;
			$dados['perg_dica'] = $this->dica;
			$dados['perg_nvl'] = $this->nivel;
			$dados['prof_id'] = $this->id_professor;
			$dados['perg_pontos'] = $this->ponto;

			$this->db->where('perg_id', $this->id);
			$this->db->update('perguntas', $dados);
		}

		public function cadastrar(){

			$dados = array();
			$dados['perg_descricao'] = $this->descricao;
			$dados['perg_op1'] = $this->op1;
			$dados['perg_op2'] = $this->op2;
			$dados['perg_op3'] = $this->op3;
			$dados['perg_op4'] = $this->op4;
			$dados['perg_accepted'] = $this->accepted;
			$dados['perg_dica'] = $this->dica;
			$dados['perg_nvl'] = $this->nivel;
			$dados['prof_id'] = $this->id_professor;

			return $this->db->insert('perguntas', $dados);
		}

		public function addpergunta(){
			$dados = array();
			$dados['Quiz_quiz_id'] = $this->id_quiz;
			$dados['Perguntas_perg_id'] = $this->id;
			$dados['Quiz_Professor_prof_id'] = $this->session->userdata('id');
			$this->db->insert('perguntas_has_quiz', $dados);
			
		}

		public function removepergunta(){
			$this->db->where('Quiz_quiz_id', $this->id_quiz);
			$this->db->where('Perguntas_perg_id', $this->id);
			$this->db->where('Quiz_Professor_prof_id', $this->session->userdata('id'));
			$this->db->delete('perguntas_has_quiz');
		}

		public function perguntas_quiz(){
			$this->db->where('Quiz_quiz_id', $this->id_quiz);
			$this->db->where('Quiz_Professor_prof_id', $this->id_professor);
			$this->db->join('perguntas','perg_id = Perguntas_perg_id');
			$query = $this->db->get('perguntas_has_quiz')->result();
			return $query;
		}
		
		public function perguntas_professor(){
			$this->db->where('prof_id', $this->id_professor);
			$query = $this->db->get('perguntas')->result();
			return $query;
		}

		public function getall(){
			$query = $this->db->get('perguntas');
			return $query->result();
		}

		public function excluir(){
			$this->db->where('perg_id', $this->id);
			$this->db->delete('perguntas');
		}

		public function getid(){
			$this->db->where('perg_id', $this->id);
			return $this->db->get('perguntas',1)->result_array();
		}

		public function buscar(){
			$this->db->where('prof_id', $this->session->userdata('id'));
			$this->db->like('perg_descricao',$this->descricao);
			$query = $this->db->get('perguntas');
			return $query->result();
		}
	}
?>
