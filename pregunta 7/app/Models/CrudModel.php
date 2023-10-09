<?php namespace App\Models;
	
	use CodeIgniter\Model;

	class CrudModel extends Model {
		public function listarNombres() {
			$Nombres = $this->db->query("SELECT * FROM usuario u JOIN alumno a ON u.ci = a.ci_alumno");
			return $Nombres->getResult();
		}
		public function insertar($datos,$datos2) {
			$Nombres = $this->db->table('usuario');
			$Nombres->insert($datos);
			$Nombres2 = $this->db->table('alumno');
			$Nombres2->insert($datos2);

			return $this->db->insertID(); 
		}

		public function obtenerNombre($data) {
			$Nombres =  $this->db->table('usuario');
			$Nombres->where($data);
			return $Nombres->get()->getResultArray();
		}

		public function actualizar($data, $ci) {
			$Nombres = $this->db->table('usuario');
			$Nombres->set($data);
			$Nombres->where('ci', $ci);
			return $Nombres->update();
		}

		public function eliminar($data,$data2) {
			$Nombres = $this->db->table('usuario');
			$Nombres->where($data);
			$Nombres2 = $this->db->table('alumno');
			$Nombres2->where($data2);
			$Nombres2->delete();
			return $Nombres->delete();
		}
	}