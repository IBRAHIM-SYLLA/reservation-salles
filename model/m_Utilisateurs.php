<?php
// class Utilisateurs_bdd {

//     private function PDO()
//     {
//         $pdo = new \PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '',
//         [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
//         \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC]);
//         return $pdo;
//     }

//     /**
//      *  on verifie si l'utilisateur existe
//      * @param string permet de dire ou aller chercher l'info
//      * @param string valeur de l'info
//      * @return array ou null
//      */
//     protected function selection_par($colone,$valeur)
//     {
//         $sql = "SELECT * FROM `utilisateurs` WHERE `$colone`='$valeur'";
//         $statement = $this->PDO()->query($sql);
//         $result = $statement->fetchAll();
//         return $result;
//     }

//     

//     /**
//      * Permet d'inserrer un nouvel utuilisateur en bdd
//      */
//     protected function insert_utilisateur($login,$password)
//     {
//         $sql = "INSERT INTO `utilisateurs`(`login`, `password`) VALUES ('$login','$password')";
//         $statement = $this->PDO()->query($sql);
//     }
//     protected function connect_utilisateur($login,$password)
//     {
//         $sql = "SELECT * FROM `utilisateurs` WHERE `login`='$login'";
//         $statement = $this->PDO()->query($sql);
//         $result = $statement->fetchAll();
//     }
// }

class Userpdo{
    private $id;
    public $login;
    public $password;
    public $bdd;

    public function __construct(){
        $bdd = new PDO("mysql:host=localhost;dbname=reservationsalles",'root','');
        $bdd->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $this->bdd = $bdd;
        return $bdd;
    }
//     /**
//      *  on verifie si l'utilisateur existe
//      * @param string permet de dire ou aller chercher l'info
//      * @param string valeur de l'info
//      * @return array ou null
//      */
//     protected function selection_par($colone,$valeur)
//     {
//         $sql = "SELECT * FROM `utilisateurs` WHERE `$colone`='$valeur'";
//         $statement = $this->bdd->query($sql);
//         $result = $statement->fetchAll();
//         return $result;
//     }
//     /**
//      *  on verifie si l'utilisateur existe
//      * @param string permet de dire ou aller chercher l'info
//      * @param string valeur de l'info
//      * @return bool
//      */
// protected function si_utilisateur_existe($colone,$valeur): bool
// {
//     $result = $this->selection_par($colone,$valeur);
//     if (empty($result)){
//         return false;
//     }
//     else return true;
// }
    public function register($login, $password){

        $insert = "INSERT INTO `utilisateurs`( `login`, `password`) VALUES (:login, :password)";
        $result = $this->bdd->prepare($insert);
        $result->bindValue(':login', $login, PDO::PARAM_STR);
        $result->bindValue(':password', $password, PDO::PARAM_STR);
        $result->execute();

    }
    public function connect($login, $password){
        $error = "";
        $requete2 = "SELECT * FROM utilisateurs WHERE login = :login";
        var_dump($login);
        $result2 = $this->bdd->prepare($requete2);
        $result2->bindValue(':login', $login, PDO::PARAM_STR);
        $result2->execute();

        $fetch = $result2->fetchAll();
        var_dump($fetch);
        if (count($fetch) > 0)
        {
            if(password_verify($password,$fetch[0]['password']) || $password==$fetch[0]['password'])
            {
                
                $_SESSION['utilisateur']=
                [
                    'id'=>$fetch[0]['id'],
                    'login'=>  $fetch[0]["login"],
                    'password'=> $fetch[0]["password"],
                ];
                // var_dump($_SESSION["utilisateur"]);
            }
            else
            {
                $error = "mot de passe incorrect!";
            }
        }
        else
        {
            $error = 'utilisateurs inconnu';
        }
        return $error;

    }
    public function disconnect(){
        session_destroy();
    }
    public function delete(){
        $requete3 = "DELETE FROM `utilisateurs` WHERE id = :id";
        $result3 = $this->bdd->prepare($requete3);
        $result3->bindValue(':id',$this->id, PDO::PARAM_STR);
        $result3->execute();
    }
    public function update($login, $password, $email, $firstname, $lastname){
        $requete4 = "UPDATE `utilisateurs` SET `login`= :login,`password`= :password,`email`= :email,`firstname`= :firstname,`lastname`= :lastname";
        $result4 = $this->bdd->prepare($requete4);
        $result4->bindValue(':password', $password, PDO::PARAM_STR);
        $result4->bindValue(':login', $login, PDO::PARAM_STR);
        $result4->execute();
    }
    public function isConnected(){
        if(!empty($_SESSION['utilisateur'])){
            return true;
        }
        else{
            return false;
        }
    }
    public function getLogin(){
        return $this -> login;
    }
    public function getPassword(){
        return $this -> password;
    }
    public function getEmail(){
        return $this -> email;
    }
    public function getFirstname(){
        return $this -> firstname;
    }
    public function getLastname(){
        return $this -> lastname;
    }
}

?>