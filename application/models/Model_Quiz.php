<?php
	class Model_quiz extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public $id;
		public $nome;
		public $descricao;
		public $id_professor;

		public function excluir(){
			$this->db->where('quiz_id',$this->id);
			$this->db->delete('quiz');
		}

		public function quiz(){
			$this->db->where('quiz_id',$this->id);
			$this->db->join('professor', 'professor.prof_id = quiz.Professor_prof_id');
			$query = $this->db->get('quiz',1)->result_array();
			return $query[0];
		}

		public function cadastrar(){

			$dados = array();
			$dados['quiz_descricao'] = $this->descricao;
			$dados['quiz_nome'] = $this->nome;
			$dados['Professor_prof_id'] = $this->id_professor;
			return $this->db->insert('quiz', $dados);
		}


		public function alterar(){

			$dados = array();
			$dados['quiz_nome'] = $this->nome;
			$dados['quiz_descricao'] = $this->descricao;
			$dados['Professor_prof_id'] = $this->id_professor;
			$this->db->where('quiz_id', $this->id);
			$this->db->update('quiz', $dados);
		}

		public function getall(){
			//$this->db->where('Professor_prof_id', $this->session->userdata('id'));

			$this->db->join('professor', 'professor.prof_id = quiz.Professor_prof_id');
			return $this->db->get('quiz')->result();

		}

		public function getallQuiz(){

			// select * from aluno
			// inner join sala_has_aluno on sala_has_aluno.aluno_alun_id = aluno.alun_id
			// inner join sala on sala.sala_id = sala_has_aluno.sala_sala_id
			// inner join quiz_has_sala on quiz_has_sala.sala_sala_id = sala.sala_id
			// inner join quiz on quiz_has_sala.quiz_quiz_id = quiz.quiz_id
			// where aluno.alun_id = ;

			$this->db->join('sala_has_aluno', 'sala_has_aluno.aluno_alun_id = aluno.alun_id');
			$this->db->join('sala', 'sala.sala_id = sala_has_aluno.sala_sala_id');
			$this->db->join('quiz_has_sala', 'quiz_has_sala.sala_sala_id = sala.sala_id');
			$this->db->join('quiz', 'quiz_has_sala.quiz_quiz_id = quiz.quiz_id');
			$this->db->join('professor', 'professor.prof_id = quiz.Professor_prof_id');
			//$this->db->where('alun_id', $this->session->userdata('id'));
			$query = $this->db->get('aluno');
			return $query->result();
		}

		public function getquiz(){

			$dados = array();
			$this->db->where('quiz_nome', $this->nome);
			$this->db->where('quiz_descricao', $this->descricao);
			$this->db->where('Professor_prof_id', $this->id_professor);

			$query = $this->db->get('quiz');
			return $query->result();
		}

		public function perguntas(){

			$consulta = "select * from perguntas
			inner join perguntas_has_quiz on perguntas_has_quiz.Perguntas_perg_id = perguntas.perg_id 
			where not EXISTS( select * from respostas  where respostas.perg_id = perguntas.perg_id) and 
			perguntas_has_quiz.Quiz_quiz_id = ".$this->id;
			$query = $this->db->query($consulta);
			return $query->result();
		}
	}
?>