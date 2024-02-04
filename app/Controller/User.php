<?php

namespace App\Controller;

use Core\AbstractController;

class User extends AbstractController
{
    function loginAction()
    {
        echo __METHOD__;
    }

    function regAction()
    {
        $user = new \App\Model\User();
        return $this->view->render('User/register.phtml',
            [
                'UserName' => 'Alex',
                'age' => 11,
                'user' => $user
            ]);
    }
}
