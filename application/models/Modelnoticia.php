<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Modelnoticia extends CI_Model {
	
	public function getNoticias(){
		$this->db->select("*");
        $this->db->where("categoria", 0);
        $this->db->from("site_noticias");
        return $this->db->get();
	}
	
	public function getPosts(){
		$this->db->select("*");
        $this->db->where("categoria", 1);
        $this->db->from("site_noticias");
        return $this->db->get();
	}
	
	public function Cadastrar($parametros) { 
		return $this->db->insert("site_noticias",$parametros);
    }
	
	public function getNoticia($cod){
		return $this->db->select("*")
			->from("site_noticias")
			->where("idNoticia",$cod)
			->get();
	}
	
	public function Editar($parametros, $cod){		 
        $this->db->where('idNoticia', $cod);
        return $this->db->update('site_noticias', $parametros);		
	}
	
	
	
	public function Excluir($cod){
		 return $this->db->delete('site_noticias', array('idNoticia' => $cod));
	}
	
	public function getCategorias(){
		$this->db->select("*");
        $this->db->from("site_categoriaposts");
        return $this->db->get();		
	}

	
}