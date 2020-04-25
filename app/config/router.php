<?php

use Phalcon\Mvc\Router;

$router = $di->getRouter();

//  Define your routes here

$router->handle($_SERVER['REQUEST_URI']);

$router = new Phalcon\Mvc\Router();

$router->add('/login', [
        'controller' => 'login',
        'action'     => 'login',
    ]
);

$router->add('/register', [
        'controller' => 'register',
        'action'     => 'register',
    ]
);

$router->add('/reset',[
        'controller' => 'reset',
        'action'     => 'reset',
    ]
);

return $router;