<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modelmembro extends CI_Model {
	
	public function Cadastrar($parametros) {
        return $this->db->insert("membro", $parametros);
    }
	
	public function Alterar($parametros,$cod) {
       $this->db->where('idMembro', $cod);
        return $this->db->update('membro', $parametros);
    }
	
	public function getMembros(){
		return $this->db->get("membro");
	}
	
	public function getMembro($codMembro){
		return $this->db->select("m.*, uf1.codEstado as estadoNatural, uf2.codEstado as estadoAtual")
			->from("membro m")
			->join("cidade c1", "c1.codCidade = m.idNaturalidade")
			->join("cidade c2", "c2.codCidade = m.idCidade")
			->join("estado uf1","uf1.codEstado = c1.codEstado")
			->join("estado uf2", "uf2.codEstado = c2.codEstado")
			->where("idMembro",$codMembro)
			->get();
	}
	public function getMembrosCarteirinha($parametros){
		return $this->db->select("m.*, uf1.codEstado as estadoNatural, uf2.codEstado as estadoAtual")
			->from("membro m")
			->join("cidade c1", "c1.codCidade = m.idNaturalidade")
			->join("cidade c2", "c2.codCidade = m.idCidade")
			->join("estado uf1","uf1.codEstado = c1.codEstado")
			->join("estado uf2", "uf2.codEstado = c2.codEstado")						
			->where("idMembro in ($parametros)",null)
			->get();
	}
	
}