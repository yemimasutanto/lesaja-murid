<?php

namespace Controllers\Login;

use Phalcon\Mvc\Controller;
use Models\Madera\Authentifaction;

class LoginController extends Controller
{
    public function indexAction()
    { 
        $email = $this->request->getPost("email-murid");
        $pwd = $this->request->getPost("password-murid");

        $auth = new Authentifaction();

        $result = $auth->find(
            [
                "Login = $email AND Mot_De_Passe = $pwd"
            ]
        );

        $this->view->result;
    }
}