<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {

        $this->load->view('header');
        $this->load->view('login');
    }

    public function verificarAutenticacao() {
        session_start();

        $login = $_POST["login"];
        $senha = $_POST["senha"];


        if (strlen($senha) == 0) {
            $msg_erro = "Insira sua senha";
        }
        if (strlen($login) == 0) {
            $msg_erro = "Insira seu login";
        }
        if (!isset($msg_erro)) {
            $users = $this->db->get_where("usuario", array("login" => $login, "status" => 1));

            if ($users->num_rows() > 0) {

                $linha = $users->row(0);
                if ($linha->senha == md5($senha)) {

                    $this->load->Model("Modelcongregacao");

                    $_SESSION["idUsuario"] = $linha->idUsuario;
                    $_SESSION["usuario"] = $linha->login;
                    $_SESSION["tipo"] = $linha->tipoUsuario;
                    $_SESSION["logged"] = true;
                    $_SESSION["idInstituicao"] = 1;
                    redirect(base_url("index.php/Welcome"), 'refresh');
                } else {
                    $msg_erro = "Senha não confere";
                }
            } else {
                $msg_erro = "Usuário não encontrado";
            }
        }

        if (isset($msg_erro)) {
            $_SESSION["mensagem"] = $msg_erro;
            redirect(base_url("index.php/login/"), 'refresh');
        }
    }

    public function logout() {
        session_start();
        session_unset();
        redirect(base_url("index.php/login/"), 'refresh');
        //session_destroy("logged");
    }

    public function recuperarSenha() {
        session_start();
        $login = $_POST["email"];

        $sql = "select * from usuario where email = '$login'";
        $users = $this->db->query($sql);
        if ($users->num_rows() > 0) {
            foreach ($users->result() as $row) {
                $senha = $row->senha;
                $nome = $row->nome;
            }
            $this->load->library('email');

            $this->email->from($login, $nome);
            $this->email->to('contato@areabrasil.com.br');
            #$this->email->cc('another@another-example.com'); 
            #$this->email->bcc('them@their-example.com'); 

            $this->email->subject('Recuperação de Senha - Área Brasil');
            $this->email->message('Senha: ' . $senha);
            if ($this->email->send()) {
                $_SESSION["mensagem"] = "Email enviado com sucesso <br />";
            } else {
                $_SESSION["mensagem"] = "Algo deu errado. Email não enviado <br />";
            }
        } else {
            $_SESSION["mensagem"] = "Email não encontrado";
        }
        echo $_SESSION["mensagem"];
        //redirect(base_url("index.php/login/"), 'refresh');
    }

    public function verificaEmail() {

        session_start();
        $this->load->Model("modelutilitarios");
        $users = $this->modelutilitarios->verificaEmail($_POST['email']);
        if ($users->num_rows() > 0) {
            echo 1;
        } else {
            echo 0;
        }
    }

}
