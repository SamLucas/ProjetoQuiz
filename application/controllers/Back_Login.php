<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Back_Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_Login','login');
    }

    function index() {

        $alert = array();
        $this->load->view('Back_Header');
        $this->load->view('Back_Footer'); 
        $this->load->view('Back_Login',$alert);
    }

    public function verificar(){

        $email = addslashes($this->input->post("email"));
        $senha = addslashes(md5($this->input->post("senha")));
        $tipo = addslashes($this->input->post("identificacao"));

        $this->login->email = $email;
        $this->login->senha = $senha;

        $files = $tipo == "Professor" ? $this->login->professor() : $this->login->aluno();
        if($files != NULL) {

            if($files[0]["alun_ativo"] == 1 && $tipo == "Aluno") {
                $this->session->set_userdata("tipo", $tipo);
                $this->session->set_userdata("id", $files[0]["alun_id"]);
                $this->session->set_userdata("nome", $files[0]["alun_nome"]);
                $this->session->set_userdata("email", $files[0]["alun_email"]);
                $this->session->set_userdata("senha", $files[0]["alun_senha"]);
                $this->session->set_userdata("descricao", $files[0]["alun_descricao"]);
                $this->session->set_userdata("nomecompleto", $files[0]["alun_nomecompleto"]);
                $this->session->set_userdata("ativo", $files[0]["alun_ativo"]);
                $this->session->set_userdata("logado", 1);
                $this->session->set_userdata("moedas", $files[0]["alun_moeda"]);
                $this->session->set_userdata("pontos", $files[0]["alun_point"]);
                redirect(base_url('index.php/Back_Home'));
            }

            else if($files[0]["prof_ativo"] == 1 && $tipo == "Professor") {
                $this->session->set_userdata("tipo", $tipo);
                $this->session->set_userdata("id", $files[0]["prof_id"]);
                $this->session->set_userdata("nome", $files[0]["prof_nome"]);
                $this->session->set_userdata("email", $files[0]["prof_email"]);
                $this->session->set_userdata("senha", $files[0]["prof_senha"]);
                $this->session->set_userdata("descricao", $files[0]["prof_descricao"]);
                $this->session->set_userdata("nomecompleto", $files[0]["prof_nomecompleto"]);
                $this->session->set_userdata("ativo", $files[0]["prof_ativo"]);
                $this->session->set_userdata("logado", 1);
                redirect(base_url('index.php/Back_Home'));
            }

            else {
           
                $alert = array();
                $alert['title'] = "Confirmação de cadastro!";
                $alert['type'] = "alert alert-danger";
                $alert['mensagem'] = "Enviamos um email com um link de confirmação para ".$email.". clique no link de confirmação do email para ativar sua conta."; 

                $this->load->view('Back_Header');
                $this->load->view('Back_Footer');
                $this->load->view("Back_Login", $alert);
            }

        } else {

            $alert = array();
            $alert['title'] = "Error!";
            $alert['type'] = "alert alert-danger";
            $alert['mensagem'] = "Usuário/Senha incorretos";

            $this->load->view('Back_Header');
            $this->load->view('Back_Footer');
            $this->load->view("Back_Login", $alert);
        }
    }

    public function logout(){
        $this->session->unset_userdata("logado");
        redirect(base_url());   
    }

    public function cadastro(){
        $this->load->view('Back_Header');
        $this->load->view('Back_Footer'); 
        $this->load->view('Back_Corpo_Cadastro');
    }

    public function cadastrar(){

        $nome = addslashes($this->input->post('nome'));
        $nomecompleto = addslashes($this->input->post('nomecompleto'));
        $email = addslashes($this->input->post('email'));
        $senha = md5(addslashes($this->input->post('senha')));
        $descricao = addslashes($this->input->post("descricao"));

        $this->login->usuario = addslashes($this->input->post('nome'));
        $this->login->nomecompleto = addslashes($this->input->post('nomecompleto'));
        $this->login->email = addslashes($this->input->post('email'));
        $this->login->senha = md5(addslashes($this->input->post('senha')));
        $this->login->descricao = addslashes($this->input->post("descricao"));

        $tipo = $this->input->post("identificacao");
        if($tipo == "Professor") $this->login->cad_professor();
        else $this->login->cad_aluno();

        $md5 = $this->login->ultimoid();


       $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'samuellucas0603@gmail.com',
            'smtp_pass' => 'loopinfinito',
            'mailtype'  => 'html', 
            'charset'   => 'utf-8'
        );

        $link = base_url('index.php/back_Login/ativa').'?id='.$md5.'&tipo='.$tipo;


        $mensagem = "
            <html xmlns='http://www.w3.org/1999/xhtml'>
            <head>
                <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                <title>A Simple Responsive HTML Email</title>
                <style type='text/css'>
                * {text-decoration: none;}
                body {margin: 0; padding: 0; min-width: 100% !important;}
                .content {width: 100%; max-width: 600px;}
                .div-whithe {background-color: white;}
                .btn-enviar {background-color: #85b4d0; color: white; padding:10px;display:block; margin: 0 auto;width:50%;}
                .title {color: white;padding:20px;}
                
            </style>
            </head>
            <body yahoo bgcolor='#f6f8f1'>
                <body yahoo bgcolor='#f6f8f1'>
                    <table width='40%' style='margin: 0 auto;' bgcolor='#f6f8f1' border='0' alling='center' cellpadding='0' allincellspacing='0'>
                        <tr>
                            <td bgcolor='#85b4d0' class='title'>Confirmação!</td>
                        </tr>
                        <tr>
                            <td style='padding: 10px;'>
                                <p>Bem-vindo a plataforma quiz".$nome."!<br></p>
                                <p>Seus dados foram cadastrados com sucesso agora falta pouco para concluir seu cadastro, clique no botão de confirmação para ativar o seu cadastro.<p>
                                <br><a href=".$link." class='btn-enviar' style='text-align:center;'>Confirmar</a><br><br>
                                <p>Caso nao seja você, por favor desconsidere esse email.</p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor='#85b4d0' class='title' style='text-align:center;'>Painel administrativo</td>
                        </tr>
                        

                    </table>

                </body>
            </html>
        ";

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('samuellucas0603@gmail.com');
        $this->email->to($email);
        $this->email->cc('samuellucas0603@gmail.com');
        $this->email->subject('Cadastro na plataforma quiz');
        $this->email->message($mensagem);

        if(!$this->email->send()) echo $this->email->print_debugger();

        $alert = array();
        $alert['title'] = "Confirmação de cadastro!";
        $alert['type'] = "alert alert-info";
        $alert['mensagem'] = "Enviamos um email com um link de confirmação para ".$email.". clique no link de confirmação do email para ativar sua conta (você o receberá em 1 ou 2 minutos).";

        $this->load->view('Back_Header');
        $this->load->view('Back_Footer');
        $this->load->view("Back_Login", $alert);

    }

    public function ativa(){

        $this->login->id = $this->input->get('id');
        $this->login->tipo = $this->input->get('tipo');
        
        if($this->login->ativa()){

            $alert = array();
            $alert['title'] = "Cadastro ativado!";
            $alert['type'] = "alert alert-success";
            $alert['mensagem'] = "O cadastro foi ativado com sucesso!";

            $this->load->view('Back_Header');
            $this->load->view('Back_Footer');
            $this->load->view("Back_Login", $alert);
        }
    }

}


