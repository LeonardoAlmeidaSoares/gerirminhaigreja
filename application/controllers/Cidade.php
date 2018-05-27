<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Cidade extends CI_Controller {   
		public function getCidades(){
		session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
			$codEstado = $_POST["idEstado"];        
			$sql = "select * from cidade where codEstado = ?";                
			$res = $this->db->query($sql, array($codEstado));                
			foreach($res->result() as $row){            
				echo "<option value = '$row->codCidade'>$row->descricao</option>";       
			
			}    
		}
	}