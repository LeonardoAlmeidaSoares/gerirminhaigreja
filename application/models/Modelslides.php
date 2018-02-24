<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Modelslides extends CI_Model {
	
	public function getSlides(){

		$this->db->select("*");

        $this->db->from("site_slides");

        return $this->db->get();

		

	}
	
	public function Cadastrar($parametros) {        

		return $this->db->insert("site_slides",$parametros);

    }
	
	public function Excluir($cod){
		 return $this->db->delete('site_slides', array('idSlide' => $cod));
	}

	
}