<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class ProfileController extends Controller{
	
	public function viewProfile(){
			helper(['form']);
			$data = [];

			$userModel = new UserModel($db);

			$data = $userModel->profileData(session()->Email);
			session()->set("Nombre", $data["Nombre"]);
			session()->set("Apellidos", $data["Apellidos"]);
			session()->set("Telefono", $data["Telefono"]);
			session()->set("DNI", $data["DNI"]);
			session()->set("MetodoPago", $data["MetodoPago"]);
			session()->set("avatar", $data['avatar']);

			$data['title'] = ucfirst("Profile");

			echo view ("Templates/estiloGeneral");
			if(session()->RolUser =="usuario"){
				echo view('Templates/headerLog');
			}else{
				echo view('Templates/headerLogAdmin');
			}
			


			
			echo view('pages/profile');
			
			echo view('Templates/estiloGeneralScript');
			echo view('Templates/footer');
			
       
	}

	public function viewProfileConfig(){
		helper(['form']);
		$data = [];

		$userModel = new UserModel($db);

		$data = $userModel->profileData(session()->Email);
		session()->set("Nombre", $data["Nombre"]);
		session()->set("Apellidos", $data["Apellidos"]);
		session()->set("Telefono", $data["Telefono"]);
		session()->set("DNI", $data["DNI"]);
		session()->set("MetodoPago", $data["MetodoPago"]);
		session()->set("avatar", $data["avatar"]);

		$data['title'] = ucfirst("ProfileConfig");

		echo view ("Templates/estiloGeneral");
		if(session()->RolUser =="usuario"){
			echo view('Templates/headerLog');
		}else{
			echo view('Templates/headerLogAdmin');
		}
		
		echo view('pages/profileConfig');
		
		echo view('Templates/estiloGeneralScript');
		echo view('Templates/footer');
		
   
}

	public function updateProfile() {
		helper(['form']);
		$data = [];
		if($this->request->getMethod() == "post") {
			$validacion = \Config\Services::validation();
			
			$rules = [
				"Nombre" => [
					"rules" => "required|min_length[4]|max_length[30]",
					"errors" => [
						"min_length" =>"El nombre debe de contener m??s de 4 caracteres",
						"max_length" =>"El nombre debe de contener menos de 10 caracteres ",
						"required" => "El campo nombre es requerido"
						]
				],

				"Apellidos" => [
					"rules" => "required|min_length[5]|max_length[30]",
					"errors" => [
						"min_length" =>"El apellido debe de contener m??s de 5 caracteres",
						"max_length" =>"El apellido debe de contener menos de 30 caracteres ",
						"required" => "El campo apellido es requerido"
						]
				],

				"Telefono" => [
					"rules" => "required|exact_length[9]|numeric", 
					"errors" => [
						"exact_length" =>"El tel??fono debe de tener 9 d??gitos",
						"numeric" =>"Solo se admiten car??cteres num??ricos",
						"required" => "El campo Telefono es requerido"
					]

				],

				"MetodoPago" => [
					"rules" => "required|exact_length[16]|numeric",
					"errors" => [
						"exact_length" =>"El m??todo de pago debe de tener 16 d??gitos",
						"numeric" =>"Solo se admiten car??cteres num??ricos",
						"required" => "El campo m??todo de pago es requerido"
					]
				],

				"NewPassword" => [
					"rules" => "required|min_length[8]|max_length[50]",
					"errors" => [
						"min_length" => "La contrase??a debe de tener como m??nimo 7 caracteres",
						"max_length" => "La contrase??a debe de terne como m??ximo 50 caracteres",
						"required" => "El campo nueva contrase??a es requerido"
					]
				],

				"NewPasswordConfirm" => [
					"rules" => "matches[NewPassword]|required",
					"errors" => [
						"matches"=>"Las contrase??as no coinciden",
						"required" => "El campo confirmar contrase??a es requerido"
					
					]
				]

			];
			
			if($this ->validate($rules)) {
				$userModel = new UserModel($db);
				$request = \Config\Services::request();
				
				$passCifrada = md5(esc($request->getPostGet("NewPassword")));
				//$file1 = $request->getFile('avatar');

				
				//if ($file1->isValid() && ! $file1->hasMoved())
				//{
					//$newName = $file1->getRandomName();
					
					//$file1->move('./assets/img', $newName);
					$data = array(
						"Nombre"=>esc($request->getPostGet("Nombre")),
						"Apellidos"=>esc($request->getPostGet("Apellidos")),
						"Telefono"=>esc($request->getPostGet("Telefono")),
						"MetodoPago"=>esc($request->getPostGet("MetodoPago")),
						"Contrasenia"=>esc($passCifrada)
						//"avatar" => esc($newName)
					);
				//}
					
					
				

				
				
				
				

				$userModel->update(session()->DNI,$data);
				
					return redirect()->to(site_url("ProfileController/viewProfile"));
				
				
			}else{
				$data["errors"] = $validacion->getErrors();
				echo view ("Templates/estiloGeneral");
				echo view('Templates/headerLog');		
				echo view('pages/profileConfig', $data);		
				echo view('Templates/estiloGeneralScript');
				echo view('Templates/footer');

			}
		}
	}

	
}

?>