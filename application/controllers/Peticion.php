<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Peticion extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('personajeModel');
			$this->load->helper('form');
			
		}
		public function index(){
			$this->load->view('juego/peticion');
		}

        public function peticion(){
           /* $result="";
            $nombre = $this->input->POST('nombre');
            $array= array('poseidon','ra');
            for($i=0; $i< count($array);$i++) {           
                    if($nombre == $array[$i]){
                        $result="<p>El personaje $nombre ha sido encontrado</p>";
                    }else{
                        $result="<p>El personaje $nombre no ha sido encontrado</p>";
                    }
                    
                    echo $result;*/

                  $nombre = $_POST['nom'];
                  $apellido = $_POST['ape'];
                  $edad = $_POST['ed'];
                  
                  //echo "hola".$nombre." ".$apellido." su edad es ".$edad;
                  $response = [
                      'name' => $nombre,
                      'lastname' => $apellido,
                      'age' => $edad,
                      'status' => 200,
                      'message' => 'Se creo el usuario correctamente',
                      'data' => []
                  ];

                  echo  json_encode($response);
                    
                

        }

		
	}

?>	
