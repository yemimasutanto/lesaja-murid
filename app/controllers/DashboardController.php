<?php
declare(strict_types=1);

class DashboardController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->pick('index/index');
        $this->response->redirect("lesaja-murid/login/dashboard", true);
        $this->view->disable();
    }

}