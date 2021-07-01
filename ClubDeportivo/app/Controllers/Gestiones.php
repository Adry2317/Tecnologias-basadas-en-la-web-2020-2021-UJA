<?php
namespace App\Controllers;

use CodeIgniter\Controller;


class Gestiones extends Controller{
	public function vista(){
		helper(["form"]);
		
		$MatModel = new \App\Models\MaterialModel();
		$data['pista'] = $MatModel->where("tipo","pista")->findAll();
		$data['material'] = $MatModel->where("tipo","material")->findAll();
		
		$MatModelUser = new \App\Models\UsuarioMaterial();
		$data['UsuariosMateriales'] = $MatModelUser->findAll();

		$userModel = new \App\Models\UserModel($db);
		$data['usuario'] = $userModel->findAll();
		
		//$data['res'] =  $actModel->getUsuarios()
		$data['title'] = ucfirst("Gestiones");
		echo view ("Templates/estiloLogin", $data);
		echo view ("Templates/estiloGeneral", $data);
		echo view('Templates/headerLogAdmin',$data);
		echo view('pages/gestionesAdmin',$data);
		echo view('Templates/estiloGeneralScript',$data);
		echo view('Templates/estiloLoginScript',$data);
		echo view('Templates/footer',$data);
	}


	public function insertarMaterial(){
		helper(["form"]);
		if($this->request->getMethod() == "post") {
			$request = \Config\Services::request();
			$id = $request->getPostGet('identInsert');

			if($request->getPostGet('gridRadiosInsert') == "option1"){
				$deportes = "Tenis";
			}else if($request->getPostGet('gridRadiosInsert') == "option2"){
				$deportes = "Baloncesto";
			}else{
				$deportes = "Golf";
			}
			$datosMaterial =array(
				'Nombre' =>esc($request->getPostGet('imputNombreInsert')),
				'Deporte' =>esc($deportes),
				'Fecha' =>esc($request->getPostGet('startInsert')),
				'Cantidad' =>esc($request->getPostGet('Cantidad')),
				'tipo' => 'material',
				'Coste' => esc($request->getPostGet('precio'))
				
			);
			$materialModel = new \App\Models\MaterialModel();
			$materialModel->insert($datosMaterial);
			return redirect()->to(site_url("Gestiones/vista"));
		}
	}

	public function borrarMaterial() {
		helper(["form"]);
		if($this->request->getMethod() == "post") {
			$request = \Config\Services::request();
			$nu = esc($request->getPostGet('Elimi'));
			$materialModel = new \App\Models\MaterialModel();
			$findMat = $materialModel->find($nu);
			if($findMat!=null){
				$materialModel->deleteMaterial(esc($nu));
				return redirect()->to(site_url("Gestiones/vista"));
			}else{
				helper(["form"]);
		
				$MatModel = new \App\Models\MaterialModel();
				$data['pista'] = $MatModel->where("tipo","pista")->findAll();
				$data['material'] = $MatModel->where("tipo","material")->findAll();
				
				$MatModelUser = new \App\Models\UsuarioMaterial();
				$data['UsuariosMateriales'] = $MatModelUser->findAll();

				$userModel = new \App\Models\UserModel($db);
				$data['usuario'] = $userModel->findAll();
				
				//$data['res'] =  $actModel->getUsuarios()
				$data['error8'] = "El id de la material a borrar no existe.";
				echo view ("Templates/estiloLogin", $data);
				echo view ("Templates/estiloGeneral", $data);
				echo view('Templates/headerLogAdmin',$data);
				echo view('pages/gestionesAdmin',$data);
				echo view('Templates/estiloGeneralScript',$data);
				echo view('Templates/estiloLoginScript',$data);
				echo view('Templates/footer',$data);
			}
			

		}
	}

