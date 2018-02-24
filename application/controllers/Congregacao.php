<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Congregacao extends CI_Controller {
	
	public function listar(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$this->load->model("Modelcongregacao");
		$parametros = array(
			"congregacoes" => $this->Modelcongregacao->getCongregacoes()
		);
		
		$this->load->model("Modelmembro");		
		$parametrosnavbar = array(
			"membros_carteirinha" => $this->Modelmembro->getMembros()
		);
		$this->load->view('header');
		$this->load->view('navbar',$parametrosnavbar);
		$this->load->view('menu');
		$this->load->view('congregacao/listarcongregacoes',$parametros);
	}


	public function cadastro()
	{ 
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$this->load->model("Modelcongregacao");
        $this->load->model("Modelutilitarios");
		$parametros = array(
			"estados" => $this->Modelutilitarios->getEstados()
		);
		
		$this->load->model("Modelmembro");		
		$parametrosnavbar = array(
			"membros_carteirinha" => $this->Modelmembro->getMembros()
		);
		
		$this->load->view('header');
		$this->load->view('navbar', $parametrosnavbar);
		$this->load->view('menu');
		$this->load->view('congregacao/cadastrarcongregacao',$parametros);
	}
	
	public function cadastrar(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$parametros = array(
				"descricao"=>$_POST["descricao"],				
				"logradouro"=>$_POST["logradouro"],				
				"numero"=>$_POST["numero"],				
				"bairro"=>$_POST["bairro"],				
				"complemento"=>$_POST["complemento"],				
				"idCidade"=>$_POST["cidade"],				
				"cep"=>$_POST["cep"],				
				"telefone"=>$_POST["telefone"],				
				"email"=>$_POST["email"]			
			
			);
		
		$this->load->model("Modelcongregacao");
		if ($this->Modelcongregacao->cadastrar($parametros)){
			$_SESSION["msg_ok"]="Congregado cadastrado com sucesso";
		}else{
			$_SESSION["msg_fail"]="Congregado não cadastrado, Contate o administrador";
		}
	}
}