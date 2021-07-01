<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Actividades extends Controller{

	public function logAdminActividades(){
		helper(["form"]);
		$data['title'] = ucfirst("ActividadesAdmin");
		$actModel = new \App\Models\ActividadModel();
		$busqueda = new \App\Models\ActividadesUsuarioModel();
		$usu = new \App\Models\UserModel();
		$data['actividades'] = $actModel->findAll();
		$data['actividadUsuario'] = $busqueda->findAll();
		$data['usuarios'] = $usu->findAll();
		echo view ("Templates/estiloGeneral", $data);
		echo view ("Templates/estiloLogin", $data);
		echo view('Templates/headerLogAdmin',$data);
		echo view('pages/ActividadesAdmin',$data);
		echo view('Templates/estiloGeneralScript',$data);
		echo view('Templates/estiloLoginScript',$data);
		echo view('Templates/footer',$data);
	}


	public function datos(){
		helper(["form"]);
			

			if($this->request->getMethod() == "post") {

				$request = \Config\Services::request();

				$id = $request->getPostGet('ident');
				print_r($id);
				$deportes;

				if($request->getPostGet('gridRadios') == "option1"){
					$deportes = "Tenis";
				}else if($request->getPostGet('gridRadios') == "option2"){
					$deportes = "Baloncesto";
				}else{
					$deportes = "Golf";
				}
				$datosAdmin=array(
						
						'Nombre'=>esc($request->getPostGet('imputNombre')),
						'Deporte'=>esc($deportes),
						'Fecha'=>esc($request->getPostGet('start')),
						'Hora_inicio'=>esc($request->getPostGet('horaini')),
						'Hora_fin' => esc($request->getPostGet('horafin')),
						'plazas' => esc($request->getPostGet('plazas'))
				);
				print_r($datosAdmin);

				$nuevo = new \App\Models\ActividadModel();
				$nuevo->actualizar($id,$datosAdmin);
				

				return redirect()->to(site_url("Actividades/logAdminActividades"));

			}
	}

	public function insertar(){
		helper(["form"]);
			

			if($this->request->getMethod() == "post") {

				$request = \Config\Services::request();

				$id = $request->getPostGet('identInsert');
				
				$deportes;

				if($request->getPostGet('gridRadiosInsert') == "option1"){
					$deportes = "Tenis";
				}else if($request->getPostGet('gridRadiosInsert') == "option2"){
					$deportes = "Baloncesto";
				}else{
					$deportes = "Golf";
				}
				$datosAdmin=array(
						'id_actividad'=>esc($id),
						'Nombre'=>esc($request->getPostGet('imputNombreInsert')),
						'Deporte'=>esc($deportes),
						'Fecha'=>esc($request->getPostGet('startInsert')),
						'Hora_inicio'=>esc($request->getPostGet('horainiInsert')),
						'Hora_fin' => esc($request->getPostGet('horafinInsert')),
						'plazas' => esc($request->getPostGet('plazasInsert'))
				);
				
				
				$nuevo = new \App\Models\ActividadModel();
				$nuevo->insertarActividad($datosAdmin);
				

				return redirect()->to(site_url("Actividades/logAdminActividades"));

			}
	}


	public function borrar(){
		helper(["form"]);
			

		if($this->request->getMethod() == "post") {
				$request = \Config\Services::request();
				$nu = esc($request->getPostGet('Elimi'));
				
				$nuevo = new \App\Models\ActividadModel();
				$con = $nuevo -> find($nu);

				if($con != null){
					$nuevo->eliminarActividad($nu);
					return redirect()->to(site_url("Actividades/logAdminActividades"));
				}else{
					helper(["form"]);
					$data['title'] = ucfirst("ActividadesAdmin");
					$actModel = new \App\Models\ActividadModel();
					$busqueda = new \App\Models\ActividadesUsuarioModel();
					$usu = new \App\Models\UserModel();
					$data['actividades'] = $actModel->findAll();
					$data['actividadUsuario'] = $busqueda->findAll();
					$data['error10'] = "No existe esa id";
					$data['usuarios'] = $usu->findAll();
					echo view ("Templates/estiloGeneral", $data);
					echo view ("Templates/estiloLogin", $data);
					echo view('Templates/headerLogAdmin',$data);
					echo view('pages/ActividadesAdmin',$data);
					echo view('Templates/estiloGeneralScript',$data);
					echo view('Templates/estiloLoginScript',$data);
					echo view('Templates/footer',$data);
				}

		}

	}


	public function modificar(){
		helper(["form"]);
		if($this->request->getMethod() == "post") {
			$request = \Config\Services::request();
			$nu = esc($request->getPostGet('actualAct'));
			
			$data['title'] = ucfirst("Modificar");
			$actModel = new \App\Models\ActividadModel();
			$data['actividad'] = $actModel->find($nu);

			if($data['actividad'] != null){
				echo view ("Templates/estiloGeneral", $data);
				echo view('Templates/headerLogAdmin',$data);
				echo view('pages/modificar.php',$data);
				echo view('Templates/estiloGeneralScript',$data);
				echo view('Templates/footer',$data);
			}else{
				helper(["form"]);
					$data['title'] = ucfirst("ActividadesAdmin");
					$actModel = new \App\Models\ActividadModel();
					$busqueda = new \App\Models\ActividadesUsuarioModel();
					$usu = new \App\Models\UserModel();
					$data['actividades'] = $actModel->findAll();
					$data['actividadUsuario'] = $busqueda->findAll();
					$data['error11'] = "No existe esa id";
					$data['usuarios'] = $usu->findAll();
					echo view ("Templates/estiloGeneral", $data);
					echo view ("Templates/estiloLogin", $data);
					echo view('Templates/headerLogAdmin',$data);
					echo view('pages/ActividadesAdmin',$data);
					echo view('Templates/estiloGeneralScript',$data);
					echo view('Templates/estiloLoginScript',$data);
					echo view('Templates/footer',$data);
			}
		}
	}

}


?>