	public function borrarPista() {
		helper(["form"]);
		if($this->request->getMethod() == "post") {
			$request = \Config\Services::request();
			$nu = esc($request->getPostGet('Elimi2'));
			
			$materialModel = new \App\Models\MaterialModel();
			$findPis = $materialModel->find($nu);
			if($findPis!=null){
				$materialModel->deleteMaterial(esc($nu));
				return redirect()->to(site_url("Gestiones/vista"));
			}else{
				helper(["form"]);
		
				$MatModel = new \App\Models\MaterialModel();
				$data['pista'] = $MatModel->where("tipo","pista")->findAll();
				$data['material'] = $MatModel->where("tipo","material")->findAll();
				
				$MatModelUser = new \App\Models\UsuarioMaterial();
				$data['UsuariosMateriales'] = $MatModelUser->findAll();

				$userModel = new \App\Models\UserModel($db);
				$data['usuario'] = $userModel->findAll();
				
				//$data['res'] =  $actModel->getUsuarios()
				$data['error9'] = "El id de la Pista a borrar no existe.";
				echo view ("Templates/estiloLogin", $data);
				echo view ("Templates/estiloGeneral", $data);
				echo view('Templates/headerLogAdmin',$data);
				echo view('pages/gestionesAdmin',$data);
				echo view('Templates/estiloGeneralScript',$data);
				echo view('Templates/estiloLoginScript',$data);
				echo view('Templates/footer',$data);
			}
			

		}
	}

	public function modificarMaterial(){
		helper(["form"]);
		if($this->request->getMethod() == "post") {
			$request = \Config\Services::request();
			$nu = $request->getPostGet('actual');
			$materialModel = new \App\Models\MaterialModel();
			$data['material'] = $materialModel->find(esc($nu));

			if($data['material'] != null){
				echo view ("Templates/estiloGeneral", $data);
				echo view('Templates/headerLogAdmin',$data);
				echo view('pages/modificarMaterial.php',$data);
				echo view('Templates/estiloGeneralScript',$data);
				echo view('Templates/footer',$data);
			}else{
				helper(["form"]);
		
				$MatModel = new \App\Models\MaterialModel();
				$data['pista'] = $MatModel->where("tipo","pista")->findAll();
				$data['material'] = $MatModel->where("tipo","material")->findAll();
				
				$MatModelUser = new \App\Models\UsuarioMaterial();
				$data['UsuariosMateriales'] = $MatModelUser->findAll();

				$userModel = new \App\Models\UserModel($db);
				$data['usuario'] = $userModel->findAll();
				
				//$data['res'] =  $actModel->getUsuarios()
				$data['error10'] = "El id del Material a modificar no existe.";
				echo view ("Templates/estiloLogin", $data);
				echo view ("Templates/estiloGeneral", $data);
				echo view('Templates/headerLogAdmin',$data);
				echo view('pages/gestionesAdmin',$data);
				echo view('Templates/estiloGeneralScript',$data);
				echo view('Templates/estiloLoginScript',$data);
				echo view('Templates/footer',$data);
			}

		}
	}

	public function modificarPista(){
		helper(["form"]);
		if($this->request->getMethod() == "post") {
			$request = \Config\Services::request();
			$nu = $request->getPostGet('actual2');
			$materialModel = new \App\Models\MaterialModel();
			$data['material'] = $materialModel->find($nu);

			if($data['material'] != null){
				echo view ("Templates/estiloGeneral", $data);
				echo view('Templates/headerLogAdmin',$data);
				echo view('pages/modificarMaterial.php',$data);
				echo view('Templates/estiloGeneralScript',$data);
				echo view('Templates/footer',$data);
			}else{
				helper(["form"]);
		
				$MatModel = new \App\Models\MaterialModel();
				$data['pista'] = $MatModel->where("tipo","pista")->findAll();
				$data['material'] = $MatModel->where("tipo","material")->findAll();
				
				$MatModelUser = new \App\Models\UsuarioMaterial();
				$data['UsuariosMateriales'] = $MatModelUser->findAll();

				$userModel = new \App\Models\UserModel($db);
				$data['usuario'] = $userModel->findAll();
				
				//$data['res'] =  $actModel->getUsuarios()
				$data['error11'] = "El id de la Pista a modificar no existe.";
				echo view ("Templates/estiloLogin", $data);
				echo view ("Templates/estiloGeneral", $data);
				echo view('Templates/headerLogAdmin',$data);
				echo view('pages/gestionesAdmin',$data);
				echo view('Templates/estiloGeneralScript',$data);
				echo view('Templates/estiloLoginScript',$data);
				echo view('Templates/footer',$data);
			}

		}
	}

