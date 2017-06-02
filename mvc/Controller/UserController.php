<?php
namespace Controller;

use Lib\ViewRenderer;
use Model\User;

class UserController {
    public function listAction(){
        $users = User::findAll();
        
        $viewRenderer = ViewRenderer::getInstance();
        $viewRenderer->render(
            'index.views.php',
            ['users' => $users]
        );
    }
    
    public function editAction(){
        echo 'user:edit';
    }
}
