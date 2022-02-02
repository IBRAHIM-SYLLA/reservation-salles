<?php
class Utilisateurs_bdd {

    private function PDO()
    {
        $pdo = new \PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '',
        [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC]);
        return $pdo;
    }

    /**
     *  on verifie si l'utilisateur existe
     * @param string permet de dire ou aller chercher l'info
     * @param string valeur de l'info
     * @return array ou null
     */
    protected function selection_par($colone,$valeur)
    {
        $sql = "SELECT * FROM `utilisateurs` WHERE `$colone`='$valeur'";
        $statement = $this->PDO()->query($sql);
        $result = $statement->fetchAll();
        return $result;
    }

    /**
     *  on verifie si l'utilisateur existe
     * @param string permet de dire ou aller chercher l'info
     * @param string valeur de l'info
     * @return bool
     */
    protected function si_utilisateur_existe($colone,$valeur): bool
    {
        $result = $this->selection_par($colone,$valeur);
        if (empty($result)){
            return false;
        }
        else return true;
    }

    /**
     * Permet d'inserrer un nouvel utuilisateur en bdd
     */
    protected function insert_utilisateur($login,$password)
    {
        $sql = "INSERT INTO `utilisateurs`(`login`, `password`) VALUES ('$login','$password')";
        $statement = $this->PDO()->query($sql);
    }
}
?>