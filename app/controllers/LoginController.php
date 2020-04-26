<?php
declare(strict_types=1);

namespace App\Controllers;
Use App\Models\Murid;

class LoginController extends ControllerBase{
    public function indexAction(){
        $sessions = $this->getDI()->getShared("session");

        if ($sessions->has("AUTH_ID")) {
            //if user is already logged we dont need to do anything 
            // so we redirect them to the main page
            return $this->response->redirect("/dashboard");
        }
    }

    public function loginSubmitAction(){
        $sessions = $this->getDI()->getShared("session");

        if ($sessions->has("AUTH_ID")) {
            //if user is already logged we dont need to do anything 
            // so we redirect them to the main page
            return $this->response->redirect("/dashboard");
        }

        if ($this->request->isPost()) {

            $email_murid = $this->request->getPost("email");
            $password_murid = $this->request->getPost("password");

            if ($email_murid === "") {
                $this->flashSession->error("Isi email anda");
                //pick up the same view to display the flash session errors
                return $this->view->pick("login/index");
            }

            if ($password_murid === "") {
                $this->flashSession->error("Password anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("login/index");
            }

            $user = Murid::findFirst([ 
                'email_murid = :usern:',
                'bind' => [
                   'usern' => $email_murid,
                ]
            ]);

            if ($user) {
                if ($password === $user->password_murid){
                    # https://docs.phalconphp.com/en/3.3/session#start
    
                    // Set a session
                    $this->session->set('AUTH_ID', $user->id_murid);
                    $this->session->set('AUTH_NAME', $user->nama_murid);
                    $this->session->set('AUTH_EMAIL', $user->email_murid);
                    $this->session->set('AUTH_PASS', $user->password_murid);   

                    return $this->response->redirect('/dashboard');
                }
            } else {
                // The validation has failed
                $this->flashSession->error("User tidak terdaftar");
                return $this->response->redirect('login');
            }
            // The validation has failed
            $this->flashSession->error("Password Salah");
            return $this->response->redirect('login');
        }
    }
}