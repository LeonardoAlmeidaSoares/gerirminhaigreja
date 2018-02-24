<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Site extends CI_Controller {
	
	public function listarSlides(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$this->load->model("Modelslides");
		$parametros = array(
			"slides" => $this->Modelslides->getSlides()
		);		

		$this->load->model("Modelmembro");
		$parametrosnavbar = array(
			"membros_carteirinha" => $this->Modelmembro->getMembros()
		);
		$this->load->view('header');
		$this->load->view('navbar',$parametrosnavbar);
		$this->load->view('menu');
		$this->load->view('site/listarSlides',$parametros);
	}
	
	public function cadastrarSlides(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
			

		$this->load->model("Modelmembro");	
		$parametrosnavbar = array(
			"membros_carteirinha" => $this->Modelmembro->getMembros()
		);
		$this->load->view('header');
		$this->load->view('navbar',$parametrosnavbar);
		$this->load->view('menu');
		$this->load->view('site/cadastrarSlide');

	}
	
	public function cadastroSlide(){
		session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$parametros['momento'] = date('Y-m-d H:i');
		$parametros['status'] = 1;
		if (!empty($_FILES['userfile']['name'])) {
            $imagem = explode(".", $_FILES['userfile']['name']);
            $comp = date('YmdHHiiss');
            $parametros["caminho"] = "http://www.ieadplan.com.br/bancoImagens/slide/" . $imagem[0] . $comp . '.' . $imagem[1];
            $uploadfile = dirname(getcwd()) . "/bancoImagens/slide/" . $imagem[0] . $comp . '.' . $imagem[1];
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                $_SESSION["mensagem"] = "Upload ok. ";
            } else {
                $_SESSION["mensagem"] = "Upload não ok. ";
            }
        }
		
		$this->load->model("Modelslides");                   
				
        if ($this->Modelslides->Cadastrar($parametros)) {
            $_SESSION["mensagem"] = "Slide cadastrado com sucesso";
            $_SESSION["tipoMensagem"] = "success";            
            
        } else {
            $_SESSION["mensagem"] = "Algo deu errado. Slide não cadastrado";
            $_SESSION["tipoMensagem"] = "danger";
        }
		
		redirect(base_url("index.php/Site/listarSlides"));
		
	}
	
	public function excluirSlide(){		
		$this->load->model("Modelslides");
		if($this->Modelslides->Excluir($_POST["cod"])) {
			echo "Excluído com suceddo!";
		}else{
			echo "Algo deu errado! Chama a Paloma (32) 9 9154-9101";
		}
	}
	
	public function listarNoticias(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$this->load->model("Modelnoticia");
		$parametros = array(
			"noticias" => $this->Modelnoticia->getNoticias()
		);		

		$this->load->model("Modelmembro");
		$parametrosnavbar = array(
			"membros_carteirinha" => $this->Modelmembro->getMembros()
		);
		$this->load->view('header');
		$this->load->view('navbar',$parametrosnavbar);
		$this->load->view('menu');
		$this->load->view('site/listarNoticia',$parametros);
	}
	
	public function cadastrarNoticia(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
			

		$this->load->model("Modelmembro");	
		$parametrosnavbar = array(
			"membros_carteirinha" => $this->Modelmembro->getMembros()
		);
		$this->load->view('header');
		$this->load->view('navbar',$parametrosnavbar);
		$this->load->view('menu');
		$this->load->view('site/cadastrarNoticia');

	}
	
	public function cadastroNoticia(){
		session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$parametros['momento'] = date('Y-m-d H:i');
		$parametros['titulo'] = $_POST['titulo'];
		$parametros['texto'] = $_POST['editor1'];
		$parametros['status'] = 1;
		$parametros['categoria'] = 0;
		
		if (!empty($_FILES['userfile']['name'])) {
            $imagem = explode(".", $_FILES['userfile']['name']);
            $comp = date('YmdHHiiss');
            $parametros["imagem_destacada"] = "http://www.ieadplan.com.br/bancoImagens/noticias/" . $imagem[0] . $comp . '.' . $imagem[1];
            $uploadfile = dirname(getcwd()) . "/bancoImagens/noticias/" . $imagem[0] . $comp . '.' . $imagem[1];
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                $_SESSION["mensagem"] = "Upload ok. ";
            } else {
                $_SESSION["mensagem"] = "Upload não ok. ";
            }
        }
		
		$this->load->model("Modelnoticia");                   
				
        if ($this->Modelnoticia->Cadastrar($parametros)) {
            $_SESSION["mensagem"] = "Notícia cadastrado com sucesso";
            $_SESSION["tipoMensagem"] = "success";            
            
        } else {
            $_SESSION["mensagem"] = "Algo deu errado. Notícia não cadastrado";
            $_SESSION["tipoMensagem"] = "danger";
        }
		
		redirect(base_url("index.php/Site/listarNoticias"));
		
	}
	
	public function getNoticia(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
        $this->load->model("Modelnoticia");
        $post = $this->Modelnoticia->getNoticia($_POST["cod"]);
        foreach ($post->result() as $row) {
            echo $row->titulo . '|' . $row->texto . '|' . $row->imagem_destacada;
        }
	}
	
	public function editarNoticia(){
		session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$parametros['momento'] = date('Y-m-d H:i');
		$parametros['titulo'] = $_POST['titulo'];
		$parametros['texto'] = $_POST['editor1'];
		$parametros['status'] = 1;
		$parametros['categoria'] = 0;
		$cod=$_POST['txtCod'];
		
		if (!empty($_FILES['userfile']['name'])) {
            $imagem = explode(".", $_FILES['userfile']['name']);
            $comp = date('YmdHHiiss');
            $parametros["imagem_destacada"] = "http://www.ieadplan.com.br/bancoImagens/noticias/" . $imagem[0] . $comp . '.' . $imagem[1];
            $uploadfile = dirname(getcwd()) . "/bancoImagens/noticias/" . $imagem[0] . $comp . '.' . $imagem[1];
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                $_SESSION["mensagem"] = "Upload ok. ";
            } else {
                $_SESSION["mensagem"] = "Upload não ok. ";
            }
        }
		
		$this->load->model("Modelnoticia");                   
				
        if ($this->Modelnoticia->Editar($parametros, $cod)) {
            $_SESSION["mensagem"] = "Notícia cadastrado com sucesso";
            $_SESSION["tipoMensagem"] = "success";            
            
        } else {
            $_SESSION["mensagem"] = "Algo deu errado. Notícia não cadastrado";
            $_SESSION["tipoMensagem"] = "danger";
        }
		
		header("location:" . base_url("index.php/Site/listarNoticias"));
		
	}
	
	public function excluirNoticia(){		
		$this->load->model("Modelnoticia");
		if($this->Modelnoticia->Excluir($_POST["cod"])) {
			echo "Excluído com suceddo!";
		}else{
			echo "Algo deu errado! Chama a Paloma (32) 9 9154-9101";
		}
	}
	
	public function listarPosts(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$this->load->model("Modelnoticia");
		$parametros = array(
			"posts" => $this->Modelnoticia->getPosts(),
			"categorias" => $this->Modelnoticia->getCategorias()
		);		

		$this->load->model("Modelmembro");
		$parametrosnavbar = array(
			"membros_carteirinha" => $this->Modelmembro->getMembros()
		);
		$this->load->view('header');
		$this->load->view('navbar',$parametrosnavbar);
		$this->load->view('menu');
		$this->load->view('site/listarPosts',$parametros);
	}
	
	public function cadastrarPost(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$this->load->model("Modelnoticia");
		$parametros = array(
			"categorias" => $this->Modelnoticia->getCategorias()
		);	
		$this->load->model("Modelmembro");	
		$parametrosnavbar = array(
			"membros_carteirinha" => $this->Modelmembro->getMembros()
		);
		$this->load->view('header');
		$this->load->view('navbar',$parametrosnavbar);
		$this->load->view('menu');
		$this->load->view('site/cadastrarPost', $parametros);

	}
	
	public function cadastroPost(){
		session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$parametros['momento'] = date('Y-m-d H:i');
		$parametros['titulo'] = $_POST['titulo'];
		$parametros['texto'] = $_POST['editor1'];
		$parametros['status'] = 1;
		$parametros['categoria'] = 1;
		$parametros['idCategoriapost'] = $_POST['categoria'];;
		
		if (!empty($_FILES['userfile']['name'])) {
            $imagem = explode(".", $_FILES['userfile']['name']);
            $comp = date('YmdHHiiss');
            $parametros["imagem_destacada"] ="http://www.ieadplan.com.br/bancoImagens/noticias/" . $imagem[0] . $comp . '.' . $imagem[1];
            $uploadfile = dirname(getcwd()) . "/bancoImagens/noticias/" . $imagem[0] . $comp . '.' . $imagem[1];
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                $_SESSION["mensagem"] = "Upload ok. ";
            } else {
                $_SESSION["mensagem"] = "Upload não ok. ";
            }
        }
		
		$this->load->model("Modelnoticia");                   
				
        if ($this->Modelnoticia->Cadastrar($parametros)) {
            $_SESSION["mensagem"] = "Post cadastrado com sucesso";
            $_SESSION["tipoMensagem"] = "success";            
            
        } else {
            $_SESSION["mensagem"] = "Algo deu errado. Post não cadastrado";
            $_SESSION["tipoMensagem"] = "danger";
        }
		
		header("location:" . base_url("index.php/Site/listarPosts"));
		
	}
	
	public function getPost(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
        $this->load->model("Modelnoticia");
        $post = $this->Modelnoticia->getNoticia($_POST["cod"]);
        foreach ($post->result() as $row) {
            echo $row->titulo . '|' . $row->texto . '|' . $row->imagem_destacada . '|' . $row->idCategoriapost;
        }
	}
	
	public function editarPost(){
		session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$parametros['momento'] = date('Y-m-d H:i');
		$parametros['titulo'] = $_POST['titulo'];
		$parametros['texto'] = $_POST['editor1'];
		$cod = $_POST['txtCod'];
		$parametros['status'] = 1;
		$parametros['categoria'] = 1;
		$parametros['idCategoriapost'] = $_POST['categoria'];;
		
		if (!empty($_FILES['userfile']['name'])) {
            $imagem = explode(".", $_FILES['userfile']['name']);
            $comp = date('YmdHHiiss');
            $parametros["imagem_destacada"] ="http://www.ieadplan.com.br/bancoImagens/noticias/" . $imagem[0] . $comp . '.' . $imagem[1];
            $uploadfile = dirname(getcwd()) . "/bancoImagens/noticias/" . $imagem[0] . $comp . '.' . $imagem[1];
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                $_SESSION["mensagem"] = "Upload ok. ";
            } else {
                $_SESSION["mensagem"] = "Upload não ok. ";
            }
        }
		
		$this->load->model("Modelnoticia");                   
				
        if ($this->Modelnoticia->Editar($parametros, $cod)) {
            $_SESSION["mensagem"] = "Post Alterado com sucesso";
            $_SESSION["tipoMensagem"] = "success";            
            
        } else {
            $_SESSION["mensagem"] = "Algo deu errado. Post não alterado";
            $_SESSION["tipoMensagem"] = "danger";
        }
		
		header("location:" . base_url("index.php/Site/listarPosts"));
		
	}
	
	public function listarEventos(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$this->load->model("Modeleventos");
		$parametros = array(
			"eventos" => $this->Modeleventos->getEventos()
		);		

		$this->load->model("Modelmembro");
		$parametrosnavbar = array(
			"membros_carteirinha" => $this->Modelmembro->getMembros()
		);
		$this->load->view('header');
		$this->load->view('navbar',$parametrosnavbar);
		$this->load->view('menu');
		$this->load->view('site/listarEventos',$parametros);
	}
	
	public function cadastrarEvento(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
			

		$this->load->model("Modelmembro");	
		$parametrosnavbar = array(
			"membros_carteirinha" => $this->Modelmembro->getMembros()
		);
		$this->load->view('header');
		$this->load->view('navbar',$parametrosnavbar);
		$this->load->view('menu');
		$this->load->view('site/cadastrarEvento');

	}
	
	public function cadastroEvento(){
		session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$data = explode('/', $_POST['data']);
		$dataok = $data[2] . '-' . $data[1] . '-' . $data[0];
		$data_hora = $dataok . ' ' . $_POST['hora'] . ':00';
		$parametros['momento'] = date('Y-m-d H:i');
		$parametros['nome'] = $_POST['nome'];
		$parametros['descricao'] = $_POST['editor1'];
		$parametros['valor'] = $_POST['valor'];
		$parametros['local'] = $_POST['local'];
		$parametros['obs'] = $_POST['obs'];
		$parametros['data_hora'] = $data_hora;
		$parametros['status'] = 1;
		
		if (!empty($_FILES['userfile']['name'])) {
            $imagem = explode(".", $_FILES['userfile']['name']);
            $comp = date('YmdHHiiss');
            $parametros["imagem"] ="http://www.ieadplan.com.br/bancoImagens/evento/" . $imagem[0] . $comp . '.' . $imagem[1];
            $uploadfile = dirname(getcwd()) . "/bancoImagens/evento/" . $imagem[0] . $comp . '.' . $imagem[1];
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                $_SESSION["mensagem"] = "Upload ok. ";
            } else {
                $_SESSION["mensagem"] = "Upload não ok. ";
            }
        }
		
		
		
		$this->load->model("Modeleventos");                   
				
        if ($this->Modeleventos->Cadastrar($parametros)) {
            $_SESSION["mensagem"] = "Evento cadastrado com sucesso";
            $_SESSION["tipoMensagem"] = "success";            
            
        } else {
            $_SESSION["mensagem"] = "Algo deu errado. Evento não cadastrado";
            $_SESSION["tipoMensagem"] = "danger";
        }
		
		header("location:" . base_url("index.php/site/listarEventos"));
		
	}
	
	public function getEvento(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
        $this->load->model("Modeleventos");
        $post = $this->Modeleventos->getEvento($_POST["cod"]);
        foreach ($post->result() as $row) {
            echo date("d/m/Y", strtotime($row->data_hora)) . '|' . date("H:i", strtotime($row->data_hora)) . '|' . $row->nome . '|' . $row->descricao . '|' . $row->valor . '|' . $row->local . '|' . $row->obs . '|' . $row->imagem;
        }
	}
	
	public function editarEvento(){
		session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		$data = explode('/', $_POST['data']);
		$dataok = $data[2] . '-' . $data[1] . '-' . $data[0];
		$data_hora = $dataok . ' ' . $_POST['hora'] . ':00';
		$parametros['momento'] = date('Y-m-d H:i');
		$parametros['nome'] = $_POST['nome'];
		$parametros['descricao'] = $_POST['editor1'];
		$parametros['valor'] = $_POST['valor'];
		$parametros['local'] = $_POST['local'];
		$parametros['obs'] = $_POST['obs'];
		$parametros['data_hora'] = $data_hora;
		$parametros['status'] = 1;
		$cod = $_POST["txtCod"];
		
		if (!empty($_FILES['userfile']['name'])) {
            $imagem = explode(".", $_FILES['userfile']['name']);
            $comp = date('YmdHHiiss');
            $parametros["imagem"] ="http://www.ieadplan.com.br/bancoImagens/evento/" . $imagem[0] . $comp . '.' . $imagem[1];
            $uploadfile = dirname(getcwd()) . "/bancoImagens/evento/" . $imagem[0] . $comp . '.' . $imagem[1];
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                $_SESSION["mensagem"] = "Upload ok. ";
            } else {
                $_SESSION["mensagem"] = "Upload não ok. ";
            }
        }
		
		
		
		$this->load->model("Modeleventos");                   
				
        if ($this->Modeleventos->Editar($parametros, $cod)) {
            $_SESSION["mensagem"] = "Evento cadastrado com sucesso";
            $_SESSION["tipoMensagem"] = "success";            
            
        } else {
            $_SESSION["mensagem"] = "Algo deu errado. Evento não cadastrado";
            $_SESSION["tipoMensagem"] = "danger";
        }
		
		header("location:" . base_url("index.php/site/listarEventos"));
		
	}
	
	public function escluirEvento(){		
		$this->load->model("Modeleventos");
		if($this->Modeleventos->Excluir($_POST["cod"])) {
			echo "Excluído com suceddo!";
		}else{
			echo "Algo deu errado! Chama a Paloma (32) 9 9154-9101";
		}
	}
	
	public function institucional(){
		 session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		
		$parametros = array(
			"info" => $this->db->select("*")->from("site_institucional")->get()->row(0)
		);		

		$this->load->model("Modelmembro");
		$parametrosnavbar = array(
			"membros_carteirinha" => $this->Modelmembro->getMembros()
		);
		$this->load->view('header');
		$this->load->view('navbar',$parametrosnavbar);
		$this->load->view('menu');
		$this->load->view('site/institucional',$parametros);
	}
	
	public function updateInstitucional(){
		session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }
		
		$parametros['sobre_igreja'] = $_POST['editor1'];
		$parametros['sobre_pastores'] = $_POST['editor2'];
		$parametros['versiculo_dia'] = $_POST['editor3'];
		                  
				
        if ($this->db->update('site_institucional', $parametros)) {
            $_SESSION["mensagem"] = "Evento cadastrado com sucesso";
            $_SESSION["tipoMensagem"] = "success";            
            
        } else {
            $_SESSION["mensagem"] = "Algo deu errado. Evento não cadastrado";
            $_SESSION["tipoMensagem"] = "danger";
        }
		
		header("location:" . base_url("index.php/Site/institucional"));
		
	}
	
}