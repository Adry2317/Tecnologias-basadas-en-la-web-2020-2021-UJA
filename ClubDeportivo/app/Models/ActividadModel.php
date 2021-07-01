<?php
namespace App\Models;
use CodeIgniter\Model;
/**
	 * 
	 */
	class ActividadModel extends Model
	{
		protected $table = 'actividades';
		protected $primaryKey = 'id_actividad';
		protected $useAutoIncrement = true;
		protected $returnType = 'object';
		protected $useSoftDeletes = false;

		protected $allowedFields = ['id_actividad','Nombre','Deporte','Fecha','Hora_inicio','Hora_fin','plazas'];

		protected $useTimestamps = false;

		protected $validationRules = [];
		protected $validationMessages = [];
		protected $skipValidation = false;


		public function actualizar($id,$datos){
			$base = $this->db->table('actividades');
			$base->where('id_actividad',$id);
			$base->update($datos);
		}

		public function insertarActividad($datos){
			$base = $this->db->table('actividades');
			$base->insert($datos);
		}

		public function eliminarActividad($id){
			$base = $this->db->table('actividades');
			$base->where('id_actividad',$id);
			$base->delete();
		}

		public function consulta($id) {
			$builder = $this->db->table('actividades');
			$builder->select('*');
			$builder->where('id_actividad', $id);
			$consulta = $builder->get();
			$row = $consulta->getRowArray();

			if(isset($row)) {
				return $row;
			}

			return null;
		}

	}	




?>