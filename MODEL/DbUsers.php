<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/03/19
 * Time: 10:40
 */

class DbUsers
{
    private $db;

    /**
     * DbUsers constructor.
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function loginUsers($username){
        $query = $this->db->prepare('SELECT * FROM user WHERE login = :username');

        $query->execute(array(
            ':username' => $username
        ));
        $result = $query->fetch();
        return $result;
    }

    public function insertUsers($username, $pass, $mail, $name){

        $query = $this->db->prepare("INSERT INTO `user`(`ID`, `login`, `pass`, `mail`, `name`) VALUES (null, :username, :pass , :mail, :nom)");
        $query->execute(array(
            ':username' => $username,
            ':pass' => $pass,
            ':mail' => $mail,
            ':nom' => $name
        ));
    }

    public function sameLogin($username){
        $query = $this->db->prepare('SELECT * FROM user WHERE login = :username');

        $query->execute(array(
            ':username' => $username,
        ));

        $nbRow = $query->rowCount();
        return $nbRow;
    }

    public function selectIdUser($username){
        $query = $this->db->prepare('SELECT * FROM user WHERE login = :username');

        $query->execute(array(
            ':username' => $username,
        ));

        $result = $query->fetch();
        return $result;
    }

    public function selectUserWithId($id){
        $query = $this->db->prepare('SELECT * FROM user WHERE ID = :id');

        $query->execute(array(
            ':id' => $id,
        ));

        $result = $query->fetch();
        return $result;
    }

    public function selectUserWithLogin($login){
        $query = $this->db->prepare('SELECT * FROM user WHERE login = :login');

        $query->execute(array(
            ':login' => $login,
        ));

        $result = $query->fetch();
        return $result;
    }


}