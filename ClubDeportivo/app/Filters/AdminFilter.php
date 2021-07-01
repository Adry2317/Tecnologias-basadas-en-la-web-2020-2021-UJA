<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface {


    public function before (RequestInterface $request, $arguments = null) {

        if(!session("logged_in")) {

            return redirect()->to(site_url('loginController/authLogin'));

        }else if(session("RolUser")!="admin"){

            //enviamos un codigo de error 403(Prohibido)
            return redirect()->to(site_url('loginController/view/403'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }

}


?>