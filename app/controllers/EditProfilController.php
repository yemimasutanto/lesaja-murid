<?php

namespace App\Controllers;
Use App\Models\Murid;

class EditProfilController extends ControllerBase
{
    public function indexAction()
    {
       
    }

    public function editSubmitAction(){
        if ($this->request->isPost()) 
        {
            $nama_murid = $this->request->getPost("nama");
            $email_murid = $this->request->getPost("email");

            if ($nama_murid === null && $email_murid === null)
            {
                $this->flashSession->error("Data tidak boleh kosong");
                //pick up the same view to display the flash session errors
                return $this->response->redirect('editprofil');
            }
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
                $this->flashSession->error("Email anda belum diubah");
                return $this->response->redirect('editprofil');
            }

            else
            {
                if($nama_murid === $exist->nama_murid)
                {
                    $this->flashSession->error("Nama anda belum diubah");
                    return $this->response->redirect('editprofil');
                }
                else
                {
                    // set value
                    $exist->nama_murid = $nama_murid;
                    $exist->email_murid = $email_murid;
                    
                    // Store and check for errors
                    $success = $exist->update();
                    $this->flashSession->success("Data diri berhasil diubah!");
                    return $this->response->redirect('dashboard');

                }
            }
        }
        
    }

}