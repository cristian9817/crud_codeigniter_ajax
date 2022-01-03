<?php 
	class personajeModel extends CI_model{
		public function __construct(){
			$this->load->database();
		}

		public function getAll(){
			$this->db->select('personajes.id,personajes.dios,personajes.maestria,personajes.panteon,rol.rol ');
			$this->db->from('personajes');
			$this->db->join('rol','personajes.rolidfk = rol.id');
			$consulta = $this->db->get();
			$respuesta = $consulta->result();
			$error = $this->db->error();
			if($error['message']){
				throw new Exception($error['message'].' class: '.__CLASS__.' line: '.__LINE__);
			}
			return $respuesta;
		}
		public function delete($id){
			$this->db->where('id',$id);
			$this->db->delete('personajes');
			$error = $this->db->error();
			if($error['message']){
				throw new Exception($error['message'].' class: '.__CLASS__.' line: '.__LINE__);
			}
		}
		public function insert($dios,$maestria,$panteon,$rolidfk){
			$agregar= $this->db->insert('personajes',["dios"=>$dios, "maestria"=>$maestria, "panteon"=>$panteon, "rolidfk"=>$rolidfk]);
			$error = $this->db->error();
			if($error['message']){
				throw new Exception($error['message'].' class: '.__CLASS__.' line: '.__LINE__);
			}
			return $agregar;
		}
		public function getById($id){
			$this->db->select('personajes.id,personajes.dios,personajes.maestria,personajes.panteon,rol.rol');
			$this->db->from('personajes');
			$this->db->join('rol','personajes.rolidfk = rol.id');
			$this->db->where('personajes.id',$id);
			$consulta = $this->db->get();
			$resultado = $consulta->result_array();
			$error = $this->db->error();
			if($error['message']){
				throw new Exception($error['message'].' class: '.__CLASS__.' line: '.__LINE__);
			}
			return $resultado;
		}
		public function edit($personajes,$id){
			$this->db->where('id',$id);
			$this->db->update('personajes',$personajes);
			$error = $this->db->error();
			if($error['message']){
				throw new Exception($error['message'].' class: '.__CLASS__.' line: '.__LINE__);
			}
		}
		public function getRoles(){
			$this->db->select('*');
			$this->db->from('rol');
			$consulta = $this->db->get();
			$resultado = $consulta->result();
			$error = $this->db->error();
			if($error['message']){
				throw new Exception($error['message'].' class: '.__CLASS__.' line: '.__LINE__);
			}
			return $resultado;
		}
		public function findByPer($dato){
			$this->db->select('personajes.id,personajes.dios,personajes.maestria,personajes.panteon,rol.rol');
			$this->db->from('personajes');
			$this->db->join('rol','personajes.rolidfk = rol.id');
			$this->db->like('dios',$dato,'both');
			$this->db->or_like('maestria',$dato,'both');
			$this->db->or_like('panteon',$dato,'both');
			$this->db->or_like('rol',$dato,'both');
			$consulta = $this->db->get();
			$resultado = $consulta->result();
			$error = $this->db->error();
			if($error['message']){
				throw new Exception($error['message'].' class: '.__CLASS__.' line: '.__LINE__);
			}
			return $resultado;
		}
	}
?>
