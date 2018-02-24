<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modeldepartamento extends CI_Model {
	
	public function Cadastrar($parametros) {
        $this->db->insert("departamento", array("descricao"=>$parametros));
		return $this->db->insert_id();
    }
	
	public function cadastrarResponsavel($idDepartamento,$idMembro) {
        return $this->db->insert("membro_departamento", array("idDepartamento"=>$idDepartamento, "idMembro"=>$idMembro, "responsavel" =>1));
		
    }
	
	public function getMembros(){
		return $this->db->select("*")->from("membro")->get();
	}
	
}