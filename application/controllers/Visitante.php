<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Visitante extends CI_Controller {

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

		$this->load->view('navbar', $parametrosnavbar);

		$this->load->view('menu');

		$this->load->view('cadastrarvisitante',$parametros);

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

	}

}