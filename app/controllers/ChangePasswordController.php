<?php


namespace App\Controllers;
Use App\Models\Murid;

class ChangePasswordController extends ControllerBase
{
    public function indexAction()
    {

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