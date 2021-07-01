<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Logout extends Controller{

	public function cerrarSesion(){

		session()->destroy();

		return redirect()->to(site_url("pages/view/principal"));

	}

}

?>