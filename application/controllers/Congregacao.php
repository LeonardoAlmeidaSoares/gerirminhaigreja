<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Congregacao extends CI_Controller {
	
	public function listar(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$this->load->model("Modelcongregacao");
		$this->load->model("Modelutilitarios");
		$parametros = array(
			"congregacoes" => $this->Modelcongregacao->getCongregacoes(),
			"estados" => $this->Modelutilitarios->getEstados()
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
				"email"=>$_POST["email"],
				"codInstituicao" => $_SESSION["idInstituicao"]
			
			);
		
		$this->load->model("Modelcongregacao");
		if ($this->Modelcongregacao->cadastrar($parametros)){
			$_SESSION["msg_ok"]="Congregado cadastrado com sucesso";
		}else{
			$_SESSION["msg_fail"]="Congregado não cadastrado, Contate o administrador";
		}
		
		redirect(base_url("index.php/congregacao/listar"));

	}
	
	public function get(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
        $this->load->model("Modelcongregacao");
        $post = $this->Modelcongregacao->get($_POST["cod"]);
        foreach ($post->result() as $row) {
            echo $row->estado . '&' . $row->idCidade . '&' . $row->descricao . '&' . $row->logradouro . '&' . $row->numero . '&' . $row->bairro . '&' . $row->complemento . 
			'&' . $row->cep . '&' . $row->telefone . '&' . $row->email;
        }
	}
	
	public function Alterar() {
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
				
            if ($this->Modelcongregacao->Alterar($parametros,$_POST["txtCod"])) {
                $_SESSION["mensagem"] .= "Congregação alterada com sucesso";
                $_SESSION["tipoMensagem"] = "success";            
                
            } else {
                $_SESSION["mensagem"] .= "Algo deu errado. Entre em contato com o suporte";
                $_SESSION["tipoMensagem"] = "danger";
            }
			header("location:" . base_url("index.php/congregacao/listar"));      
           
        /*} else {
            header("location:" . base_url("index.php/login"));
        }*/
    }
	
	public function Inativar() {
         session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
        $this->load->model("Modelmembro");
        if ($this->Modelmembro->alterar(array("status"=>$_POST["status"]),$_POST["cod"])) {
            echo "Membro inativado com sucesso";
        } else {
            echo "Algo deu errado. Contate o administrador";
        }
    }
}