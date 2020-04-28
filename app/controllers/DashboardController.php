<?php
declare(strict_types=1);

namespace App\Controllers;

Use App\Models\Murid;

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
        $this->view->pick('dashboard/dashboard');
        // $this->response->redirect("/dashboard", true);
        // $this->view->disable();
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