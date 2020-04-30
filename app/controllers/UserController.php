<?php
declare(strict_types=1);
use App\Models\Murid;

class UserController extends ControllerBase
{
    public function onConstruct(){
    
    }

    public function initialize(){
        
    }

    public function loginAction()
    {
        $sessions = $this->getDI()->getShared("session");

        if ($sessions->has("AUTH_ID")) {
            //if user is already logged we dont need to do anything 
            // so we redirect them to the main page
            return $this->response->redirect("/dashboard");
        }
    }
    public function loginSubmitAction()
    {
        if ($this->request->isPost()) {
            $email_murid = $this->request->getPost("email");
            $password_murid = $this->request->getPost("password");

            if ($email_murid === "" && $password_murid === ""){
                $this->flashSession->error("Anda belum mengisi email dan password");
                return $this->view->pick("login/index");
            }

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
                'email_murid = :email:',
                'bind' => [
                   'email' => $email_murid,
                ]
            ]);

            if ($user) {
                if ($password_murid === $user->password_murid){
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

    public function registerAction()
    {
        
    }

    public function registerSubmitAction()
    {
         $user = new Murid();

        // get value
        $nama_murid = $this->request->getPost('nama', 'string');
        $email_murid = $this->request->getPost('email', 'string');
        $password_murid = $this->request->getPost('password', 'string');
        $confirm = $this->request->getPost('confirm', 'string');

        $exist = Murid::findFirst(
            [
                'conditions' => 'email_murid = :email:',
                'bind'       => [
                    'email' => $email_murid,
                ],
            ]
        );

        if ($exist){
            $this->flashSession->error("Email telah terdaftar");
            $this->response->redirect('register');
        }

        else{
            if ($password_murid != $confirm){
                $this->flashSession->error("Password tidak cocok");
                $this->response->redirect('register');
                return false;
            }
            else{
                // set value
                $user->nama_murid = $nama_murid;
                $user->email_murid = $email_murid;
                $user->password_murid = $password_murid;

                $success = $user->save();
                $this->flashSession->success("Berhasil terdaftar!");

                // Log the user/admin in
                if ($success) {
                    // Set a session
                    $this->session->set('AUTH_ID', $user->id_murid);
                    $this->session->set('AUTH_NAME', $user->nama_murid);
                    $this->session->set('AUTH_EMAIL', $user->email_murid);
                    $this->session->set('AUTH_PASS', $user->password_murid);  

                    $this->response->redirect("/dashboard");
                    
                    }
                // Exit 
                else
                {
                    return $this->response->redirect('login');
                }
            }
        }
        
    }
    public function logoutAction()
    {
        // Destroy the whole session
        $this->session->destroy();
        return $this->response->redirect('user/login');
    }

    public function resetSubmitAction()
    {
        if ($this->request->isPost()) 
        {
            $email_murid = $this->request->getPost("email");
            $password_murid = $this->request->getPost("old_pwd");
            $confirm = $this->request->getPost("new_pwd");

            if ($password_murid === "" && $confirm === "")
            {
                $this->flashSession->error("Password anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("reset/index");
            }

            // get value
            $email_murid = $this->request->getPost('email', 'string');
            $password_murid = $this->request->getPost('old_pwd', 'string');
            $confirm = $this->request->getPost('new_pwd', 'string');

            $exist = Murid::findFirst(
                [
                    'conditions' => 'email_murid = :email:',
                    'bind'       => [
                        'email' => $email_murid,
                    ],
                ]
            );

            if (!$exist)
            {
                $this->flashSession->error("Email anda salah");
                return $this->response->redirect('reset');
            }

            else
            {
                if($password_murid !== $exist->password_murid)
                {
                    return $this->response->redirect('reset');
                }
                else
                {
                    // set value
                    $exist->email_murid = $email_murid;
                    $exist->password_murid = $confirm;
                    
                    // Store and check for errors
                    $success = $exist->update();
                    $this->flashSession->success("Password berhasil diubah!");
                    return $this->response->redirect('login');
                }
            }
        }
    }

    public function editSubmitAction(){
        
    }

    public function changeSubmitAction(){
        if ($this->request->isPost()) 
        {
            $password_murid = $this->request->getPost("old_pwd");
            $confirm = $this->request->getPost("new_pwd");

            if ($password_murid === "" && $confirm === "")
            {
                $this->flashSession->error("Password anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("changepassword/index");
            }

            // get value
            $password_murid = $this->request->getPost('old_pwd', 'string');
            $confirm = $this->request->getPost('new_pwd', 'string');

            $exist = Murid::findFirst(
                [
                    'conditions' => 'password_murid = :pwd:',
                    'bind'       => [
                        'pwd' => $password_murid,
                    ],
                ]
            );

            if (!$exist)
            {
                $this->flashSession->error("Password anda salah");
                return $this->response->redirect('changepassword');
            }

            else
            {
                if($password_murid !== $exist->password_murid)
                {
                    return $this->response->redirect('changepassword');
                }
                else
                {
                    // set value
                    $exist->password_murid = $confirm;
                    
                    // Store and check for errors
                    $success = $exist->update();
                    $this->flashSession->success("Password berhasil diubah!");
                    return $this->response->redirect('dashboard');
                }
            }
        }
    }
}