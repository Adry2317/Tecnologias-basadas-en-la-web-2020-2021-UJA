<?php 

namespace App\Models;
use CodeIgniter\Model;

class MaterialModel extends Model{
	protected $table = 'material';
	protected $primaryKey = 'id_material';

	protected $useAutoIncrement = true;
	
	protected $useSoftDeletes = false;
	protected $returnType = 'object';
	protected $allowedFields = ['id_material','Coste','Deporte','Hora','Cantidad', 'Fecha', 'tipo', 'Nombre'];

	protected $useTimestamps = false;
	//controlador

	
	//configuramosla reglas de los campors
	protected $validationRules = [];
	//Menasajes que mandados si alguna de las reglas de validación fallan
	protected $validationMessages = [];

	protected $skipValidation = false;



	public function getPistas() {
		$builder = $this->db->table('material');
		$builder->select('*');
		$builder->where('tipo', "pista");
		$consulta = $builder->get();
		$row = $consulta->getRowArray();

		if(isset($row)) {
			return $row;
		}

		return null;
	}
	public function consulta($id){
		$builder = $this->db->table('material');
		$builder->select('*');
		$builder->where('id_material', $id);
		$consulta = $builder->get();

		$row = $consulta->getRowArray();
		if(isset($row)) {
			return $row;
		}

		return null;
	}

	public function getUsuarios($idMatOpist){
		$builder = $this->db->table('user_material');
		$bulder->select('*');
		$builder->where('id_material', $idMatOpist);
		$consulta = $builder->get();

		$row = $consulta->getRowArray();
		if(isset($row)) {
			return $row;
		}

		return null;
	}

	public function deleteMaterial($id) {
		$builder = $this->db->table('material');
		$builder->where('id_material', $id);
		$builder->delete();
	}

	public function actualizarMaterial($id, $datos){
		$builder = $this->db->table('material');
		$builder->where('id_material', $id);
		$builder->update($datos);
	}

}


?>