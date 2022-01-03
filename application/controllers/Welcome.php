<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('rolModel');
		$this->load->helper('form', 'url');
	}
	
	public function index()
	{
		
		$rol=array("rol"=>$this->rolModel->getAll());
		$this->load->view('juego/index',$rol);
	}
	public function formAdd(){
		$this->load->view('juego/addrol');
	}
	public function insert(){
		$rol = $this->input->POST('rol');
		$respuesta = $this->rolModel->insert($rol);

		if($respuesta){	
			$this->index();
		}else{
			$this->load->view('juego/rol');
		}
	}
	public function delete($id){
		$this->rolModel->delete($id);
		$this->index();
	}
	public function getById($id){
		$info=$this->rolModel->getById($id);
		$this->load->view('juego/editrol',$info);
	}

	public function update($id){
		$rol = $this->input->POST('rol');

		$rol1 = array("rol"=>$rol);
		$this->rolModel->update($rol1,$id);
		$this->index();


	}
	public function findRol(){
		//$rol1 = $this->input->POST('buscar');
		$rol1 = $_POST['buscar'];
		$rol=array("rol"=>$this->rolModel->findByRol($rol1));
		
		$response=[
			'find' => $rol1,
			'status' => 200,
			'data' => $rol
		];
		
		echo json_encode($response);
	
	}
}
