<?php
require_once('./model/m_Utilisateurs.php');
class Utilisateur extends Utilisateurs_bdd{

    private $id;
    public $login;
    public $password;

     //Redirige l'utilisateurs si il est déja connecter.

    public function utilisateur_connect()
    {
        if($_SESSION)
        {
            header('location: index.php');
            exit();
        }
    }
    public function utilisateurs_deconnect()
    {
        if(empty($_SESSION))
        {
            header('location: connection.php');
            exit();
        }
    }

    /**
     * Cette method permet a un utilisateur de s'inscrire.
     * @param array formulaires d'inscription
     * @return string ou reconduit
     */
    public function inscription($array)
    {
        if(!empty($_POST))
        {
        $login= $array['login'];
        $password=$array['password'];
        $passw2=$array['password2'];
        if(empty($login) || empty($password))
            {
            return 'un champs est vide.';
            }
        elseif($password != $passw2)
            {
                return 'les mots de passes ne sont pas identiques.';
            }
        elseif($this->si_utilisateur_existe('login',$login)===true)
            {
                return 'Ce pseudo  est déjà utilisé!';
            }
        else
            {
                $password = password_hash($password,PASSWORD_DEFAULT);
                echo $password;
                $this->insert_utilisateur($login,$password);
                // header('Location: connexion.php');
            }
        }
    }
}
?>