	//modificar actividad
	public function modificar() {
		helper(["form"]);
		if($this->request->getMethod() == "post") {
			$request = \Config\Services::request();
			$id = $request->getPostGet('ident');
		}
		if($request->getPostGet('gridRadios') == "option1"){
			$deportes = "Tenis";
		}else if($request->getPostGet('gridRadios') == "option2"){
			$deportes = "Baloncesto";
		}else{
			$deportes = "Golf";
		}
		$data=array(
			'Nombre'=>esc($request->getPostGet('imputNombre')),
			'Deporte'=>esc($deportes),
			'Fecha'=>esc($request->getPostGet('start')),
			'Cantidad'=>esc($request->getPostGet('cantidad')),
			'Coste'=>esc($request->getPostGet('coste')),
		);

		$materialModel = new \App\Models\MaterialModel();
		$materialModel->actualizarMaterial(esc($id), $data);
		return redirect()->to(site_url("Gestiones/vista"));
	}


	public function insertarPista(){
		helper(["form"]);
		if($this->request->getMethod() == "post") {
			$request = \Config\Services::request();
			$id = $request->getPostGet('identInsert');

			if($request->getPostGet('gridRadiosInsert2') == "option1"){
				$deportes = "Tenis";
			}else if($request->getPostGet('gridRadiosInsert2') == "option2"){
				$deportes = "Baloncesto";
			}else{
				$deportes = "Golf";
			}
			$datosMaterial =array(
				'Nombre' =>esc($request->getPostGet('imputNombreInsert2')),
				'Deporte' =>esc($deportes),
				'Fecha' =>esc($request->getPostGet('startInsert2')),
				'Cantidad' =>esc($request->getPostGet('Cantidad2')),
				'tipo' => 'pista',
				'Coste' => esc($request->getPostGet('precio2'))
				
			);
			$materialModel = new \App\Models\MaterialModel();
			$materialModel->insert($datosMaterial);
			return redirect()->to(site_url("Gestiones/vista"));
		}
	}


	public function vistaGestionUsuarios(){
	    helper(["form"]);
	    
	    $model = new \App\Models\UserModel();
	    $actModel = new \App\Models\UsuarioMaterial();
	    $actModel2 = new \App\Models\ActividadesUsuarioModel();
	    $actModel3 = new \App\Models\ActividadModel();
	    $actModel4 = new \App\Models\MaterialModel();
	    $email = session()->Email;
	    $row = $model->dniPorEmail($email);
	    $data['actividades'] = $actModel3 -> findAll();
	    $data['materiales'] = $actModel4 -> findAll();
	    $data['usermateriales'] = $actModel->datosMaterialUsuario($row['DNI']);
	    $data['useract'] = $actModel2 -> datosUsuarioActividad($row['DNI']);
	    

	    $data['title'] = ucfirst("Mis Gestiones");
	    echo view ("Templates/estiloLogin", $data);
	    echo view ("Templates/estiloGeneral", $data);
	    echo view('Templates/headerLog',$data);
	    echo view('pages/gestionesUsuario',$data);
	    echo view('Templates/estiloGeneralScript',$data);
	    echo view('Templates/estiloLoginScript',$data);
	    echo view('Templates/footer',$data);
	}

	public function eliminarActReservada(){
		helper(["form"]);
		//Ir a actividades usuario, eliminar fila, ir actividades aumentar plazas
		$actModel2 = new \App\Models\ActividadesUsuarioModel();
	    $actModel3 = new \App\Models\ActividadModel();
	    $actModel4 = new \App\Models\UserModel();

	    if($this->request->getMethod() == "post") {
			$request = \Config\Services::request();
			$id = esc($request->getPostGet('ElimiActApunt'));
			
			//Actividad con ese id 
			$idAct = $actModel2->find($id);
			//Busca el usuario con ese id
			if($idAct != null){
				$usu = $actModel4 -> find($idAct -> dni_usuario);
				//
				if(session() -> Email == $usu -> Email ){
					$act = $actModel3->consulta($idAct -> id_actividad);
					

					$act['plazas'] = $act['plazas'] + 1;

					$actModel2->borrar(esc($id));
					$actModel3->update($act['id_actividad'],$act);
					return redirect()->to(site_url("Gestiones/vistaGestionUsuarios"));
				}
			}else{
				$model = new \App\Models\UserModel();
				$actModel = new \App\Models\UsuarioMaterial();
				$actModel2 = new \App\Models\ActividadesUsuarioModel();
				$actModel3 = new \App\Models\ActividadModel();
				$actModel4 = new \App\Models\MaterialModel();
				$email = session()->Email;
				$row = $model->dniPorEmail($email);
				$data['actividades'] = $actModel3 -> findAll();
				$data['materiales'] = $actModel4 -> findAll();
				$data['usermateriales'] = $actModel->datosMaterialUsuario($row['DNI']);
				$data['useract'] = $actModel2 -> datosUsuarioActividad($row['DNI']);
				

				$data['title'] = ucfirst("Mis Gestiones");
				$data['error6'] = "La actividad no se encuentra reservada / EL id de la actividad no es válido.";
				echo view ("Templates/estiloLogin", $data);
				echo view ("Templates/estiloGeneral", $data);
				echo view('Templates/headerLog',$data);
				echo view('pages/gestionesUsuario',$data);
				echo view('Templates/estiloGeneralScript',$data);
				echo view('Templates/estiloLoginScript',$data);
				echo view('Templates/footer',$data);
			}
			
		}

		
	}

