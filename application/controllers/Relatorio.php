<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio extends CI_Controller {
	
	public function grafico1(){
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
		$this->load->view('relatorio/grafico1',$parametros);
	}
}