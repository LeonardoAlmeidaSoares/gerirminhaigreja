<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departamento extends CI_Controller {

	
	public function cadastro()
	{ 
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
        $this->load->model("Modelmembro");
		$parametros = array(
			"membros" => $this->Modelmembro->getMembros()
		);
		$parametrosnavbar = array(
			"membros_carteirinha" => $this->Modelmembro->getMembros()
		);
		$this->load->view('header');
		$this->load->view('navbar',$parametrosnavbar);
		$this->load->view('menu');
		$this->load->view('cadastrardepartamento',$parametros);
	}
	
	public function cadastrar(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$descricao = $_POST["descricao"];
		$idMembro = ($_POST["txtResponsavel"]);
		//echo($idMembro[1]);
		
		$this->load->model("Modeldepartamento");
		if ($id=$this->Modeldepartamento->cadastrar($descricao)){
			$_SESSION["msg_ok"]="Departamento cadastrado com sucesso";
			//echo $id;
			
			$cont = 0;
			foreach ($idMembro as $idR) {
				//echo $idMembro[$cont];
				$this->Modeldepartamento->cadastrarResponsavel($id,$idMembro[$cont]);
				$cont++;
			}
			
		}else{
			$_SESSION["msg_fail"]="Departamento não cadastrado, Contate o administrador";
		}
	}
}