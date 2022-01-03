<?php 
	class rolModel extends CI_model{
				
		public function __construct(){
			$this->load->database();
		}

		public function getAll(){
			$this->db->select('*');
			$this->db->from('rol');
			$consulta=$this->db->get();
			$resultado = $consulta->result();
			$error=$this->db->error();
			if($error['message']){
				throw new Exception($error['message'].' class:'.__CLASS__.' line: '.__LINE__);
			}
			return $resultado;
		}

		public function insert($rol){
			$agregar=$this->db->insert('rol',["rol"=>$rol]);
			$error=$this->db->error();
			if($error['message']){
				throw new Exception($error['message'].' clas: '.__CLASS__.' line: '.__LINE__);
			}
			return $agregar;
		}

		public function delete($id){
			$this->db->where('id',$id);
			$this->db->delete('rol');
			$error=$this->db->error();
			if($error['message']){
				throw new Exception($error['message'].' class: '.__CLASS__.' line: '.__LINE__);
			}
		}
		public function getById($id){
			$this->db->select('*');
			$this->db->from('rol');
			$this->db->where('id',$id);
			$consulta = $this->db->get();
			$resultado = $consulta->row();
			$error=$this->db->error();
			if($error['message']){
				throw new Exception($error['message'].' class: '.__CLASS__. ' line: '.__LINE__);
			}
			return $resultado;
		}
		public function update($rol1,$id){
			$this->db->where('id',$id);
			$this->db->update('rol',$rol1);
			$error=$this->db->error();
			if($error['message']){
				throw new Exception($error['message'].' class: '.__CLASS__.' line: '.__LINE__);
			}
		}
		public function findByRol($rol){
			$this->db->select('*');
			$this->db->from('rol');
			$this->db->like('rol',$rol,'both');
			$consulta = $this->db->get();
			$resultado = $consulta->result();
			$error=$this->db->error();
			if($error['message']){
				throw new Exception($error['message'].' class '.__CLASS__. ' line: '.__LINE__);
			}
			return $resultado;
		}
	}
?>
