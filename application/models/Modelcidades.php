<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modelcidades extends CI_Model {

    public function getCidades($codEstado = 0) {
        return ($codEstado == 0) 
            ? $this->db->get("cidade")
            : $this->db->get_where("cidade", array("codEstado" => $codEstado));
    }

    public function getCidade($cod) {
        return $this->db->get_where("cidade", array("codCidade" => $cod));
    }
    
    public function getCidadesDoMesmoEstado($codCidade){
        return $this->getCidades($this->getCidade($codCidade)->row(0)->codEstado);
    }

}
