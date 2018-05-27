<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modelcargos extends CI_Model {

    public function Cadastrar($descricao) {
        return $this->db->insert("cargo", array("descricao" => $descricao));
    }

    public function getCargos() {
        return $this->db->select("*")->from("cargo")->get();
    }

    public function getCargo($cod) {
        return $this->db->select("*")
                        ->from("cargo")
                        ->where("idCargo", $cod)
                        ->get();
    }

    public function Alterar($descricao, $cod) {
        $this->db->where('idCargo', $cod);
        return $this->db->update('cargo', $descricao);
    }

}