	public function eliminarMatReservado(){
		helper(["form"]);
		//Ir a actividades usuario, eliminar fila, ir actividades aumentar plazas
		$actModel2 = new \App\Models\UsuarioMaterial();
	    $actModel3 = new \App\Models\MaterialModel();
		$actModel4 = new \App\Models\UserModel();

	    if($this->request->getMethod() == "post") {
			$request = \Config\Services::request();
			$id = esc($request->getPostGet('ElimiMatApunt'));

			
			$idAct = $actModel2->find($id);
			if($idAct != null){
				$usu = $actModel4 -> find($idAct -> dni_user);
				if(session() -> Email == $usu -> Email ){

					$act = $actModel3->consulta($idAct -> id_material);
					


					$act['Cantidad'] = $act['Cantidad'] + $idAct -> cantidad;

					
					
					$actModel2->borrar($id);
					$actModel3->update($act['id_material'],$act);
					return redirect()->to(site_url("Gestiones/vistaGestionUsuarios"));
				}
			}else{
				$model = new \App\Models\UserModel();
				$actModel = new \App\Models\UsuarioMaterial();
				$actModel2 = new \App\Models\ActividadesUsuarioModel();
				$actModel3 = new \App\Models\ActividadModel();
				$actModel4 = new \App\Models\MaterialModel();
				$email = session()->Email;
				$row = $model->dniPorEmail($email);
				$data['actividades'] = $actModel3 -> findAll();
				$data['materiales'] = $actModel4 -> findAll();
				$data['usermateriales'] = $actModel->datosMaterialUsuario($row['DNI']);
				$data['useract'] = $actModel2 -> datosUsuarioActividad($row['DNI']);
				

				$data['title'] = ucfirst("Mis Gestiones");
				$data['error5'] = "EL material no se encuentra reservado / EL id del material no es válido.";
				echo view ("Templates/estiloLogin", $data);
				echo view ("Templates/estiloGeneral", $data);
				echo view('Templates/headerLog',$data);
				echo view('pages/gestionesUsuario',$data);
				echo view('Templates/estiloGeneralScript',$data);
				echo view('Templates/estiloLoginScript',$data);
				echo view('Templates/footer',$data);
			}
			

			

		}
	}



	public function vistaMaterialActividad(){
		helper(["form"]);
		$actModel1 = new \App\Models\ActividadModel();
	    $actModel2 = new \App\Models\MaterialModel();
	    $data['actividades'] = $actModel1 -> findAll();
	    $data['materiales'] = $actModel2 -> findAll();

	    $data['title'] = ucfirst("Mis Gestiones");
	    echo view ("Templates/estiloLogin", $data);
	    echo view ("Templates/estiloGeneral", $data);
	    echo view('Templates/headerLog',$data);
	    echo view('pages/usuariosActividadesMateriales',$data);
	    echo view('Templates/estiloGeneralScript',$data);
	    echo view('Templates/estiloLoginScript',$data);
	    echo view('Templates/footer',$data);
	}


