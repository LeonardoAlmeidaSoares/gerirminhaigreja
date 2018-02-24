<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		session_start();
        if (!isset($_SESSION["logged"])) {
            header("location:" . base_url("index.php/login"));
        }     

		$this->load->model("Modelmembro");		
		$parametrosnavbar = array(
			"membros_carteirinha" => $this->Modelmembro->getMembros()
		);
		$this->load->view('header');
		$this->load->view('navbar',$parametrosnavbar  );
		$this->load->view('menu');
		$this->load->view('welcome_message');
	}
}
