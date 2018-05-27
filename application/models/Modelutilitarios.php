<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modelutilitarios extends CI_Model {
	public function getEstados(){
		$this->db->select("*");
        $this->db->from("estado");
        return $this->db->get();
		
	}
	
	public function getCidades($codEstado){
		$this->db->select("*");
        $this->db->from("cidade");
        $this->db->where("codEstado", $codEstado);
        return $this->db->get();
		
	}
	
	public function getCargos(){
		$this->db->select("*");
        $this->db->from("cargo");
        return $this->db->get();
		
	}
	
}