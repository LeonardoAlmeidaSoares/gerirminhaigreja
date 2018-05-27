<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membro extends CI_Controller {
	public function listar(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$this->load->model("Modelutilitarios");
        $this->load->model("Modelcongregacao");
		$this->load->model("Modelmembro");
		
		$this->load->model("Modelmembro");		
		$parametrosnavbar = array(
			"membros_carteirinha" => $this->Modelmembro->getMembros()
		);
		
		$parametros = array(
			"membros" => $this->Modelmembro->getMembros(),
			"estados" => $this->Modelutilitarios->getEstados(),
			"cargos" => $this->Modelutilitarios->getCargos(),
			"cong" => $this->Modelcongregacao->getCongregacoes()
		);
		$this->load->view('header');
		$this->load->view('navbar',$parametrosnavbar);
		$this->load->view('menu');
		$this->load->view('membro/listarmembros',$parametros);
	}
	public function cadastro()
	{ 
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
        $this->load->model("Modelutilitarios");
        $this->load->model("Modelcongregacao");
		$parametros = array(
			"estados" => $this->Modelutilitarios->getEstados(),
			"cargos" => $this->Modelutilitarios->getCargos(),
			"cong" => $this->Modelcongregacao->getCongregacoes()
		);
		
		$this->load->model("Modelmembro");		
		$parametrosnavbar = array(
			"membros_carteirinha" => $this->Modelmembro->getMembros()
		);
		
		$this->load->view('header');
		$this->load->view('navbar', $parametrosnavbar);
		$this->load->view('menu');
		$this->load->view('membro/cadastrarmembro',$parametros);
	}
	public function Cadastrar() {
        session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
			$parametros = array(
				"nome"=>$_POST["nome"],				
				"nascimento"=>implode("-",array_reverse(explode("/",$_POST["nascimento"]))),				
				"logradouro"=>$_POST["logradouro"],				
				"numero"=>$_POST["numero"],				
				"bairro"=>$_POST["bairro"],				
				"complemento"=>$_POST["complemento"],				
				"idCidade"=>$_POST["cidade"],				
				"cep"=>$_POST["cep"],				
				"telefone"=>$_POST["telefone"],				
				"email"=>$_POST["email"],				
				"cpf"=>$_POST["cpf"],				
				"rg"=>$_POST["rg"],				
				"batismo"=>implode("-",array_reverse(explode("/",$_POST["batismo"]))),				
				"admissao"=>implode("-",array_reverse(explode("/",$_POST["admissao"]))),			
				"idNaturalidade"=>$_POST["naturalidade"],				
				"sexo"=>$_POST["sexo"],				
				"cor"=>$_POST["cor"],				
				"idCargo"=>$_POST["cargo"],				
				"idCongregacao"=>$_POST["congregacao"],				
				"estadocivil"=>$_POST["estadocivil"],				
				"pai"=>$_POST["pai"],				
				"mae"=>$_POST["mae"],				
				"matricula" => $_POST["matricula"]
			);
			//var_dump($parametros);
                  
            if (!empty($_FILES['userfile']['name'])) {
                $imagem = explode(".", $_FILES['userfile']['name']);
                $comp = date('YmdHHiiss');
                $parametros["foto"] = "http://www.ieadplan.com.br/bancoImagens/fotomembro/" . $imagem[0] . $comp . '.' . $imagem[1];
                $uploadfile = dirname(getcwd()) . "/bancoImagens/fotomembro/" . $imagem[0] . $comp . '.' . $imagem[1];
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                    $_SESSION["mensagem"] = "Upload ok. ";
                } else {
                    $_SESSION["mensagem"] = "Upload não ok. ";
                }
            }           

            $this->load->model("Modelmembro");                   
				
            if ($this->Modelmembro->Cadastrar($parametros)) {
                $_SESSION["mensagem"] = "Usuário cadastrado com sucesso";
                $_SESSION["tipoMensagem"] = "success";            
                
            } else {
                $_SESSION["mensagem"] = "Algo deu errado. Usuário não cadastrado";
                $_SESSION["tipoMensagem"] = "danger";
            }
			header("location:" . base_url("index.php/membro/cadastro"));
                
            
           
           
        /*} else {
            header("location:" . base_url("index.php/login"));
        }*/
    }
	
	public function getMembro(){

		session_start();

        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }

        $this->load->model("Modelmembro");
        $post = $this->Modelmembro->getMembro($_POST["cod"]);
        $dados = $post->result_array();

        //echo "DATA = " + $dados[0]->idCidade;

        //$dados["cidades"] = $this->db->query("select * from cidade where codEstado = (select codEstado from cidade where codCidade = " . $dados[0]["idCidade"] . ")");

        //echo $this->db->last_query();

        echo json_encode($dados);

	}
	
	public function Alterar() {
        session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
			$parametros = array(
				"nome"=>$_POST["nome"],				
				"nascimento"=>implode("-",array_reverse(explode("/",$_POST["nascimento"]))),				
				"logradouro"=>$_POST["logradouro"],				
				"numero"=>$_POST["numero"],				
				"bairro"=>$_POST["bairro"],				
				"complemento"=>$_POST["complemento"],				
				"idCidade"=>$_POST["cidade"],				
				"cep"=>$_POST["cep"],				
				"telefone"=>$_POST["telefone"],				
				"email"=>$_POST["email"],				
				"cpf"=>$_POST["cpf"],				
				"rg"=>$_POST["rg"],				
				"batismo"=>implode("-",array_reverse(explode("/",$_POST["batismo"]))),				
				"admissao"=>implode("-",array_reverse(explode("/",$_POST["admissao"]))),			
				"idNaturalidade"=>$_POST["naturalidade"],				
				"sexo"=>$_POST["sexo"],				
				"cor"=>$_POST["cor"],				
				"idCargo"=>$_POST["cargo"],				
				"idCongregacao"=>$_POST["congregacao"],
				"matricula" => $_POST["matricula"]				
			
			);
			//var_dump($parametros);
            if (!empty($_FILES['userfile']['name'])) {
                $imagem = explode(".", $_FILES['userfile']['name']);
                $comp = date('YmdHHiiss');
                $parametros["foto"] = dirname(getcwd()) . "/bancoImagens/fotomembro/" . $imagem[0] . $comp . '.' . $imagem[1];
                $uploadfile = dirname(getcwd()) . "/bancoImagens/fotomembro/" . $imagem[0] . $comp . '.' . $imagem[1];
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                    $_SESSION["mensagem"] = "Upload ok. ";
                } else {
                    $_SESSION["mensagem"] = "Upload não ok. ";
                }
            }           

            $this->load->model("Modelmembro");                   
				
            if ($this->Modelmembro->Alterar($parametros,$_POST["txtCod"])) {
                $_SESSION["mensagem"] .= "Usuário alterado com sucesso";
                $_SESSION["tipoMensagem"] = "success";            
                
            } else {
                $_SESSION["mensagem"] .= "Algo deu errado. Usuário não cadastrado";
                $_SESSION["tipoMensagem"] = "danger";
            }
			header("location:" . base_url("index.php/membro/listar"));      
           
        /*} else {
            header("location:" . base_url("index.php/login"));
        }*/
    }
	
	public function Inativar() {
         session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
        $this->load->model("Modelmembro");
        if ($this->Modelmembro->alterar(array("status"=>$_POST["status"]),$_POST["cod"])) {
            echo "Membro inativado com sucesso";
        } else {
            echo "Algo deu errado. Contate o administrador";
        }
    }
	
	public function Carteirinha(){
		session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$this->load->model("Modelmembro");
		//$x= array();
		$x=$_POST['texte'];
		//var_dump($x);
		$parametros = array(
			"membros" => $this->Modelmembro->getMembrosCarteirinha($x)
		);		
		$this->load->view('carteirinha',$parametros);
	}
}
