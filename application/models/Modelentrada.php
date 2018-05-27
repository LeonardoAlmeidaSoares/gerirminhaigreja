<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modelentrada extends CI_Model {

    public function getEntradas() {
        $this->db->select("*");
        $this->db->from("entrada");
        return $this->db->get();
    }

    public function Cadastrar($parametros) {
        return $this->db->insert("entrada", $parametros);
    }

    public function Editar($parametros, $cod) {
        $this->db->where('idEvento', $cod);
        return $this->db->update('site_eventos', $parametros);
    }

    public function Excluir($cod) {
        return $this->db->delete('site_eventos', array('idEvento' => $cod));
    }

    public function getTipo() {
        $this->db->select("*");
        $this->db->from("tipo_entrada");
        return $this->db->get();
    }

}
