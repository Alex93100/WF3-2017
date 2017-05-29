<?php

// 02-gette-setter-constructeur-this
    // -> Membre.class.php

Class Membre{
    private $pseudo;
    private $mdp;

    public function setPseudo($pseudo){
        if(!empty($pseudo) && is_string($pseudo) && strlen($pseudo) > 3 && strlen($pseudo) < 20){
            $this->pseudo = $pseudo;
        }
        else{
            return FALSE;
        }
    }

    public function getpseudo(){
        return $this->pseudo;
    }

    public function setMdp($mdp){
        if(!empty($mdp) && is_string($mdp) && strlen($mdp) > 3 && strlen($mdp) < 20){
            // $this->mdp = $mdp = md5('alexandre');
            $salt = 'alexandre' . time();
            $salt = md5($salt);

            // on enregistre le salt dans la BDD par memebre
            $mdp_a_crypte = $salt . $mdp;
            $mdp_a_crypte = md5($mdp_a_crypte);
            $this->mdp = $mdp_a_crypte;
        }
        else{
            return FALSE;
        }
    }

    public function getMdp(){
        return $this->mdp;
    }
}


// -----------
// EXERCICE : Au regard de cette classe, veuillez créer un membre, affecter des valeur pseudo et mdp et les afficher :

$membre = new Membre;

$membre->setPseudo('Azerty93');
echo 'Pseudo: '. $membre-> getPseudo() . '<br>';
$membre->setMdp('Azerty*1234');
echo 'Mdp : '. $membre-> getMdp();