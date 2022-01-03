<?php 
	class loginModel extends CI_model{
		public function __construct(){
			$this->load->database();
		}

		public function login($usuario,$contraseña){
			$this->db->where('usuario',$usuario);
			$this->db->where('contraseña',$contraseña);
			$resultado = $this->db->get('usuario');
			$error = $this->db->error();
			if($error['message']){
				throw new Exception($error['message'].' class: '.__CLASS__.' line: '.__LINE__);
			}
			if($resultado->num_rows()>0){
			return true;
			}else{
				return false;
			}
		}
	}
?>
