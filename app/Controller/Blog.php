<?php

namespace App\Controller;

use Core\AbstractController;

class Blog extends AbstractController
{
    function indexAction()
    {

        if (isset($_GET['redirect'])) {
            $this->redirect('/user/reg');
        }

        echo __METHOD__;
    }
}
