<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Murid;
use App\Models\MataPelajaran;

class BookingController extends ControllerBase
{   
    public function indexAction(){

        $kelas=Kelas::find();
        $query = ("SELECT mp.nama_mapel, t.nama_tentor FROM kelas k 
                    JOIN mata_pelajaran mp ON k.id_mapel=mp.id_mapel 
                    JOIN tentor t ON k.id_tentor=t.id_tentor");
        $db = $this->getDI()->get('db');
        $result = $db->fetchAll($query, \Phalcon\Db\Enum::FETCH_ASSOC);
        $this->view->kelas = $kelas;

    }

    public function kelasAction()
    {
        // $getUserId = $this->session->get('AUTH_ID');

        // $query = $this->modelsManager->createQuery(
        //     "SELECT mp.nama_mapel, mp.jenjang, mp.nama_tentor FROM mata_pelajaran mp, kelas k, tentor t
        //         WHERE k.id_tentor = t.id_tentor AND k.id_mapel = mp.id_mapel = $getUserId");
        // $listkelas= $query->execute();
        // $kelas = $listkelas->toArray();

        // $this->view->kelas = $kelas;

        // $query = ("SELECT mp.nama_mapel, t.nama_tentor FROM kelas k 
        //             JOIN mata_pelajaran mp ON k.id_mapel=mp.id_mapel 
        //             JOIN tentor t ON k.id_tentor=t.id_tentor");
        // $db = $this->getDI()->get('db');
        // $result = $db->fetchAll($query, \Phalcon\Db\Enum::FETCH_ASSOC);
        $listkelas= Kelas::find("id_murid='$id'");
        $list = $this->db->query("SELECT mp.nama_mapel, t.nama_tentor FROM kelas k JOIN mata_pelajaran mp ON k.id_mapel=mp.id_mapel 
        JOIN tentor t ON k.id_tentor=t.id_tentor='$id'")->fetchAll();
        // $det = $this->db->query("SELECT * from Tempat where id_tempat='$id'")->fetchAll();
        // $jumlah =  $this->db->query("SELECT COUNT(id_review) as jml from Review where id_tempat='$id' GROUP BY id_tempat")->fetchAll();
        $this->view->setVars(
            ['list'=>$list,
        ]);
        $this->view->listkelas=$listkelas;
        $this->view->pick('dashboard/kelas');
    }
}