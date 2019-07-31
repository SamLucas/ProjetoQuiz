<?php
	class Model_aluno extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public $id;
		public $nome;
		public $descricao;

		public $moeda;

		public $id_professor;

		public function cadastrar(){

			$dados = array();
			$dados['sala_nome'] = $this->nome;
			$dados['sala_descricao'] = $this->descricao;
			$dados['professor_prof_id'] = $this->session->userdata('id');

			return $this->db->insert('sala', $dados);
		}

		public function attmoedas(){
			$dados = array('alun_moeda' => $this->moeda);
			$this->db->where('alun_id',$this->session->userdata('id'));
			$this->db->update('aluno',$dados);
		}

		public function soma($soma){
			$this->db->where('alun_id', $this->session->userdata('id'));
			$aluno = $this->db->get('aluno')->result_array();

			$aluno[0]['alun_point'] += $soma;
			$arr = array('alun_point' => $aluno[0]['alun_point']);
			$this->db->where('alun_id', $this->session->userdata('id'));
			$this->db->update('aluno',$arr);

			return $aluno[0]['alun_point'];
		}

		public function getalunos(){
			$this->db->where('sala_sala_id', $this->id_sala);
			$this->db->join('aluno', 'aluno.alun_id = sala_has_aluno.aluno_alun_id');
			$query = $this->db->get('sala_has_aluno');
			return $query->result();
		}

		public function deletar(){
			$this->db->where('sala_id', $this->id);
			return $this->db->delete('sala');
		}

		public function busca(){
			$this->db->where('alun_nome', $this->nome);
			return $this->db->get('aluno')->result_array();
		}		
	}
?>