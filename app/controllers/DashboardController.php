<?php
declare(strict_types=1);

namespace App\Controllers;

Use App\Models\Murid;

class DashboardController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->pick('dashboard/dashboard');
        // $this->response->redirect("/dashboard", true);
        // $this->view->disable();
    }

}