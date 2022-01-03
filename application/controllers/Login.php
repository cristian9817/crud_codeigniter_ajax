<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Login extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('loginModel');
			$this->load->helper('form', 'url');
			$this->load->model('rolModel');
		}
		public function index(){
			$this->load->view('juego/login');
		}
		public function login(){
			$usuario = $this->input->POST('usuario');
			$contraseña = $this->input->POST('contraseña');
			$resultado = $this->loginModel->login($usuario,$contraseña);
			if($resultado){
				$rol=array("rol"=>$this->rolModel->getAll());
				$this->load->view('juego/index',$rol);
			}else{
				$this->index();
			}
		}
	}

?>	
