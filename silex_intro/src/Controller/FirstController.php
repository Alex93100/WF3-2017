<?php
namespace Controller;

use Silex\Application;

class FirstController {
    
    /*
     * Il suffit de demander une instance de Silex\Application
     * en paramètre de la méthode pour y avoir accès
     * 
     * @param Application $app
     */
    public function testAction(Application $app){
        return $app['twig']->render('hello.html.twig');
    }
    
    
    /*
     * 
     * @param Application $app
     * @param string $name Variable passé par le routeur venant de l'URL
     */
    public function testParamAction(Application $app, $name){
        return $app['twig']->render('hello.html.twig', ['name'=> $name]);
    }
    
    public function usersAction(Application $app){
        
        /** @var Doctrine\DBAL */
        $db = $app['db'];
        
        /*
         * équivaut à faire query puis fetchAll() avec PDO
         */
        $users = $db->fetchAll('SELECT * FROM user');
        
        return $app['twig']->render('Users.html.twig', ['users'=> $users]);

    }
    
    /*
     * Affiche les infos d'un utilisateur par son ud oassé dans l'URL
     * 
     * @param Application $app
     * @param int $userId
     */
    
 #   public function userAction(Application $app, $userId){
        
 #  }
}
