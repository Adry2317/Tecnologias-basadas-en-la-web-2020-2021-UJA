<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class loginController extends Controller{
    public function view($page){
		$security = \Config\Services::security();
		
		$pages = $security->sanitizeFilename($page);
		if(! is_file(APPPATH.'/Views/pages/'.$pages.'.php')){
			throw new \CodeIgniter\Exceptions\PageNotFoundException($pages);
		}
			helper(["form"]);
		
			$data['title'] = ucfirst($pages);
			echo view ("Templates/estiloLogin", $data);
			echo view ("Templates/estiloGeneral", $data);
			echo view('Templates/header',$data);
			echo view('pages/'.$pages,$data);
			echo view('Templates/estiloGeneralScript',$data);
			echo view('Templates/estiloLoginScript',$data);
			echo view('Templates/footer',$data);
		
	}


	//Nos lleva al registro
	public function irRegistro(){
		return redirect()->to(site_url("RegistroControlador/index/registro"));
	}


	//muestra el error 403 de acceso prohibido.
	public function error403($page){
		$security = \Config\Services::security();
		
		$pages = $security->sanitizeFilename($page);
		$data['title'] = ucfirst($pages);
		echo view ("Templates/estiloGeneral", $data);
		echo view('Templates/header',$data);
		echo view('pages/'.$pages,$data);
		echo view('Templates/estiloGeneralScript',$data);
	}

	public function authLogin () {
		helper(["form"]);
		$data = [];

		if($this->request->getMethod() == "post") {
			$validacion = \Config\Services::validation();

			$rules = [
				"Email" => [
					
					"rules" => "required|valid_email",
					"errors" => [
						"valid_email"=>"Debe de introducir un email válido",
						

					]
					
				],
				"password" => [
					"rules" => "required|min_length[8]|max_length[50]"
				]
			];

			if($this->validate($rules)) {
				//vamos a autentificar en la base de datos
				
				$session = session();
				$userModel = new UserModel($db);
				$request = \Config\Services::request();

				$email = $request->getPostGet('Email');
				$pass = $request->getPostGet('password');

				//comprobamos que el email se encuentre en la base de datos.
				$data = $userModel->authenticate(esc($email));

				//si el email existe, comprobamos que la contraseña sea la misma 
				if($data){
					$passServidor = $data['Contrasenia'];

					//comprueba si la contraseña del servidor y la dada en el campo sean la misma.
					$verify_pass = $passServidor === md5(esc($pass));

					if($verify_pass) {
						session()->set("Usuario", $data["Usuario"]);
						session()->set("Email", $data["Email"]);
						session()->set("RolUser", $data["RolUser"]);
						session()->set('avatar',$data["avatar"]);
						session()->set('DNI', $data['DNI']);
						session()->set("logged_in", TRUE);

						if(session()->RolUser == "admin"){
							return redirect()->to(site_url("pages/logAdminPrincipal"));
						}else{
							return redirect()->to(site_url("pages/logPrincipal"));
						}

					}else{
						//si cla contraseña no es correcta, mostramos errores y volvemos a la página de inicio.
						$session->setFlashdata('msg', 'Contraseña Incorrecta');
						return redirect()->to(site_url('LoginController/authLogin'));
					}
				}else {
					//si el email introducido es incorrecto mostramos un mensaje.
					$session->setFlashdata('msg', 'Email no encontrado');
					return redirect()->to(site_url('LoginController/authLogin'));
				}


				
			} else {
				$dataError["errors"] = $validacion->getErrors();
				echo view ("Templates/estiloLogin");
				echo view ("Templates/estiloGeneral");
				echo view('Templates/header');
				echo view('pages/login', $dataError);
				echo view('Templates/estiloGeneralScript');
				echo view('Templates/estiloLoginScript');
				echo view('Templates/footer');
			}
		}else{
				
				echo view ("Templates/estiloLogin");
				echo view ("Templates/estiloGeneral");
				echo view('Templates/header');
				echo view('pages/login', $data);
				echo view('Templates/estiloGeneralScript');
				echo view('Templates/estiloLoginScript');
				echo view('Templates/footer');
		}
	}

	
}


    



?>