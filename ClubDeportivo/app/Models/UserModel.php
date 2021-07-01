<?php 

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model{
	protected $table = 'user';
	protected $primaryKey = 'DNI';

	
	
	protected $useSoftDeletes = false;
	protected $returnType = 'object';
	protected $allowedFields = ['Usuario','DNI','Contrasenia','Email','RolUser', 'Telefono', 'MetodoPago', 'Nombre', 'Apellidos','avatar'];

	protected $useTimestamps = false;
	//controlador

	
	//configuramosla reglas de los campors
	protected $validationRules = [];
	//Menasajes que mandados si alguna de las reglas de validación fallan
	protected $validationMessages = [];

	protected $skipValidation = false;



	public function authenticate($email){

		$builder = $this->db->table('user');
		
		$builder->select('*');

		$builder->where('Email', $email);

		$consulta = $builder->get();

		$row = $consulta->getRowArray();

		if( isset($row)) {
			return $row;
		}

		return null;
	}


	public function profileData($email) {
		$builder = $this->db->table('user');

		$builder->select('*');
		$builder->where('Email', $email);
		$consulta = $builder->get();
		$row = $consulta->getRowArray();

		if(isset($row)) {
			return $row;
		}

		return null;

	}


	public function usuariosPorDNi($dnis){
		$base = $this->db->table('user');
		$base->select('*');
		$base->where("DNI",$dnis);

		$respuesta = $base->get();
		$ret = $respuesta->getRowArray();


		return $ret;
	}


	public function eliminarUsuario($dni){
		$base = $this->db->table('user');
		$base->where("DNI", $dni);
		$base->delete();
	}


	public function dniPorEmail($email){
		$base = $this->db->table('user');
		$base->select('DNI');
		$base->where("email", $email);
		$respuesta = $base->get();
		$row = $respuesta->getRowArray();

		return $row;
	}
}

?>