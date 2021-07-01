<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class usuariosAdmin extends Controller{
	
	public function logAdminUsuarios(){
		helper(["form"]);
		$data['title'] = ucfirst("Usuarios");
		$usu = new \App\Models\UserModel();
		$data['usuarios'] = $usu -> findAll();
		echo view ("Templates/estiloGeneral", $data);
		echo view ("Templates/estiloLogin", $data);
		echo view('Templates/headerLogAdmin',$data);
		echo view('pages/Usuarios',$data);
		echo view('Templates/estiloGeneralScript',$data);
		echo view('Templates/estiloLoginScript',$data);
		echo view('Templates/footer',$data);
	}

	public function eliminar(){
		helper(["form"]);
			
		if($this->request->getMethod() == "post") {
				$request = \Config\Services::request();
				$nu = esc($request->getPostGet('ElimiUsu'));
				$usu = new \App\Models\UserModel();
				$usuFind = $usu->find($nu);
				if($usuFind != null){
					$usu->eliminarUsuario($nu);
					return redirect()->to(site_url("UsuariosAdmin/logAdminUsuarios"));
				}else{
					helper(["form"]);
					$data['title'] = ucfirst("Usuarios");
					$data['error7'] = "El DNI Introducido no es válido";
					$usu = new \App\Models\UserModel();
					$data['usuarios'] = $usu -> findAll();
					echo view ("Templates/estiloGeneral", $data);
					echo view ("Templates/estiloLogin", $data);
					echo view('Templates/headerLogAdmin',$data);
					echo view('pages/Usuarios',$data);
					echo view('Templates/estiloGeneralScript',$data);
					echo view('Templates/estiloLoginScript',$data);
					echo view('Templates/footer',$data);
				}
				

		}
	}

}


?>