<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Murid;
use App\Models\MataPelajaran;

class BookingController extends ControllerBase
{   
    public function indexAction(){

    }

    public function kelasAction()
        {
            $getUserId = $this->session->get('AUTH_ID');

            $query = $this->modelsManager->createQuery("SELECT * FROM App\Models\Kelas x WHERE x.id_user = $getUserId");
            $kelas = $query->execute();

            if ($kelas->count() > 0)
            {
                $this->view->booking = $kelas;
                $this->view->flag = 1;
            }
            else
            {
                $this->view->flag = 0;
            }
        }
    
        public function createAction($nama_mapel, $jenjang)
        {
            // Kelas Baru
            $kelas = new Kelas();
    
            // Set kelas
            $kelas->id_kelas = $id_kelas;
            $kelas->nama_mapel = $nama_mapel;
            $kelas->jenjang = $jenjang;
            $kelas->nama_tentor = $nama_tentor;
            $kelas->id_murid = $this->session->get('AUTH_ID');

            // Save kelas
            $success = $kelas->save();
    
            if ($success)
            {
                $this->flashSession->success("Kelas berhasil ditambahkan");
                return $this->response->redirect('dashboard');
            }
            else
            {   
                $this->flashSession->error("kelas gagal terdaftar");
                return $this->response->redirect('dashboard');
            }
        }
}