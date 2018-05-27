<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Entrada extends CI_Controller {
	
	public function listar(){
		session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$this->load->model("ModelEntrada");
		$parametros = array(
			"entradas" => $this->ModelEntrada->getEntradas(),
		);
		
		$this->load->model("Modelmembro");		
		$parametrosnavbar = array(
			"membros_carteirinha" => $this->Modelmembro->getMembros()
		);
		$this->load->view('header');
		$this->load->view('navbar',$parametrosnavbar);
		$this->load->view('menu');
		$this->load->view('entrada/listarentradas',$parametros);
	}

	
}