<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller{

	public function view($page){
		$security = \Config\Services::security();
		
		$pages = $security->sanitizeFilename($page);

		if(! is_file(APPPATH.'/Views/pages/'.$pages.'.php')){
			throw new \CodeIgniter\Exceptions\PageNotFoundException($pages);
		}

		if($pages == 'principal'){
			$data['title'] = ucfirst($pages);
			echo view ("Templates/estiloGeneral", $data);
			echo view('Templates/header',$data);
			echo view('pages/'.$pages,$data);
			echo view('Templates/estiloGeneralScript',$data);
			echo view('Templates/footer',$data);
		}else if($pages == 'contacto'){
			
			$data['title'] = ucfirst($pages);
			echo view ("Templates/estiloGeneral", $data);
			echo view('Templates/header',$data);
			echo view('pages/'.$pages,$data);
			echo view('Templates/estiloGeneralScript',$data);
			echo view('Templates/footer',$data);

		}else if($pages == 'Actividades'){
			
			$data['title'] = ucfirst($pages);
			$actModel = new \App\Models\ActividadModel();
			$data['actividades'] = $actModel->findAll();
			echo view ("Templates/estiloGeneral", $data);
			echo view('Templates/header',$data);
			echo view('pages/'.$pages,$data);
			echo view('Templates/estiloGeneralScript',$data);
			echo view('Templates/footer',$data);
		}

		else if($pages == 'instalaciones'){
			
			$data['title'] = ucfirst($pages);
			$actModel = new \App\Models\ActividadModel();
			$data['actividades'] = $actModel->findAll();
			echo view ("Templates/estiloGeneral", $data);
			echo view('Templates/header',$data);
			echo view('pages/'.$pages,$data);
			echo view('Templates/estiloGeneralScript',$data);
			echo view('Templates/footer',$data);
		}
	}

	public function logPrincipal(){
			$data['title'] = ucfirst("principal");
			echo view ("Templates/estiloGeneral", $data);
			echo view('Templates/headerLog',$data);
			echo view('pages/principal',$data);
			echo view('Templates/estiloGeneralScript',$data);
			echo view('Templates/footer',$data);

	}

	public function logContacto(){
		$data['title'] = ucfirst("Contacto");
		echo view ("Templates/estiloGeneral", $data);
		echo view('Templates/headerLog',$data);
		echo view('pages/contacto',$data);
		echo view('Templates/estiloGeneralScript',$data);
		echo view('Templates/footer',$data);

	}


	public function logAdminPrincipal(){
		$data['title'] = ucfirst("principal");
		echo view ("Templates/estiloGeneral", $data);
		echo view('Templates/headerLogAdmin',$data);
		echo view('pages/principal',$data);
		echo view('Templates/estiloGeneralScript',$data);
		echo view('Templates/footer',$data);
	}


	public function logAdminContacto(){
		$data['title'] = ucfirst("Contacto");
		echo view ("Templates/estiloGeneral", $data);
		echo view('Templates/headerLogAdmin',$data);
		echo view('pages/contacto',$data);
		echo view('Templates/estiloGeneralScript',$data);
		echo view('Templates/footer',$data);
	}
	public function logInstalaciones(){
		$data['title'] = ucfirst("Instalaciones");
		echo view ("Templates/estiloGeneral", $data);
		echo view ("Templates/estiloLogin", $data);
		if(session()->RolUser =="usuario"){
			echo view('Templates/headerLog');
		}else{
			echo view('Templates/headerLogAdmin');
		}
		echo view('pages/instalaciones',$data);
		echo view('Templates/estiloGeneralScript',$data);
		echo view('Templates/estiloLoginScript',$data);
		echo view('Templates/footer',$data);
	}

	

	



}

?>