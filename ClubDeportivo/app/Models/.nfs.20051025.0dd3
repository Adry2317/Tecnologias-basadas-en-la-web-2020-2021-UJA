<?php
namespace App\Models;
use CodeIgniter\Model;
/**
	 * 
	 */
	class ActividadesUsuarioModel extends Model
	{
		protected $table = 'user_actividad';
		protected $primaryKey = 'id_usuario_actividad';
		protected $useAutoIncrement = true;
		protected $returnType = 'object';
		protected $useSoftDeletes = false;

		protected $allowedFields = ['dni_usuario','id_actividad','fecha_reserva'];

		protected $useTimestamps = false;

		protected $validationRules = [];
		protected $validationMessages = [];
		protected $skipValidation = false;


		public function consulta($idAct){

			$base = $this ->db->table('user_actividad');
			$base->select('*');
			$base->where('id_actividad',$idAct);
			$consulta = $base->get();
			
			$rows = $consulta->getResult();
			

			if(isset($rows)) {
				return $rows;
			}
	
			return null;
		}

		public function datosUsuarioActividad($dni){
			$base = $this->db->table('user_actividad');
			$base->select('*');
			$base->where('dni_usuario',$dni);
			$consulta = $base->get();

			$rows = $consulta->getResult();

			return $rows;
		}


		public function borrar($id){
			$base = $this->db->table('user_actividad');
			$base->where('id_usuario_actividad',$id);
			$base->delete();
		}


	}	




?>