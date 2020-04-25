<?php
declare(strict_types=1);

namespace Controllers\Index;

class LesajaMuridController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->pick('index/index');
        // $this->response->redirect("/index", true);
        // $this->view->disable();
    }

}