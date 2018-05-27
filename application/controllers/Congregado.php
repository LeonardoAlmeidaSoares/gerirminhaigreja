<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Congregado extends CI_Controller {

	public function cadastro()

	{ 

		session_start();

        if (!isset($_SESSION["logged"])) {

            header("location:" . base_url("index.php/login"));

        }

		$this->load->model("Modelcongregacao");

        $this->load->model("Modelutilitarios");

		$this->load->model("Modelmembro");		

		$parametrosnavbar = array(

			"membros_carteirinha" => $this->Modelmembro->getMembros()

		);

		$parametros = array(

			"estados" => $this->Modelutilitarios->getEstados(),

			"cargos" => $this->Modelutilitarios->getCargos(),

			"cong" => $this->Modelcongregacao->getCongregacoes()

		);

		$this->load->view('header');

		$this->load->view('navbar',$parametrosnavbar);

		$this->load->view('menu');

		$this->load->view('congregado/cadastrarcongregado',$parametros);

	}

	

	public function cadastrar(){

		 session_start();

        if (!isset($_SESSION["logged"])) {

            header("location:" . base_url("index.php/login"));

        }

		$parametros = array(

				"nome"=>$_POST["nome"],				

				"nascimento"=>implode("-",array_reverse(explode("/",$_POST["nascimento"]))),				

				"logradouro"=>$_POST["logradouro"],				

				"numero"=>$_POST["numero"],				

				"bairro"=>$_POST["bairro"],				

				"complemento"=>$_POST["complemento"],				

				"idCidade"=>$_POST["cidade"],				

				"cep"=>$_POST["cep"],				

				"telefone"=>$_POST["telefone"],				

				"email"=>$_POST["email"],				

				"idCongregacao"=>$_POST["congregacao"]				

			

			);

		

		$this->load->model("Modelcongregado");

		if ($this->Modelcongregado->cadastrar($parametros)){

			$_SESSION["msg_ok"]="Congregado cadastrado com sucesso";

		}else{

			$_SESSION["msg_fail"]="Congregado não cadastrado, Contate o administrador";

		}

	}

}