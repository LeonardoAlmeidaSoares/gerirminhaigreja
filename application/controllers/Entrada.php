<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Entrada extends CI_Controller {

    function __construct() {
        parent::__construct();

        session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }

        $this->load->model("Modelentrada");
        $this->load->model("Modelmembro");
        $this->load->model("Modelcongregacao");
    }

    public function listar() {
        $parametros = array(
//            "entradas" => $this->ModelEntrada->getEntradas(),
        );

        $parametrosnavbar = array(
            "membros_carteirinha" => $this->Modelmembro->getMembros()
        );
        $this->load->view('header');
        $this->load->view('navbar', $parametrosnavbar);
        $this->load->view('menu');
        $this->load->view('entrada/listarentradas', $parametros);
    }

    public function cadastro() {
        $parametros = array(
            "entradas" => $this->Modelentrada->getEntradas(),
            "congrecacoes" => $this->Modelcongregacao->getCongregacoes(),
            "tipo_entrada" => $this->Modelentrada->getTipo()
        );

        $parametrosnavbar = array(
            "membros_carteirinha" => $this->Modelmembro->getMembros()
        );
        $this->load->view('header');
        $this->load->view('navbar', $parametrosnavbar);
        $this->load->view('menu');
        $this->load->view('entrada/cadastrarentradas', $parametros);
    }

    public function Cadastrar() {
        
        $parametros = array(
            "descricao" => $_POST["descricao"],
            "momento" => implode("-", array_reverse(explode("/", $_POST["data_entrada"]))),
            "codCongregacao" => $_POST["congregacao"],
            "codTipoentrada" => $_POST["tipo"],
            "valor" => $_POST["valor"]
        );

        $this->load->model("Modelmembro");

        if ($this->Modelentrada->Cadastrar($parametros)) {
            $_SESSION["mensagem"] = "Entrada cadastrada com sucesso";
            $_SESSION["tipoMensagem"] = "success";
        } else {
            $_SESSION["mensagem"] = "Algo deu errado. Entrada não cadastrada";
            $_SESSION["tipoMensagem"] = "danger";
        }
        header("location:" . base_url("index.php/entrada/cadastro"));

    }

}
