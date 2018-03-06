<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo extends CI_Controller {
	
	public function listar(){
	
		session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$this->load->model("Modelutilitarios");
        $this->load->model("Modelcargos");
        $this->load->model("Modelmembro");
		
		$parametrosnavbar = array(
			"membros_carteirinha" => $this->Modelmembro->getMembros()
		);
		
		$parametros = array(
			"cargos" => $this->Modelcargos->getCargos()
		);
		
		$this->load->view('header');
		$this->load->view('navbar',$parametrosnavbar);
		$this->load->view('menu');
		$this->load->view('cargo/listarcargos',$parametros);
	}
	
	public function cadastro()
	{ 
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
        $this->load->model("Modelutilitarios");
		$parametros = array(
			"estados" => $this->Modelutilitarios->getEstados()
		);
		
		$this->load->model("Modelmembro");		
		$parametrosnavbar = array(
			"membros_carteirinha" => $this->Modelmembro->getMembros()
		);
		$this->load->view('header');
		$this->load->view('navbar',$parametrosnavbar);
		$this->load->view('menu');
		$this->load->view('cargo/cadastrarcargo',$parametros);
	}
	
	public function cadastrar(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$descricao = $_POST["descricao"];
		
		$this->load->model("Modelcargos");
		if ($this->Modelcargos->cadastrar($descricao)){
			$_SESSION["msg_ok"]="Cargo cadastrado com sucesso";
		}else{
			$_SESSION["msg_fail"]="Cargo não cadastrado, Contate o administrador";
		}
		header("location:" . base_url("index.php/cargo/listar"));
	}
	
	public function alterar(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$descricao = $_POST["descricao"];
		
		$this->load->model("Modelcargos");
		if ($this->Modelcargos->alterar(array("descricao"=>$descricao),$_POST["txtCod"])){
			$_SESSION["msg_ok"]="Cargo alterado com sucesso";
		}else{
			$_SESSION["msg_fail"]="Cargo não alterado, Contate o administrador";
		}
		header("location:" . base_url("index.php/cargo/listar"));
	}
	
	public function getCargo(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
        $this->load->model("Modelcargos");
        $cargo = $this->Modelcargos->getCargo($_POST["cod"]);
        foreach ($cargo->result() as $row) {
            echo $row->descricao;
        }
	}
	
	public function Inativar() {
        session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
        $this->load->model("Modelcargos");
        if ($this->Modelcargos->alterar(array("status"=>$_POST["status"]),$_POST["cod"])) {
            echo "Registro inativado com sucesso";
        } else {
            echo "Algo deu errado. Contate o administrador";
        }
    }
}