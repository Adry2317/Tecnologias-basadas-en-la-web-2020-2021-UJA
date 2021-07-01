<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class registroControlador extends Controller{
   

	function index($page) {
		$security = \Config\Services::security();
		
		$pages = $security->sanitizeFilename($page);
		helper(['form']);
		
		if(! is_file(APPPATH.'/Views/pages/'.$pages.'.php')){
			throw new \CodeIgniter\Exceptions\PageNotFoundException($pages);
		}                       
		$datas['title'] = ucfirst($pages);
		echo view ("Templates/estiloLogin");
		echo view ("Templates/estiloGeneral");
		echo view('Templates/header');
		echo view('pages/'.$pages);
		echo view('Templates/estiloGeneralScript');
		echo view('Templates/estiloLoginScript');
		echo view('Templates/footer');
		


	}
	
	



	function autentificaDatos(){
		
		helper(['form']);
		$data = [];

		if($this->request->getMethod() == "post") {
			$validacion = \Config\Services::validation();
			
			$rules = [
				"Email" => [
					
					"rules" => "required|valid_email|is_unique[user.Email]",
					"errors" => [
						"valid_email"=>"Debe de introducir un email válido",
						"is_unique" => "El email introducido ya se encuentra registrado"

					]
					
				],
				"DNI" =>[
					"rules" => "required|min_length[9]|max_length[9]|is_unique[user.DNI]",
					"errors" => [
				
						"is_unique" => "El DNI introducido ya se encuentra registrado"

					]
				],
				"password" => [
					"rules" => "required|min_length[8]|max_length[50]"
				],
				"confirm_password" => [
					"rules" => "required|matches[password]"
				],
				"username" => [
					"rules" =>"required|alpha_numeric|is_unique[user.Usuario]|min_length[5]|max_length[25]",
					"errors" => [
						"alpha_numeric"=>"Uso de caracteres inválidos en el campo Usuario",
						"is_unique" => "El nombre de Usuario ya se encuentra registrado"

					]
				]
			];

			//si no ocurre ningun problema de validación se procede a almacenarlo en la 
			//base de datos.
			if($this->validate($rules)) {

				$userModel = new UserModel($db);
				$request = \Config\Services::request();
				//codificamos la contraseña
				$passCifrada = md5(esc($request->getPostGet('password')));
				

				$data=array(
					'Email'=>esc($request->getPostGet('Email')),
					'Usuario'=>esc($request->getPostGet('username')),
					'DNI'=>esc($request->getPostGet('DNI')),
					'Contrasenia'=>esc($passCifrada),
					'RolUser' => 'usuario'
				);
		
				$userModel->insert($data);
				
				//inicialnos la sesion con el usuario dado
				session()->set("Usuario", $data['Usuario']);
				session()->set("Email", $data["Email"]);
				session()->set("RolUser", $data["RolUser"]);
				session()->set("logged_in", TRUE);


				//cambiar redirección a inicioLog cuando esté implementado
				return redirect()->to(site_url("pages/logPrincipal"));

			}else{
				
				$data["errors"] = $validacion->getErrors();
				echo view ("Templates/estiloLogin");
				echo view ("Templates/estiloGeneral");
				echo view('Templates/header');
				echo view('pages/registro', $data);
				echo view('Templates/estiloGeneralScript');
				echo view('Templates/estiloLoginScript');
				echo view('Templates/footer');
			}
		}
	}
		

		
	
	
		
	
}





    



?>