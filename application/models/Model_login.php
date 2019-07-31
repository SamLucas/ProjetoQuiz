<?php
class Model_Login extends CI_Model {

    public $usuario;
    public $nomecompleto;
    public $email;
    public $senha;
    public $descricao;
    public $tipo;

    public function aluno() {

        $this->db->where('alun_email', $this->email); 
        $this->db->where('alun_senha', $this->senha);

        $query = $this->db->get('aluno',1)->result_array(); 
        return isset($query) ? $query : null;
    }

    public function professor() {

        $this->db->where('prof_email', $this->email); 
        $this->db->where('prof_senha', $this->senha);

        $query = $this->db->get('professor',1)->result_array(); 
        return isset($query) ? $query : null;
    }

    public function cad_aluno() {

        $dados = array(
            'alun_nome' => $this->usuario,
            'alun_nomecompleto' => $this->nomecompleto,
            'alun_senha' => $this->senha,
            'alun_email' => $this->email,
            'alun_descricao' => $this->descricao
        );

        return $query = $this->db->insert('aluno', $dados);
    }

    public function cad_professor() {

        $dados = array(
            'prof_nome' => $this->usuario,
            'prof_nomecompleto' => $this->nomecompleto,
            'prof_senha' => $this->senha,
            'prof_email' => $this->email,
            'prof_descricao' => $this->descricao
        );

        return $query = $this->db->insert('professor', $dados);
    }

    public function logado() {
        $logado = $this->session->userdata('logado');
        if($logado == null || !isset($logado)){
            $caminho = base_url('index.php/back_login');
            header("location:$caminho");
        }
    }

    public function ultimoid(){
        return $this->db->insert_id();
    }

    public function ativa(){

        if($this->tipo == "Professor"){
            $dados = array('prof_ativo' => '1');
            $this->db->where('prof_id',$this->id);
            $this->db->update('professor',$dados);
            return true;
        }
        if($this->tipo == "Aluno") {
            $dados = array('alun_ativo' => '1');
            $this->db->where('alun_id',$this->id);
            $this->db->update('aluno',$dados);
            return true;
        }

        return false;

    }
}