<?php  

use Phalcon\Mvc\Controller;  

class SignupController extends ControllerBase
{  
    public function indexAction(){
    }
     
     public function registerAction(){
        $user = new Users();

        // get value
        $name = $this->request->getPost('nama_murid', 'string');
        $email = $this->request->getPost('email_murid', 'string');
        $pass = $this->request->getPost('password_murid', 'string');
        $confirm = $this->request->getPost('confirm', 'string');

        $exist = Users::findFirst(
            [
                'conditions' => 'email = :email:',
                'bind'       => [
                    'email' => $email,
                ],
            ]
        );

        if ($exist){
            echo "Sorry, the following problems were generated: Email already exist";
            $this->view->disable();
        }

        else{
            if ($pass != $confirm){
                echo "Sorry, the following problems were generated: Password doesn't match";
                $this->view->disable();
            }
            else{
                // set value
                $user->name = $name;
                $user->email = $email;
                $user->pass = $this->security->hash($pass);
                $user->active = 1;
                $user->created = time();
                $user->updated = time();
                $user->ismember = 0;

                // Check admin
                if (strpos($user->email_tentor, "@lesaja.com") !== false)
                {
                    $user->roles = 1; // Guru
                }
                else
                {
                    $user->roles = 0; // User
                }
                
                // Store and check for errors
                $success = $user->save();

                // Log the user/admin in
                if ($success) {
                    // Set a session
                    $this->session->set('auth_id', $user->id);
                    $this->session->set('auth_name', $user->firstName);
                    $this->session->set('auth_email', $user->email);
                    $this->session->set('auth_created', $user->created);
                    $this->session->set('auth_updated', $user->updated);
                    $this->session->set('auth_ismember', $user->ismember);
                    
                    // Go to User
                    if ($user->roles == 0) 
                    {
                        $this->response->redirect("/");
                    } 
                    // Exit 
                    else 
                    {
                        return $this->response->redirect('login');
                    }
                } 
                else {
                    echo "Sorry, the following problems were generated: " . implode('<br>', $user->getMessages());
                    $this->view->disable();
                }
    
            }
        }
     }
}     