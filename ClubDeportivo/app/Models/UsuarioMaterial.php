<?php
namespace App\Models;
use CodeIgniter\Model;


    class UsuarioMaterial extends Model {
        protected $table = 'user_material';
		protected $primaryKey = 'id_usuario_material';
		protected $useAutoIncrement = true;
		protected $returnType = 'object';
		protected $useSoftDeletes = false;

		protected $allowedFields = ['id_usuario_material','dni_user', 'id_material', 'coste', 'cantidad', 'fecha_reserva'];

		protected $useTimestamps = false;

		protected $validationRules = [];
		protected $validationMessages = [];
		protected $skipValidation = false;

        public function consulta($idMat) {
            $builder = $this->db->table('user_material');
            $builder->select('*');
            $builder->where('id_material', $idMat);
            $consulta = $builder->get();

            $row = $consulta->getResult();

            if(isset($row)) {
				return $row;
			}
	
			return null;
        }

        public function datosMaterialUsuario($dni){
        	$builder = $this->db->table('user_material');
            $builder->select('*');
            $builder->where('dni_user', $dni);
            $consulta = $builder->get();

            $row = $consulta->getResult();

            return $row;
        }


        public function borrar($id){
            $builder = $this->db->table('user_material');
            $builder->where('id_usuario_material', $id);
            $builder->delete();
        }

        
    }