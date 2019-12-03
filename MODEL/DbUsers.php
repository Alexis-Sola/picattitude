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
        $query = $this->db->prepare('SELECT * FROM alive_user WHERE pseudo = :username');

        $query->execute(array(
            ':username' => $username
        ));
        $result = $query->fetch();
        return $result;
    }


    public function getAllUsers(){
        $query = $this->db->prepare('SELECT * FROM alive_user');

        $query->execute();

        $result = $query->fetchAll();

        return $result;
    }

    public function insertUsers($rank, $ipaddr, $pass, $pseudo, $mail){

        $query = $this->db->prepare(
            "INSERT INTO alive_user VALUES (NULL, :rank, :ipaddr, :pass, :pseudo, :mail)");
        $query->execute(array(
            ':rank' => $rank,
            ':ipaddr' => $ipaddr,
            ':pass' => $pass,
            ':pseudo' => $pseudo,
            ':mail' => $mail
        ));
    }

    public function sameLogin($username){
        $query = $this->db->prepare('SELECT * FROM alive_user WHERE pseudo = :username');

        $query->execute(array(
            ':username' => $username
        ));

        $nbRow = $query->rowCount();
        return $nbRow;
    }

    public function selectIdUser($username){
        $query = $this->db->prepare('SELECT * FROM alive_user WHERE pseudo = :username');

        $query->execute(array(
            ':username' => $username
        ));

        $result = $query->fetch();
        return $result;
    }

    public function selectUserWithId($id){
        $query = $this->db->prepare('SELECT * FROM alive_user WHERE id_user = :id');

        $query->execute(array(
            ':id' => $id,
        ));

        $result = $query->fetch();
        return $result;
    }

    public function selectUserWithLogin($login){
        $query = $this->db->prepare('SELECT * FROM alive_user WHERE pseudo = :login');

        $query->execute(array(
            ':login' => $login,
        ));

        $result = $query->fetch();
        return $result;
    }

    public function delete_user($pseudo){
        $query = $this->db->prepare("DELETE FROM alive_user WHERE pseudo = :pseudo AND user_rank != \"admin\"");
        $query->execute(array(
                ':pseudo' => $pseudo
            )
        );

    }

    public function get_user_modo(){

        $query = $this->db->prepare("SELECT * FROM alive_user WHERE user_rank != \"admin\"");
        $query->execute();

        $result = $query->fetchAll();

        return $result;
    }

    public function get_user(){

        $query = $this->db->prepare("SELECT * FROM alive_user WHERE user_rank != \"admin\" AND user_rank != \"modo\"");
        $query->execute();

        $result = $query->fetchAll();

        return $result;
    }


}