	public function ApuntarseActividad() {
		helper(["form"]);
		
		$data = [];
		$dataInsert = [];
		$request = \Config\Services::request();
		$actividadModelo = new \App\Models\ActividadModel();
		$dataActvUsu = [];
		$usuarioActvModelo = new \App\Models\ActividadesUsuarioModel();

		if($this->request->getMethod() == "post") {
			

			
				$id = esc($request->getPostGet('idActividad'));
				$data = $actividadModelo->consulta($id);
				$dataActvUsu = $usuarioActvModelo->findAll();//cogemos todos los usuarios para comprobar que un mismo 
				//usuario no reserve la misma actividad mas de una vez.
				$esta = false;
				foreach($dataActvUsu as $row){
					if($row->id_actividad == $id && $row ->dni_usuario == session()->DNI){
						$esta = true;
					}
				}
				if($data!= null && $data['plazas']>=1 && !$esta){//si existe la actividad y hay plazas y no ha sido reservada antes.

					$dataInsert=array(
						'dni_usuario' => esc(session()->DNI),
						'id_actividad' => esc($id),
						'fecha_reserva' => esc(date('Y-m-d'))

					);

					$usuarioActvModelo->insert($dataInsert);

					$data['plazas'] = $data['plazas'] - 1;
					$actividadModelo->update($data['id_actividad'], $data);
					return redirect()->to(site_url("Gestiones/vistaMaterialActividad"));
					
				}else{
					
					$actModel1 = new \App\Models\ActividadModel();
					$actModel2 = new \App\Models\MaterialModel();
					$data['actividades'] = $actModel1 -> findAll();
					$data['materiales'] = $actModel2 -> findAll();
					$data['errors'] = "La actividad ya está reservada / La actividad no existe";
					$data['title'] = ucfirst("Mis Gestiones");
					echo view ("Templates/estiloLogin", $data);
					echo view ("Templates/estiloGeneral", $data);
					echo view('Templates/headerLog',$data);
					echo view('pages/usuariosActividadesMateriales',$data);
					echo view('Templates/estiloGeneralScript',$data);
					echo view('Templates/estiloLoginScript',$data);
					echo view('Templates/footer',$data);
				}
			

		}
		
		
	}

	public function reservaMaterialPista() {
		helper(["form"]);
		$request = \Config\Services::request();
		$data = [];
		$dataInsert = [] ;
		$materialModelo = new \App\Models\MaterialModel();
		$materialUserModelo = new \App\Models\UsuarioMaterial();
		if($this->request->getMethod() == "post") {
			
			
			
				$id = esc($request->getPostGet('idMaterialPista'));
				$data = $materialModelo->consulta($id);
				if($data != null){
					$cantidad =  esc($request->getPostGet('Cantidad'));
	
				
	
					if($data['Cantidad']>=$cantidad &&$cantidad>0 && $data != null){
						$coste = $data['Coste'] * $cantidad;
						$dataInsert=array(
							'dni_user' => esc(session()->DNI),
							'id_material' =>$id,
							'cantidad' =>$cantidad,
							'Coste' => $coste,
							'fecha_reserva' => esc(date('Y-m-d'))
						);
		
						$materialUserModelo->insert($dataInsert);
		
						$data['Cantidad'] = $data['Cantidad'] - $cantidad;
						$materialModelo ->update($data['id_material'], $data);
						return redirect()->to(site_url("Gestiones/vistaMaterialActividad"));
					}else{
						$actModel1 = new \App\Models\ActividadModel();
						$actModel2 = new \App\Models\MaterialModel();
						$data['actividades'] = $actModel1 -> findAll();
						$data['materiales'] = $actModel2 -> findAll();
						$data['errors4'] = "La cantidad no está permitida";
						$data['title'] = ucfirst("Mis Gestiones");
						echo view ("Templates/estiloLogin", $data);
						echo view ("Templates/estiloGeneral", $data);
						echo view('Templates/headerLog',$data);
						echo view('pages/usuariosActividadesMateriales',$data);
						echo view('Templates/estiloGeneralScript',$data);
						echo view('Templates/estiloLoginScript',$data);
						echo view('Templates/footer',$data);
					}
				
					
				}else{

					$actModel1 = new \App\Models\ActividadModel();
					$actModel2 = new \App\Models\MaterialModel();
					$data['actividades'] = $actModel1 -> findAll();
					$data['materiales'] = $actModel2 -> findAll();
					$data['errors3'] = "El material no existe";
					$data['title'] = ucfirst("Mis Gestiones");
					echo view ("Templates/estiloLogin", $data);
					echo view ("Templates/estiloGeneral", $data);
					echo view('Templates/headerLog',$data);
					echo view('pages/usuariosActividadesMateriales',$data);
					echo view('Templates/estiloGeneralScript',$data);
					echo view('Templates/estiloLoginScript',$data);
					echo view('Templates/footer',$data);
				}
			
			
		}
		

	}
	

}


?>