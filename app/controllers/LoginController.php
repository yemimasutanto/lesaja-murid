<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Users;

class LoginController extends ControllerBase
{
    public function indexAction()
    { 
        if ($this->request->isPost())
        {
            // get data
            $data = $this->request->getPost();
            $email = $data["email-murid"];
            $pass = $data["password-murid"];
            
            // get user with this email
            $user = Users::findFirst(
                [
                    'conditions' => 'email = :email:',
                    'bind'       => [
                        'email' => $email,
                    ],
                ]
            );

            // if email found
            if ($user) 
            {   
                // check password
                $check = $this
                    ->security
                    ->checkHash($pass, $user->pass);
                
                // if true
                if (true === $check) 
                {   
                    // check user disable
                    if ($user->active != 1) 
                    {
                        $this->flashSession->error("User Disabled");
                        return $this->response->redirect('login');
                    }
                    // active user
                    else
                    {
                        // Set a session
                        $this->session->set('auth_id', $user->id);
                        $this->session->set('auth_name', $user->name);
                        $this->session->set('auth_email', $user->email);
                        $this->session->set('auth_created', $user->created);
                        $this->session->set('auth_updated', $user->updated);
                        //$this->session->set('auth_ismember', $user->ismember);
                        
                        // Go to User
                        // if ($user->roles == 0) 
                        // {
                        //     $this->response->redirect("/");
                        // } 
                        // Go to Admin
                        // else if ($user->roles == 1) 
                        // {
                        //     echo "ADMIN LOGGED IN:" . PHP_EOL;
                        //     echo $this->session->get("auth_firstName") . $this->session->get("auth_lastName");
                        //     $this->view->disable();
                        // }
                        // Exit 
                        
                            return $this->response->redirect('login');
                        

                    }
                }

                // wrong password
                else
                {
                    echo "Wrong email or password";
                    $this->view->disable();
                }
            } 
            
            // user not found
            else 
            {
                echo "Wrong email or password";
                $this->view->disable();
            }

    }
}
}