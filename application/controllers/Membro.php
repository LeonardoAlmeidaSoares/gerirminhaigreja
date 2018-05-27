<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Membro extends CI_Controller {

    function __construct() {
        parent::__construct();

        session_start();
        
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }

        $this->load->Model("Modelmembro", "membro");
    }
    
    public function listar() {

        $this->load->model("Modelutilitarios");
        $this->load->model("Modelcongregacao");
        $parametrosnavbar = array(
            "membros_carteirinha" => $this->membro->getMembros()
        );

        $parametros = array(
            "membros" => $this->membro->getMembros(),
            "estados" => $this->Modelutilitarios->getEstados(),
            "cargos" => $this->Modelutilitarios->getCargos(),
            "cong" => $this->Modelcongregacao->getCongregacoes()
        );
        $this->load->view('header');
        $this->load->view('navbar', $parametrosnavbar);
        $this->load->view('menu');
        $this->load->view('membro/listarmembros', $parametros);
    }

    public function cadastro() {
        
        $this->load->model("Modelutilitarios");
        $this->load->model("Modelcongregacao");
        $parametros = array(
            "estados" => $this->Modelutilitarios->getEstados(),
            "cargos" => $this->Modelutilitarios->getCargos(),
            "cong" => $this->Modelcongregacao->getCongregacoes()
        );

        $parametrosnavbar = array(
            "membros_carteirinha" => $this->membro->getMembros()
        );

        $this->load->view('header');
        $this->load->view('navbar', $parametrosnavbar);
        $this->load->view('menu');
        $this->load->view('membro/cadastrarmembro', $parametros);
    }

    public function Cadastrar() {
        
        $parametros = array(
            "nome" => $_POST["nome"],
            "nascimento" => implode("-", array_reverse(explode("/", $_POST["nascimento"]))),
            "logradouro" => $_POST["logradouro"],
            "numero" => $_POST["numero"],
            "bairro" => $_POST["bairro"],
            "complemento" => $_POST["complemento"],
            "idCidade" => $_POST["cidade"],
            "cep" => $_POST["cep"],
            "telefone" => $_POST["telefone"],
            "email" => $_POST["email"],
            "cpf" => $_POST["cpf"],
            "rg" => $_POST["rg"],
            "batismo" => implode("-", array_reverse(explode("/", $_POST["batismo"]))),
            "admissao" => implode("-", array_reverse(explode("/", $_POST["admissao"]))),
            "idNaturalidade" => $_POST["naturalidade"],
            "sexo" => $_POST["sexo"],
            "cor" => $_POST["cor"],
            "idCargo" => $_POST["cargo"],
            "idCongregacao" => $_POST["congregacao"],
            "estadocivil" => $_POST["estadocivil"],
            "pai" => $_POST["pai"],
            "mae" => $_POST["mae"],
            "matricula" => $_POST["matricula"]
        );
        //var_dump($parametros);

        if (!empty($_FILES['userfile']['name'])) {
            $imagem = explode(".", $_FILES['userfile']['name']);
            $comp = date('YmdHHiiss');
            $parametros["foto"] = "http://www.ieadplan.com.br/bancoImagens/fotomembro/" . $imagem[0] . $comp . '.' . $imagem[1];
            $uploadfile = dirname(getcwd()) . "/bancoImagens/fotomembro/" . $imagem[0] . $comp . '.' . $imagem[1];
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                $_SESSION["mensagem"] = "Upload ok. ";
            } else {
                $_SESSION["mensagem"] = "Upload não ok. ";
            }
        }

        if ($this->membro->Cadastrar($parametros)) {
            $_SESSION["mensagem"] = "Usuário cadastrado com sucesso";
            $_SESSION["tipoMensagem"] = "success";
        } else {
            $_SESSION["mensagem"] = "Algo deu errado. Usuário não cadastrado";
            $_SESSION["tipoMensagem"] = "danger";
        }
        header("location:" . base_url("index.php/membro/cadastro"));

    }

    public function getMembro() {

        $this->load->model("modelcidades", "cidades");
        
        $post = $this->membro->getMembro($_POST["cod"]);
        $dados = $post->result_array();

        $dados["cidades"] = $this->cidades->getCidadesDoMesmoEstado($dados[0]["idCidade"])->result();

        echo json_encode($dados);
    }

    public function Alterar() {
        
        $parametros = array(
            "nome" => trim(filter_input(INPUT_POST, "nome")),
            "nascimento" => implode("-", array_reverse(explode("/", $_POST["nascimento"]))),
            "logradouro" => trim(filter_input(INPUT_POST, "logradouro")),
            "numero" => trim(filter_input(INPUT_POST, "numero")),
            "bairro" => trim(filter_input(INPUT_POST, "bairro")),
            "complemento" => trim(filter_input(INPUT_POST, "complemento")),
            "idCidade" => intval(trim(filter_input(INPUT_POST, "cidade"))),
            "cep" => trim(filter_input(INPUT_POST, "cep")),
            "telefone" => trim(filter_input(INPUT_POST, "telefone")),
            "email" => trim(filter_input(INPUT_POST, "email")),
            "cpf" => trim(filter_input(INPUT_POST, "cpf")),
            "rg" => trim(filter_input(INPUT_POST, "rg")),
            "batismo" => implode("-", array_reverse(explode("/", trim(filter_input(INPUT_POST, "batismo"))))),
            "admissao" => implode("-", array_reverse(explode("/", trim(filter_input(INPUT_POST, "admissao"))))),
            "idNaturalidade" => intval(trim(filter_input(INPUT_POST, "naturalidade"))),
            "sexo" => trim(filter_input(INPUT_POST, "sexo")),
            "cor" => trim(filter_input(INPUT_POST, "cor")),
            "idCargo" => intval(trim(filter_input(INPUT_POST, "cargo"))),
            "idCongregacao" => trim(filter_input(INPUT_POST, "congregacao"))
        );
        
        if (!empty($_FILES['userfile']['name'])) {
            $imagem = explode(".", $_FILES['userfile']['name']);
            $comp = date('YmdHHiiss');
            $parametros["foto"] = dirname(getcwd()) . "/bancoImagens/fotomembro/" . $imagem[0] . $comp . '.' . $imagem[1];
            $uploadfile = dirname(getcwd()) . "/bancoImagens/fotomembro/" . $imagem[0] . $comp . '.' . $imagem[1];
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                $_SESSION["mensagem"] = "Upload ok. ";
            } else {
                $_SESSION["mensagem"] = "Upload não ok. ";
            }
        }

        if ($this->membro->Alterar($parametros, $_POST["txtCod"])) {
            $_SESSION["mensagem"] .= "Usuário alterado com sucesso";
            $_SESSION["tipoMensagem"] = "success";
        } else {
            $_SESSION["mensagem"] .= "Algo deu errado. Usuário não cadastrado";
            $_SESSION["tipoMensagem"] = "danger";
        }
        header("location:" . base_url("index.php/membro/listar"));

    }

    public function Inativar() {
        
        if ($this->membro->alterar(array("status" => $_POST["status"]), $_POST["cod"])) {
            echo "Membro inativado com sucesso";
        } else {
            echo "Algo deu errado. Contate o administrador";
        }
    }

    public function Carteirinha() {
        
        $x = $_POST['teste'];
        $parametros = array(
            "membros" => $this->membro->getMembrosCarteirinha($x)
        );
        $this->load->view('carteirinha', $parametros);
    }

}
