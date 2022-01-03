<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Personaje extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('personajeModel');
			$this->load->helper(['form', 'url']);
		}

		public function index(){
			//$rol = array("roles"=>$this->personajeModel->getRoles());
			$per= array("per"=>$this->personajeModel->getAll());
			
			//print_r($per);
			$this->load->view('juego/listarpersonaje',$per);
				/*'rol'=>getRoles(),
				'per'
			]);*/
			echo json_encode($per);
			
		}

		public function delete($id){
			
			$this->personajeModel->delete($id);
			//$this->index();
		}
		public function get($id){
		
			$response["roles"] =$this->personajeModel->getRoles();
			$response['datos']= $this->personajeModel->getById($id);
			//print_r($info);
			//var_dump($info);
			//$this->load->view('juego/editpersonaje');

			echo json_encode($response);
			
		}
		public function formAdd(){
			$roles = array("roles"=>$this->personajeModel->getRoles());
			$this->load->view('juego/addpersonaje',$roles);
		}
		public function insert(){
			/*$dios = $this->input->POST('dios');
			$maestria = $this->input->POST('maestria');
			$panteon = $this->input->POST('panteon');
			$rolidfk = $this->input->POST('rolidfk');

			$respuesta = $this->personajeModel->insert($dios,$maestria,$panteon,$rolidfk);
			
				if($respuesta){
					$this->index();
				}else{
					$this->formAdd();
				}*/
				$dios = $_POST['dios'];
				$maestria = $_POST['maestria'];
				$panteon = $_POST['panteon'];
				$rolidfk = $_POST['rolidfk'];

				$this->personajeModel->insert($dios,$maestria,$panteon,$rolidfk);
				exit();
			}
			public function update(){
				/*$dios = $this->input->POST('dios');
				$maestria = $this->input->POST('maestria');
				$panteon = $this->input->POST('panteon');
				$rolidfk = $this->input->POST('rolidfk');

				$personajes = array(
					"dios" => $dios,
					"maestria" => $maestria,
					"panteon" => $panteon,
					"rolidfk" => $rolidfk
				);*/
				$id = $_POST['id'];
				$dios = $_POST['dios'];
				$maestria = $_POST['maestria'];
				$panteon = $_POST['panteon'];
				$rolidfk = $_POST['rolidfk'];

				$personajes = array(
					'id'=>$id,
					"dios" => $dios,
					"maestria" => $maestria,
					"panteon" => $panteon,
					"rolidfk" => $rolidfk
				);
				
				$this->personajeModel->edit($personajes,$id);
				//$this->index();
			}
			public function findPer(){
				//$dato = $this->input->POST('buscarper');
				$character = $_POST['character'];
				$per=array("per"=>$this->personajeModel->findByPer($character));

				$response = [
					'character' => $character,
					'status' => 200,
					'datos' => $per
				];
				echo json_encode($response);
				//$this->load->view('juego/listarpersonaje',$per);
			}
		}
?>
