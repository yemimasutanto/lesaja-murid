<?php
declare(strict_types=1);

namespace App\Controllers;

Use App\Models\Murid;
Use App\Models\MataPelajaran;
Use App\Models\Kelas;

class DashboardController extends ControllerBase
{

    public function indexAction()
    {   
        // $cari=$this->request->getQuery('cari');
        // $nama_mapel=$this->request->getQuery('nama_mapel');
        // $nama_tentor=$this->request->getQuery('nama_tentor');

        // if(strlen($cari)>0){
        //     $nama_mapel=$this->db->query("SELECT nama_mapel FROM mata_pelajaran");
        // }
        $this->view->mapels=MataPelajaran::find();
        $this->view->pick('dashboard/dashboard');
        // $this->response->redirect("/dashboard", true);
        // $this->view->disable();
    }

    public function joinAction($id)
    {   
        $cari=MataPelajaran::findFirst([
            'id_mapel = :id:',
                'bind' => [
                    'id' => $id,
                ]
        ]);

        $kelas = new Kelas();
        $kelas->id_mapel=$id;
        $kelas->id_tentor=$cari->id_tentor;
        $kelas->id_murid=$this->session->get('AUTH_ID');

        $success = $kelas->save();

        if ($success) {
            $this->flashSession->success("Berhasil join kelas");;
            return $this->response->redirect('/dashboard');
        } else {
            $this->flashSession->error("Gagal join kelas");
            return $this->response->redirect('/dashboard');
        }
    }

    // $kelas = Kelas::find([
    //     'id_kelas = :id:',
    //     'bind'=>[
    //         'id' => $id_kelas,
    //     ]
    // ]);
    // $user = Murid::findFirst([ 
    //     'email_murid = :email:',
    //     'bind' => [
    //        'email' => $email_murid,
    //     ]
    // ]);

    // public function searchAction(){
    //     echo $_POST['cari'];
    //     // if($cari->)
    //     // $this->db->query(“select nama_mapel from mata_pelajaran
    //     // when ma”)->fetchAll();
    // }
}